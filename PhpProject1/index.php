<?php

include 'autoDisenho.php';
include 'disenho.php';

class Auto extends disenho implements autoDisenho {
    
    
    public function __construct() {
        echo '<br /><h2>Bienvenido a la construccion de auto.</h2><br /><br />';
    }
    
    public function caracteristicas($caracteristicas) {
        return $caracteristicas;
    }
    
    public function motor($cilindros) {
        return $cilindros;
    }
    
    public function puertas($puertas) {
        //parent::puertas($puertas);
        return $puertas;
    }
    
}

if ( isset($_POST['motor']) ) {
    $auto = new Auto();
    $motor = (int) $_POST['motor'];
    $puertas = (int) $_POST['puertas'];
    echo $auto->motor($motor) . '<br />';
    echo $auto->puertas($puertas) . '<br />';
    echo $auto->caracteristicas($_POST['caracteristicas']) . '<br />';
}

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="motor">Motor: </label>
            <input type="number" name="motor" required/>
            <br />
            <label for="puertas">Puertas: </label>
            <input type="number" name="puertas" required />
            <br />
            <label for="caracteristicas">Caracteristicas: </label>
            <input type="text" name="caracteristicas" required />
            <br />
            <input type="submit" value="Ingresar" />
        </form>
    </body>
</html>