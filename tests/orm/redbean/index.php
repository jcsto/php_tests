<?php
require 'rb.php';

// connect to a db
R::setup( 'mysql:host=localhost;dbname=test', 'root', '' ); //for both mysql or mariaDB

// prevent operations in DB
//R::freeze(1);

// Beans
// Create a table with fields
$user = R::dispense('user');
// options
$user->login = 'jesse';
$user->password = sha1('fish');
$user->email = 'test@test.com';
// IF is Integer the field will be integer, if not, it forces it to a Double
$user->money = 100.4;
// save
$id = R::store($user);
echo $id;

/*
// INSERT and get inserted ID
R::exec( 'INSERT INTO ... ' );
$id = R::getInsertID();
*/

/*
// Update
// Table, ID
$u = R::load('user', 1);
// options
$u->login = 'Dogface';
// save
R::store($u);

// UPDATE
//R::exec( 'UPDATE user SET login="test" WHERE id = 3' );

// Delete
// table, id
$u = R::load('user', 1);
// delete the row
R::trash($u);
*/

// Find
echo '<pre>';
// get data from table
$user = R::findAll('user');
// find a specific row in the table
$foo = R::load('user', $user[2]->id);
// modify a field
$foo->login = 'Pig Pen';
// save changes
R::store($foo);
print_r($foo);
echo '</pre>';

// Fetch data
// get multidimensional array
$data = R::getAll('SELECT * FROM user');
// get SIMPLE row
$data = R::getRow('SELECT * FROM user');
// Binding #1
$data = R::getAll('SELECT * FROM user WHERE id = ?', [2]);
// Binding #2
$data = R::getAll('SELECT * FROM user WHERE id = :id', [':id' => 3]);
print_r($data);

// disconnect
 R::close();