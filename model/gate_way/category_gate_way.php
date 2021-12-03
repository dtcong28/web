<?php
class CategoryGateWay
{
    public static function add($data)
    {
        $db = Db::getInstance();
        // if(!empty($data->parent_id)){
        //     $sql = " INSERT INTO web_sneaker.category (name,description,parent_id)
        //     VALUES ('$data->name','$data->description',$data->parent_id) ";
        // }else{
        //     $sql = " INSERT INTO web_sneaker.category (name,description)
        //     VALUES ('$data->name','$data->description') ";
        // }
        // var_dump($sql);
        // exit;
        $stmt = $db->prepare("INSERT INTO web_sneaker.category (name,description,parent_id)
        VALUES (:name, :description, :parentId)");
        $stmt->bindParam(':name', $data->name);
        $stmt->bindParam(':description', $data->description);
        $parent_id = $data->parent_id;
        if (!empty($parent_id)) {
            $stmt->bindParam(':parentId', $data->parent_id);
        } else {
            $stmt->bindValue(':parentId', null, PDO::PARAM_INT);
        }
        $stmt->execute();
    }
    public static function total_category()
    {
        $db = Db::getInstance();
        $sql = " SELECT COUNT(*) FROM `category` ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results[0]['COUNT(*)'];
    }
    public static function list($page=1)
    {
        $db = Db::getInstance();
        //$sql = "SELECT * FROM web_sneaker.category";
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sql = " SELECT * FROM web_sneaker.category ORDER BY id DESC LIMIT $limit OFFSET $offset ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $i = 0;
        foreach ($results as $result) {
            $dm[$i] = new category_model();
            $dm[$i]->id = $result['id'];
            $dm[$i]->name = $result['name'];
            $dm[$i]->description = $result['description'];
            $dm[$i]->parent_id = $result['parent_id'];
            $i++;
        }
        return $dm;
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $sql = "DELETE FROM web_sneaker.category WHERE id = $id";
        $db->exec($sql);
    }
    public static function getCategory($id)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM web_sneaker.category WHERE id = $id";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $dmID = new category_model();
        $dmID->id = $result[0]["id"];
        $dmID->name = $result[0]["name"];
        $dmID->description = $result[0]["description"];
        $dmID->parent_id = $result[0]["parent_id"];
        return $dmID;
    }
    public static function update($data)
    {
        $db = Db::getInstance();
        if ($data->parent_id == '') {
            $sql =  "UPDATE web_sneaker.category SET name = '$data->name', description = '$data->description', parent_id = NULL where id = $data->id";
        } else {
            $sql =  "UPDATE web_sneaker.category SET name = '$data->name', description = '$data->description', parent_id = '$data->parent_id' where id = $data->id";
        }
        $db->exec($sql);
    }
    public static function get_family_tree()
    {
        $db = Db::getInstance();
        $sql = "SELECT id, name, getpath(id) AS path FROM web_sneaker.category";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // kiểu dữ liệu được trả về khi select 
        $stmt->execute(); // 
        $results = $stmt->fetchAll();

        $i = 0;

        foreach ($results as $result) {
            $family_tree[$i] = new category_model();
            $family_tree[$i]->id = $result['id'];
            $family_tree[$i]->name = $result['name'];
            $family_tree[$i]->path = $result['path'];
            $i++;
        }

        //exit;
        return $results;
    }

    // public function fetchCategoryTree($parent = NULL, $spacing = '', $user_tree_array = '')
    // {
    //     if (!is_array($user_tree_array))
    //         $user_tree_array = array();
    //     $db = Db::getInstance();
    //     $sql = "SELECT `id`, `name`, `parent_id` FROM `category` WHERE 22 AND `parent_id` = $parent ORDER BY id ASC";
    //     //  $stmt = $db->prepare($sql);
    //     $stmt = $db->query($sql);
    //     $stmt->setFetchMode(PDO::FETCH_OBJ);
    //     $stmt->execute();
    //     $count = $stmt->fetchColumn();
    //     //$query = mysql_query($sql);
    //     //$stmt->execute();
    //     if ($count > 0) {
    //         while ($row = $stmt->fetch()) {
    //             $user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->name);
    //             $user_tree_array = $this->fetchCategoryTree($row->id, $spacing . '&nbsp;&nbsp;', $user_tree_array);
    //         }
    //     }
    //     return $user_tree_array;
    // }
    function fetchCategoryTreeList($parent = NULL, $user_tree_array = '')
    {
        if (!is_array($user_tree_array))
            $user_tree_array = array();
        $db = Db::getInstance();
        $parent_query = $parent == NULL ? "parent_id IS NULL" : "parent_id = $parent";
        $sql = "SELECT id, name, parent_id FROM web_sneaker.category WHERE 1 AND $parent_query ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $user_tree_array[] = "<ul >";
            while ($row = $stmt->fetch()) {
                $user_tree_array[] = "<li class='category'><input type='checkbox' name=category[] value=$row->id>" . " " . $row->name . "</li>";
                $user_tree_array = $this->fetchCategoryTreeList($row->id, $user_tree_array);
            }
            $user_tree_array[] = "</ul>";
        }
        return $user_tree_array;
    }
}
