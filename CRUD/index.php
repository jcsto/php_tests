<?php
require 'config.php';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CRUD</title>
		
		<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		
		<script>
		$(document).ready(function(){
			
			function isNumeric(n) {
				return !isNaN(parseFloat(n)) && isFinite(n);
			}
			
			function checkLenghts(source) {
				alert(source);
				var n = $(source +  ' input[name="name"]').val();
				if( n.length > 150) {
					alert("Name should have 150 characters max.");
					$(source +  ' input[name="name"]').focus();
					return false;
				}
				
				var email = $(source +  ' input[name="email"]').val();
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if( email.length > 60) {
					alert("Email should have 60 characters max.");
					$(source +  ' input[name="email"]').focus();
					return false;
				}
				if (!re.test(email)) {
					alert("Please write a valid email.");
					$(source +  ' input[name="email"]').focus();
					return false;
				}
				
				var telephone = $(source +  ' input[name="telephone"]').val();
				if (telephone.length > 0) {
					if(telephone.length > 16) {
						alert("Telephone should have 16 characters max.");
						$(source +  ' input[name="telephone"]').focus();
						return false;
					}
					if (!isNumeric(telephone)) {
						alert("Telephone should have only numbers.");
						$(source +  ' input[name="telephone"]').focus();
						return false;
					}
				}
				
				var street = $(source +  ' input[name="street"]').val();
				if( street.length > 16) {
					alert("Street should have 16 characters max.");
					$(source +  ' input[name="street"]').focus();
					return false;
				}
				
				var city = $(source +  ' input[name="city"]').val();
				if( city.length > 16) {
					alert("City should have 100 characters max.");
					$(source +  ' input[name="city"]').focus();
					return false;
				}
				
				var state = $(source +  ' input[name="state"]').val();
				if( state.length > 16) {
					alert("State should have 130 characters max.");
					$(source +  ' input[name="state"]').focus();
					return false;
				}
				
				var zip = $(source +  ' input[name="zip"]').val();
				if (zi.length > 0) {
					if( zip.length > 16) {
						alert("Zip should have 130 characters max.");
						$(source +  ' input[name="zip"]').focus();
						return false;
					}
					if (!isNumeric(zip)) {
						alert("Zip should have only numbers.");
						$(source +  ' input[name="zip"]').focus();
						return false;
					}
				}
				else{
					return true;
				}
				
			}
			
			function sendData(t, source, id) {
				
				if (checkLenghts(source)) {
				
					$.ajax({
						data: {
							"t": t,
							"id": id,
							"name" : $(source +  ' input[name="name"]').val(),
							"email" : $(source +  ' input[name="email"]').val(),
							"telephone" : $(source +  ' input[name="telephone"]').val(),
							"street" : $(source +  ' input[name="street"]').val(),
							"city" : $(source +  ' input[name="city"]').val(),
							"state" : $(source +  ' input[name="state"]').val(),
							"zip" : $(source +  ' input[name="zip"]').val(),
							},
						type: "POST",
						dataType: "json",
						url: "receive.php",
						success: function(res) {
							
							if (res == 1)
								location.reload();
							else {
								$('.msg').show().text("Error inserting user. Please try again.");
							}
						}
					});
				}
			}
			
			$('.upd').click(function(){
				var id = $(this).attr("data-type");
				sendData(2, ".update .c" + id, id);
			});
			
			$('.delete').click(function(){
				var id = $(this).attr("data-type");
				alert(id);
				$.ajax({
					data: {
						"t": 1,
						"id": id
						},
					type: "POST",
					dataType: "json",
					url: "receive.php",
					success: function(res) {
						
						if (res == 1)
							location.reload();
						else {
							$('.msg').removeClass("hidden").show().html("<h3>Error inserting user. Please try again.</h3>");
						}
					}
				});
			});
			
			$('#save').click(function() {
				sendData(3, ".ins", "");
			});
		});
		</script>
    </head>
    <body>
		
		<div id="content">
			
			<div class="hidden msg btn-warning error-msg"></div>
			
			<h3>Customers List</h3>
			<hr>
			<table class="table border update">
				<thead>
					<tr>
						<td>Name</td>
						<td>Email</td>
						<td>Telephone</td>
						<td>Street</td>
						<td>City</td>
						<td>State</td>
						<td>Zip</td>
						<td>Modificar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$con = mysqli_connect("localhost", "root", "", "test");
					$q = 'SELECT * FROM customers;';
					
					$result = mysqli_query($con, $q);
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<tr class="c' . $row['idCustomer'] . '">';
						echo '<td><input type="text" name="name" value="' . $row['name'] . '"</td>';
						echo '<td><input type="text" name="email" value="' . $row['email'] . '"</td>';
						echo '<td><input type="text" name="telephone" value="' . $row['telephone'] . '"</td>';
						echo '<td><input type="text" name="street" value="' . $row['street'] . '"</td>';
						echo '<td><input type="text" name="city" value="' . $row['city'] . '"</td>';
						echo '<td><input type="text" name="state" value="' . $row['state'] . '"</td>';
						echo '<td><input type="text" name="zip" value="' . $row['zip'] . '"</td>';
						echo '<td><button class="btn btn-warning upd" data-type="' . $row['idCustomer'] . '">&#9998;</button></td>';
						echo '<td><button class="btn btn-danger delete" data-type="' . $row['idCustomer'] . '">X</button></td>';
						echo '</tr>';
					}
					
					?>
				</tbody>
			</table>
			
			<hr>
			
			<div id="agregar">
				<h3>Agregar usuario</h3>
				
				<div class="form-group ins">
					<label>Name</label>
					<input type="text" name="name" class="form-control" required><br>
					<label>Email</label>
					<input type="email" name="email" class="form-control" required><br>
					<label>Telephone</label>
					<input type="text" name="telephone" class="form-control" max="16" required><br>
					<label>Street</label>
					<input type="text" name="street" class="form-control" required><br>
					<label>City</label>
					<input type="text" name="city" class="form-control" required><br>
					<label>State</label>
					<input type="text" name="state" class="form-control" required><br>
					<label>Zip</label>
					<input type="text" name="zip" class="form-control" required><br>
					<button class="btn btn-primary" id="save">Save</button>
				</div>
			</div>
			
		</div>
        
		<?php
				
		// Free result
		mysqli_free_result($result);
		// close conn
		mysqli_close($con);
		?>
    </body>
</html>