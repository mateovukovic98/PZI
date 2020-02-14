<?php

    session_start();

    function checkSession(){
        if(isset($_SESSION['email'])){
            return true;
        }else{
            return false;
        }
    }
    
    function checkAdminSession(){
        if(isset($_SESSION['email'])){
            if($_SESSION['email'] == 'admin@gmail.com'){
                return true;
            }
        }
        return false;
    }

    function removeSession(){
        unset($_SESSION['email']);
    }

?>
