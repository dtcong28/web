<?php
class user_model
{
    public static function list($page = 1)
    {
        $db = Db::getInstance();
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM `user` WHERE id != 0 ORDER BY id DESC LIMIT $limit OFFSET $offset";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function total_user()
    {
        $db = Db::getInstance();
        $sql = " SELECT COUNT(*) FROM `user` ";
        // var_dump($sql);
        // exit;
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results[0]['COUNT(*)'];
    }
}
