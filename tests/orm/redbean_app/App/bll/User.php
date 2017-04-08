<?php
require '../dal/rb.php';
require '../http/Request.php';

/**
 * User Controller
 */
class User {
    
    const TABLE         = 'users';
    const PRIMARY_KEY   = 'id';
    
    public function insert(Request $request)
    {
        $user = R::dispense(TABLE);
        // options
        $user->login = $request->login;
        $user->password = sha1($request->password);
        $user->email = $request->email;
        // save
        $id = R::store($user);
    }
    
    public function delete(Request $request)
    {
        $user = $request->getId();
        $u = R::load(TABLE, $user);
        R::trash($u);
    }
    
    public function modify(Request $request)
    {
        
    }
    
    public function read()
    {
        
    }
    
}