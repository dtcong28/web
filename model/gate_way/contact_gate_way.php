<?php
class ContactGateWay
{
    public static function add($data)
    {
        $db = Db::getInstance();

        $sql = " INSERT INTO `config` (`key`,`value`) 
               VALUES ('address','$data->address')";
        $db->exec($sql);

        $sql_1 = " INSERT INTO `config` (`key`,`value`)
               VALUES ('email','$data->email')";
        $db->exec($sql_1);

        $sql_2 = " INSERT INTO `config` (`key`,`value`)
               VALUES ('phone','$data->phone')";
        $db->exec($sql_2);
    }
    public static function list()
    {
        $db = Db::getInstance();
        $sql = " SELECT * FROM web_sneaker.config ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $value = array();
        foreach ($results as $result) {
            $value[$result["key"]] = $result["value"];
        }
        return $value;
    }
    public static function update($data)
    {
        $db = Db::getInstance();
        //UPDATE `config` SET `value` = 'HCM' WHERE `config`.`key` = 'address';
        $sql =  "UPDATE `config` SET `value` = '$data->address' WHERE `config`.`key` = 'address'";
        // var_dump($sql);
        // exit;
        $db->exec($sql);

        $sql_1 =  "UPDATE `config` SET `value` = '$data->email' WHERE `config`.`key` = 'email'";
        $db->exec($sql_1);

        $sql_2 =  "UPDATE `config` SET `value` = '$data->phone' WHERE `config`.`key` = 'phone'";
        $db->exec($sql_2);
    }
}
