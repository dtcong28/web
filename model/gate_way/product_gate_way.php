<?php
class ProductGateWay
{
     public static function add($data)
     {
          $db = Db::getInstance();
          // $sizes = explode(",", $data->options[1]);
          // $colours = explode(",", $data->options[2]);

          $array_details_image = $data->detail_image;
          $string_details_image = implode(",", $array_details_image);

          try {
               $db->beginTransaction();
               $sql_1 = " INSERT INTO web_sneaker.product (name,price,description,detail_description,main_image, detail_image ) 
               VALUES ('$data->name',' $data->price','$data->description','$data->detail_description','$data->main_image','$string_details_image') ";

               $db->exec($sql_1);
               $product_id = $db->lastInsertId();

               // $id_size = 1;
               // $id_colour = 2;
               $options = $data->options;

               if (!empty($options)) {
                    foreach ($options as $key => $values) {
                         $sql_2 = " INSERT INTO web_sneaker.product_option (product_id,option_id) 
                         VALUES ('$product_id','$key') ";
                         $db->exec($sql_2);
                         $product_option_id = $db->lastInsertId();

                         $option_values = explode(",", $values);
                         // var_dump($product_option_id);
                         // var_dump($option_values);
                         // exit;
                         foreach ($option_values as $value) :
                              $sql_3 = " INSERT INTO web_sneaker.product_option_value (value_name,product_option_id) 
                              VALUES ('$value','$product_option_id') ";
                              $db->exec($sql_3);
                         endforeach;
                    }
               }

               $db->commit();
          } catch (Exception $e) {
               $db->rollBack();
               print "Error!: " . $e->getMessage() . "</br>";
          }
          // return về cái ID vừa được thêm mới ở đây
          return $product_id;
     }
     public static function add_category($data, $id_product)
     {
          $db = Db::getInstance();
          $categories = $data->category;
          foreach ($categories as $category) {
               $sql = "INSERT INTO web_sneaker.product_category (product_id,category_id) VALUES('$id_product','$category')";
               $db->exec($sql);
          }
     }
     public static function total_product(){
          $db = Db::getInstance();
          $sql = " SELECT COUNT(*) FROM `product` ";
          // var_dump($sql);
          // exit;
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $results = $stmt->fetchAll();
          return $results[0]['COUNT(*)'];
     }
     public static function list($page = 1)
     {
          $db = Db::getInstance();
          $limit = 5;
          $offset = ($page - 1)*$limit;
          $sql = " SELECT * FROM web_sneaker.product ORDER BY id DESC LIMIT $limit OFFSET $offset ";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $results = $stmt->fetchAll();
          $i = 0;
          foreach ($results as $result) {
               $spID[$i] = new product_model();
               $spID[$i]->id = $result['id'];
               $spID[$i]->name = $result['name'];
               $spID[$i]->price = $result['price'];
               $spID[$i]->description = $result['description'];
               $spID[$i]->detail_description = $result['detail_description'];
               $spID[$i]->main_image = $result['main_image'];
               $spID[$i]->detail_image = $result['detail_image'];
               $i++;
          }
          return $spID;
     }
     public static function list_client($page = 1)
     {
          $db = Db::getInstance();
          $limit = 9;
          $offset = ($page - 1)*$limit;
          $sql = " SELECT * FROM web_sneaker.product LIMIT $limit OFFSET $offset ";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $results = $stmt->fetchAll();
          $i = 0;
          foreach ($results as $result) {
               $spID[$i] = new product_model();
               $spID[$i]->id = $result['id'];
               $spID[$i]->name = $result['name'];
               $spID[$i]->price = $result['price'];
               $spID[$i]->description = $result['description'];
               $spID[$i]->detail_description = $result['detail_description'];
               $spID[$i]->main_image = $result['main_image'];
               $spID[$i]->detail_image = $result['detail_image'];
               $i++;
          }
          return $spID;
     }
     public static function delete($id)
     {
          $db = Db::getInstance();
          $sql = "DELETE FROM web_sneaker.product WHERE id = $id";
          $db->exec($sql);
          $sql_1 = "DELETE FROM web_sneaker.product_category WHERE product_id = $id";
          $db->exec($sql_1);
     }
     public static function getProduct($id)
     {
          $db = Db::getInstance();
          $sql = "SELECT p.id,p.name, p.price, p.description, p.detail_description, p.main_image,p.detail_image, GROUP_CONCAT(pov.value_name SEPARATOR ',') as values_name
                         FROM web_sneaker.product p 
                         INNER JOIN web_sneaker.product_option po ON p.id =po.product_id 
                         INNER JOIN web_sneaker.product_option_value pov ON po.id = pov.product_option_id
                         WHERE p.id = $id
                         GROUP BY pov.product_option_id ";
          // $sql_1 = "SELECT * FROM web_sneaker.product WHERE id = $id ";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $results = $stmt->fetchAll();

          $row = $results;
          $data = array();
          $data["id"] = $row[0]["id"];
          $data["name"] = $row[0]["name"];
          $data["price"] = $row[0]["price"];
          $data["description"] = $row[0]["description"];
          $data["detail_description"] = $row[0]["detail_description"];
          $data["main_image"] = $row[0]["main_image"];
          $data["detail_image"] = $row[0]["detail_image"];
          $data["size"] = $row[0]["values_name"];
          $data["colour"] = $row[1]["values_name"];

          $spID = new product_model();
          $spID->id = $data['id'];
          $spID->name = $data['name'];
          $spID->price = $data['price'];
          $spID->description = $data['description'];
          $spID->detail_description = $data['detail_description'];
          $spID->main_image = $data['main_image'];
          $spID->detail_image = $data['detail_image'];
          $spID->options_sizes = $data['size'];
          $spID->options_colours = $data['colour'];
          return $spID;
     }
     public static function getCategory($id)
     {
          $db = Db::getInstance();
          $sql = "SELECT a.*, b.name FROM web_sneaker.product_category a INNER JOIN category b WHERE product_id = $id AND a.category_id = b.id";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $stmt->execute();
          $results = $stmt->fetchAll();
          //var_dump($sql);
          // $dmID = new product_model();
          // // xử lý gán dữ liệu vào obj
          // while($row = $stmt->fetch()) {
          //      echo $row->name , '\n';
          //      echo $row->email , '\n';
          //      echo $row->age , '\n';
          //  }
          return $results;
     }
     public static function update($data)
     {
          $db = Db::getInstance();

          // Get all options 
          $options = $data->options;
          // var_dump($_POST);
          // exit;
          $array_details_image = $data->detail_image;
          $string_details_image = implode(",", $array_details_image);

          $categories = $data->category;

          try {
               $db->beginTransaction();
               $sql_1 = " UPDATE web_sneaker.product SET name = '$data->name',
               price = '$data->price',description = '$data->description',detail_description='$data->detail_description',
               main_image = '$data->main_image', detail_image = '$string_details_image' 
               WHERE id = '$data->id'";
               $db->exec($sql_1);

               // Loop to all options
               if (!empty($options)) {
                    foreach ($options as $key => $values) {
                         //var_dump($product_id);
                         $sql_2 = "SELECT id FROM web_sneaker.product_option 
                    WHERE product_id = '$data->id' AND option_id = $key  ";

                         $stmt = $db->prepare($sql_2);
                         $stmt->setFetchMode(PDO::FETCH_ASSOC);
                         $stmt->execute();
                         $result = $stmt->fetchAll();
                         $product_option_id = $result[0]["id"];
                         // var_dump($product_option_id);
                         // exit;

                         $sql_3 = "SELECT id FROM web_sneaker.product_option_value 
                    WHERE product_option_id = $product_option_id ";

                         $stmt = $db->prepare($sql_3);
                         $stmt->setFetchMode(PDO::FETCH_ASSOC);
                         $stmt->execute();
                         // lấy ra product_option_value_id
                         $product_option_value_id = $stmt->fetchAll();

                         // đưa các product_option_value_id vào 1 mảng để dễ quản lý
                         $pov_id = array(); // số lượng product_option_value_id đã có trong db 
                         for ($i = 0; $i < count($product_option_value_id); $i++) {
                              $pov_id[$i] = $product_option_value_id[$i]['id'];
                         }
                         $option_values =  explode(",", $values);
                         if (count($option_values) == count($pov_id)) {
                              $i = 0;
                              foreach ($option_values as $value) :
                                   $sql_4 = " UPDATE web_sneaker.product_option_value 
                                   SET value_name = '$value' 
                                   WHERE id = '$pov_id[$i]'";
                                   $db->exec($sql_4);
                                   $i++;
                              endforeach;
                         } elseif (count($option_values) > count($pov_id)) {
                              for ($i = 0; $i < count($pov_id); $i++) {
                                   $sql_5 = " UPDATE web_sneaker.product_option_value 
                                   SET value_name = '$option_values[$i]'
                                   WHERE id = '$pov_id[$i]'";
                                   $db->exec($sql_5);
                              }
                              //$chech_size = count($sizes) - count($pov_id);
                              for ($i = count($pov_id); $i < count($option_values); $i++) {
                                   $sql_6 = " INSERT INTO web_sneaker.product_option_value (value_name,product_option_id) 
                              VALUES ('$option_values[$i]','$product_option_id') ";
                                   $db->exec($sql_6);
                              }
                         } else {
                              for ($i = 0; $i < count($option_values); $i++) {
                                   $sql_7 = " UPDATE web_sneaker.product_option_value 
                                   SET value_name = '$option_values[$i]'
                                   WHERE id = '$pov_id[$i]'";
                                   $db->exec($sql_7);
                              }
                              for ($i = count($option_values); $i < count($pov_id); $i++) {
                                   $sql_7 = " DELETE FROM web_sneaker.product_option_value 
                                   WHERE id = '$pov_id[$i]'";
                                   $db->exec($sql_7);
                              }
                         }
                    }
               }

               if (!empty($categories)) {
                    $sql_8 = "SELECT id FROM web_sneaker.product_category WHERE product_id = $data->id";
                    $stmt = $db->prepare($sql_8);
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $product_category_id = $stmt->fetchAll();

                    if (count($categories) == count($product_category_id)) {
                         $i = 0;
                         foreach ($categories as $category) :
                              $id = $product_category_id[$i]['id'];
                              $sql_9 = "UPDATE web_sneaker.product_category SET category_id = '$category' WHERE id = $id";
                              $db->exec($sql_9);
                              $i++;
                         // xử lý cập nhật danh mục
                         endforeach;
                         //var_dump($sql_9);
                    } elseif (count($categories) > count($product_category_id)) {
                         for ($i = 0; $i < count($product_category_id); $i++) {
                              $id = $product_category_id[$i]['id'];
                              $sql_10 = " UPDATE web_sneaker.product_category 
                              SET category_id = '$categories[$i]'
                              WHERE id = $id";
                              $db->exec($sql_10);
                         }
                         //$chech_size = count($sizes) - count($pov_id);
                         for ($i = count($product_category_id); $i < count($categories); $i++) {
                              $sql_11 = " INSERT INTO web_sneaker.product_category (product_id, category_id) 
                         VALUES ('$data->id','$categories[$i]') ";
                              $db->exec($sql_11);
                         }
                    } else {
                         for ($i = 0; $i < count($categories); $i++) {
                              $id = $product_category_id[$i]['id'];
                              $sql_12 = " UPDATE web_sneaker.product_category 
                              SET category_id = '$categories[$i]'
                              WHERE id = $id";
                              $db->exec($sql_12);
                         }
                         for ($i = count($categories); $i < count($product_category_id); $i++) {
                              $id = $product_category_id[$i]['id'];
                              $sql_13 = " DELETE FROM web_sneaker.product_category 
                              WHERE id = $id";
                              $db->exec($sql_13);
                         }
                    }
               }

               $db->commit();
          } catch (Exception $e) {
               $db->rollBack();
               print "Error!: " . $e->getMessage() . "</br>";
          }
     }
     public static function get_new_product()
     {
          $db = Db::getInstance();
          $sql = "SELECT * FROM web_sneaker.product LIMIT 5";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $stmt->execute();
          $results = $stmt->fetchAll();

          return $results;
     }
     public static function get_special_product()
     {
          $db = Db::getInstance();
          $sql = "SELECT * FROM web_sneaker.product WHERE price >2000000 LIMIT 5";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $stmt->execute();
          $results = $stmt->fetchAll();
          return $results;
     }

