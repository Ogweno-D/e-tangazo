<?php
include ("../classes/dbh.class.php");
class Signup extends Dbh{

    //add new user
    protected function setUser($first_name,$last_name,$email,$phone,$password){
        $sql = "INSERT INTO users(first_name,last_name,email,phone,password)
                VALUES(?,?,?,?,?)";
        // hashPassword = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($first_name,$last_name,$email,$phone,$password));  
        if($stmt->rowCount()==1){
            echo "User registed successfully";
        }else{
            echo " Something went  wrong try again";
        }
    }
}