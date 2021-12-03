<?php
class AdminHomeGateWay
{
    public static function sum_order()
    {
        $db = Db::getInstance();
        $sql = "SELECT COUNT(*) as sum_order FROM web_sneaker.order ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results[0]['sum_order'];
    }
    public static function sum_user()
    {
        $db = Db::getInstance();
        $sql = "SELECT COUNT(*) as sum_user FROM web_sneaker.user ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results[0]['sum_user'];
    }
}
