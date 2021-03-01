<?php

class Model
{
    public $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost", "nitin", "nitin", "stackoverflow");
        if ($this->con->connect_error) {
            // echo "<script>alert('not connected')</script>";
        } else {
            //echo "<script>alert('connected')</script>";
        }
    }

    public function insert_data()
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass1'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['pass1'];
            //   $confirmpassword = $_POST['confirmpassword'];
            echo $name;
            $qry = "insert into User (name,email,password) values('$name','$email','$password')";
            $result = mysqli_query($this->con, $qry);
            if ($result->num_rows > 0) {
                echo "<h1 style='color:red'>Logged</h1>";
            } else {
                echo "<h1 style='color:red'>not Logged</h1>";
            }
        } else {
            return "";
        }
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            echo $_POST['email'];
            echo $_POST['password'];
            echo $_POST['confirmpassword'];

            $qry = "select * from User where email='$email' && password='$password'";
            $result = mysqli_query($this->con, $qry);

            if (mysqli_num_rows($result) > 0) {
                //echo "<script>alert('logged')</script>";
                header('location:view/index.php');
            } else {

                header('location:view/login.php');
            }
        }
    }
}
