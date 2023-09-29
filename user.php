<?php
session_start();
class pr9{
        public $db;
        public function __construct(){
           try{
            $this->db = new PDO("mysql:host=localhost;dbname=#YOUR MYSQL DATABASE NAME","#YOUR MYSQL USER NAME" ,"#YOUR MYSQL PASSWORD");
           }
           catch(PDOException$e){
            echo $e->getMessage();
           }
        }
       public function insert($n,$e,$p){
        $this->na = $n;
        $this->em = $e;
        $this->pass = $p;
        try{
         $sql = "INSERT INTO user (name,email,password) VALUES (:value1,:value2,:value3);";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':value1', $this->na, PDO::PARAM_STR);
         $stmt->bindParam(':value2', $this->em, PDO::PARAM_STR);
         $stmt->bindParam(':value3', $this->pass, PDO::PARAM_STR);
         $stmt->execute();
         header('Location:login.php');
        //echo "Record inserted successfully!";
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
        public function varify($e,$p){
                $this->em = $e;
                $this->pass = $p;
                try{
                $sql = "SELECT * FROM user WHERE email=:value1 AND password=:value2";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':value1',$this->em, PDO::PARAM_STR);
                $stmt->bindParam(':value2',$this->pass, PDO::PARAM_STR);
                $stmt->execute();
               // var_dump($stmt);
                $ar = $stmt->rowcount();    
                if ($ar > 0) {
                    $_SESSION['email'] = $this->em;
                    header('Location: userlist.php');
                 }
                else {
                //error_reporting(E_ERROR | E_PARSE);
                 echo '<script>alert("Invalid Email OR Password !!")</script>';
                     }
                 }
                catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
        }
        public function selectuser(){
            try {
            $sql = "SELECT id,name,email,password FROM user;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result; 
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function userdelete($i){
                $this->idd = $i;
                try {   
                    $sql = "DELETE FROM `user` WHERE `id`=:value1;";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':value1',$this->idd, PDO::PARAM_STR);
                    $stmt->execute();
                    header('Location:userlist.php');

                }
                catch(PDOException $e){
                    echo "Error: ".$e->getMessage();
                }
            }
        public function userupdate($i,$n,$e,$p){
            $this->idd = $i;
            $this->na = $n;
            $this->em = $e;
            $this->pass = $p;
            try{
                $sql = "UPDATE user SET name=:value2, email=:value3 , password=:value4 WHERE `id` = :value1;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':value1', $this->idd, PDO::PARAM_STR); 
                $stmt->bindParam(':value2', $this->na, PDO::PARAM_STR);
                $stmt->bindParam(':value3', $this->em, PDO::PARAM_STR);
                $stmt->bindParam(':value4', $this->pass, PDO::PARAM_STR);
                
                $stmt->execute();
                header('Location:userlist.php');
            }
            catch(PDOException $e){
                echo "Error: ".$e.getMessage();
            }
        }
}
?>