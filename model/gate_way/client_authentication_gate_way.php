<?php
class ClientAuthenticationGateWay
{
    public static function add($data)
    {
        $db = Db::getInstance();
        $sql = " INSERT INTO `user` (`name`,`phone`,`date_of_birth`,`gender`,`password`,`email`,`level`) 
               VALUES ('$data->name','$data->phone','$data->birthday','$data->gender','$data->password','$data->email','$data->level')";
        $db->exec($sql);
        
    }
    public static function login($username,$password)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND level = 0";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        //var_dump($sql);
        return $results;
    }
    public static function num_rows()
    {
        $db = Db::getInstance();
        $sql = "SELECT COUNT(*) FROM user ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
