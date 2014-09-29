<?php
/**
 * 
 */

class Auth
{
    

    public static function handleLogin()
    {
        @session_start();
        $logged = $_SESSION['logged'];
        $level  = $_SESSION['level'];
        if(($logged == false) ||($level =='admin')) {
            session_destroy();
            header('location:'.URL.'login');
            exit;
        }
    }

    public static function handloginAdmin()
    {
        @session_start();
        $logged = $_SESSION['logged'];
        // echo $logged; die;
        $level  = $_SESSION['level'];

        if (($logged == false) ||($level =='user')) {
            session_destroy();
            header('location:'.URL.'login');
            exit;
        }    

    }
    
}