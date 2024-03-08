<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans

    class User {

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        
        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function RegisterUser(){
            $status = false;
            $errors=[];
            if($this->username != "" || $this->password != ""){

                // Check user exist
                if(true){
                    array_push($errors, "Username bestaat al.");
                } else {
                    // username opslaan in tabel login
                    // INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '');
                    // Manier 1
                    $sql = "INSERT INTO user VALUES (:name, :pwd, '')";
                    $query = $conn->prepare($sql);
                    $query->execute([
                        'name'=>$username,
                        'pwd'=>$password
                        ]);
                }
                            
                
            }
            return $errors;
        }

        function ValidateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }

            // Test username > 3 tekens en < 50 tekens
            $len_username = strlen($this->username);
        echo $len_username;
        echo "</br>";

            
            return $errors;
        }

        public function LoginUser(){

            // Connect database
           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Zoek user in de table user
           echo "Username:" . $this->username;


            // Indien gevonden dan sessie vullen\
            if($_POST['username'] != "" || $_POST['password'] != ""){
                $username = $_POST['username'];
                $password = $_POST['password'];
            
                $sql = "SELECT * FROM user WHERE username= :name AND password= :pwd ";
                $query = $conn->prepare($sql);
                $query->execute([
                    'name'=>$username,
                    'pwd'=>$password
                    ]);
            }
            return true;
        }

        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set

            

            return false;
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            header('location: index.php');
           
        }
    }

