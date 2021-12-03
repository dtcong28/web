<?php
class AccountGateWay
{
    public static function get()
    {
        $id = $_SESSION['user_client'][0]->id;
        $db = Db::getInstance();
        $sql = "SELECT * FROM web_sneaker.user WHERE id = $id ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        
        return $results[0];
    }
    public static function add($data)
    {
        $id = $_SESSION['user_client'][0]->id;
        $db = Db::getInstance();
        $sql = " UPDATE `user` SET `address` = '$data' WHERE `user`.`id` = $id; ";
        $db->exec($sql);
    }
    public static function update($data){
        $id = $_SESSION['user_client'][0]->id;
        $db = Db::getInstance();
        $sql = " UPDATE `user` SET `address` = '$data->address', `name` = '$data->name',`phone` = '$data->phone' WHERE `user`.`id` = $id; ";
        $db->exec($sql);
    }
    public static function get_infor_order($id){
        $db = Db::getInstance();
        // $sql = "SELECT o.code,o.status, od.unit_price FROM `order` o INNER JOIN order_detail od WHERE o.id = od.order_id AND o.customer_id = $id  ";
        $sql = "SELECT code,status,created_at FROM `order`  WHERE customer_id = $id  ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}
