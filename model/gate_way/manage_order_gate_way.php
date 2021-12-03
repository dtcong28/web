<?php
class ManageOrderGateWay
{
    public static function list($page = 1)
    {
        $db = Db::getInstance();
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sql = " SELECT id,code,name,status,ship_address,phone FROM web_sneaker.order ORDER BY id DESC LIMIT $limit OFFSET $offset  ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function total_order()
    {
        $db = Db::getInstance();
        $sql = " SELECT COUNT(*) FROM `order` ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results[0]['COUNT(*)'];
    }
    public static function detail($id)
    {
        $db = Db::getInstance();
        $sql = " SELECT p.id, p.name, p.main_image, od.unit_price, od.quantity, od.size, od.color, od.note FROM order_detail od INNER JOIN product p ON od.product_id = p.id WHERE od.order_id = $id ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function update_status($id, $status)
    {
        $db = Db::getInstance();
        $sql =  "UPDATE web_sneaker.order SET status = '$status' WHERE id = $id";
        // var_dump($sql);
        // exit;
        $db->exec($sql);
    }
    public static function update_status_by_code($id, $status)
    {
        $db = Db::getInstance();
        $sql =  "UPDATE web_sneaker.order SET status = '$status' WHERE  code = '$id'";
        // var_dump($sql);
        // exit;
        $db->exec($sql);
    }
    public static function get_infor($id)
    {
        $db = Db::getInstance();
        $sql = " SELECT id,code,name,ship_address,phone FROM web_sneaker.order WHERE id = $id ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}
