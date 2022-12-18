<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','crud_oop');

    class DB_con {
        function __construct()
        {
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn ;

            if(mysqli_connect_errno()){
                echo "Fail to connect mysql database : ". mysqli_connect_error();
            }
        }

        public function insert($Firstname,$Lastname,$Email,$PhoneNumber,$Address){
            $result = mysqli_query($this->dbcon, "INSERT INTO users(Firstname, Lastname, Email, PhoneNumber, Address)
                                                VALUE('$Firstname','$Lastname','$Email','$PhoneNumber','$Address')");
            return $result;
        }

        public function fetchdata(){
            $result = mysqli_query($this->dbcon, "SELECT * FROM users");
            return $result;
        }

        public function fetchonerecord($userid){
            $result = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id = '$userid'");
            return $result;
        }

        public function update($Firstname,$Lastname,$Email,$PhoneNumber,$Address, $userid){
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
            Firstname = '$Firstname',
            Lastname = '$Lastname',
            Email = '$Email',
            PhoneNumber = '$PhoneNumber',
            Address = '$Address'
            WHERE id='$userid' 
            ");
            return $result;
        }

        public function delete($userid){
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM users WHERE id='$userid'");
            return $deleterecord;
        }
    }
?>