     public static function flash_deal()
     {
          $db = Db::getInstance();
          $sql = "SELECT * FROM web_sneaker.product WHERE price < 2000000 LIMIT 5";
          $stmt = $db->prepare($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $stmt->execute();
          $results = $stmt->fetchAll();
          return $results;
     }

     public static function filter($category, $price_min, $price_max)
     {
          $db = Db::getInstance();
          $i = 0;
          if ($category == NULL && $price_min != NULL && $price_max != NULL) {
               $sql = " SELECT p.* FROM web_sneaker.product p INNER JOIN product_category pc ON p.id = pc.product_id WHERE price BETWEEN $price_min AND $price_max ";
               $stmt = $db->prepare($sql);
               $stmt->setFetchMode(PDO::FETCH_OBJ);
               $stmt->execute();
               $results = $stmt->fetchAll();
               return $results;
          }else{
               foreach ($category as $v) {
                    $sql = " SELECT p.* FROM web_sneaker.product p INNER JOIN product_category pc ON p.id = pc.product_id WHERE category_id = $v AND price BETWEEN $price_min AND $price_max ";
                    $stmt = $db->prepare($sql);
                    $stmt->setFetchMode(PDO::FETCH_OBJ);
                    $stmt->execute();
                    $results[$i] = $stmt->fetchAll();
                    $i++;
               }
               return $results[0];
          }
     }
}
