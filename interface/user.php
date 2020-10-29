<?php
    session_start();
    include_once 'account.php';
    class User implements Account{
        private $First_Name;
        private $Middle_Name;
        private $Last_Name;
        private $email;
        private $city;
        private $profilepic;
        private $passkey;

        public function setFirstName($firstname){
            $this->First_Name = $firstname;
        }

        public function getFirstName(){
            return $this->First_Name;
        }

        public function setMiddleName($middlename){
            $this->Middle_Name = $middlename;
        }

        public function getMiddleName(){
            return $this->Middle_Name;
        }

        public function setLastName($lastname){
            $this->Last_Name = $lastname;
        }

        public function getLastName(){
            return $this->Last_Name;
        }

        public function setEmail($emailadd){
            $this->email = $emailadd;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getCity(){
            return $this->city;
        }

        public function setProfilePic($Profilepic){
            $this->profilepic = $Profilepic;
        }

        public function getProfilePic(){
            return $this->profilepic;
        }

        public function setPasskey($Passkey){
            $this->passkey = $Passkey;
        }
        
        public function getPasskey(){
            return $this->passkey;
        }

        public function register ($pdo){
            //hash the password

            //Prepare a statement
            try {
                //Prepare a query
                $stm = $pdo->prepare("INSERT INTO assigno1 (First_name, Middle_name, Last_name, Email, City, ProfilePic, Passkey) VALUES(?,?,?,?,?,?,?)");
                $stm->execute([$this->getFirstName(), $this->getMiddleName(), $this->getLastName(), $this->getEmail(), $this->getCity(), $this->getProfilePic(), $this->getPasskey()]);
                $stm = null;
                return "Registration was Successful!";
            } catch (PDOException $ex) {
                return $ex->getMessage();
                //in production return a generic message but you need to log the specific message.
            }
        }

        public function login($pdo){
            try {
                $stmt = $pdo->prepare("SELECT Email From assigno1 WHERE Email = ? LIMIT 1");
                $stmt->execute([$this->getEmail()]);
                while($row = $stmt->fetch()){
                    $retrievedEmail = $row['Email'];
                }
                if($retrievedEmail == $this->email){
                    $_SESSION['User'] = $this->getEmail();
                    $sess = session_id();
                    $insert = $pdo->prepare("INSERT INTO tablelogin(Email, Passkey, SessionID)VALUES(?,?,?)");
                    $insert->execute([$this->getEmail(), $this->getPasskey(), $sess]);
                    $stmt = null;

                    header("location: ../homepage.php");
                }
            } catch (PDOException $ex) {
                return $ex->getMessage();
            }

        }

        public function changePassword($pdo){
            try {
                $stmtpswrd = $pdo->prepare("UPDATE assigno1 SET Passkey = ?");
                
            } catch (PDOException $ex) {
                return $ex->getMessage();
            }


        }

        public function logout ($pdo){
            session_destroy();
            header("location: ../login form.php");
            
        }
            
    }
?>