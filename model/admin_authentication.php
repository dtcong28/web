<?php
    class admin_authentication_model {
        public static function login($username,$password)
        {
            $db = Db::getInstance();
            $sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND level =1";
                
            $stmt = $db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $results = $stmt->fetchAll();
            //var_dump($sql);
            return $results;
        }
        public static function num_rows() {
            $db = Db::getInstance();
            $sql = "SELECT COUNT(*) FROM user ";
            
            $stmt = $db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>