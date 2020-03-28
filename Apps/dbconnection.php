<?php
class dbconnection{
    function  connection(){
    $con=new mysqli("localhost", "root", "", "TBS"); //connection string
    return $con;
    }
}
?>
