<?php
/**
 * Author : Satya Prakash Nandy
 * Objective : To create a connection to my database (Mysql)
 * Date : 13/02/2018
 */
class MyConnection
{
        //---------------------- Define all the configuration --------------------
        private $hostname = "localhost";
        private $username = "root";
        private $database = "awsgallery";
        private $password = "";
        public $con;
        //----------------------- Fuction : Return Connection $con ---------------
        public function getConnection()
        {
                $this->con = null;
                try
                {
                        $this->con = new PDO("mysql:host=".$this->hostname.";dbname=".$this->database,$this->username,$this->password);
                }
                catch(PDOException $exception)
                {
                        echo $exception;
                }
                return $this->con;
        }
}
/*
	Test the connection by creating an object of the class Myconnection
	$object = new MyConnection();
	$object->getConnection();
*/
?>