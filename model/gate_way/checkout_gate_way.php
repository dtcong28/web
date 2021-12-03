<?php
class CheckOutGateWay
{
    public static function add($data)
    {
        $db = Db::getInstance();
        try {
            $db->beginTransaction();

            $sql = "INSERT INTO `order`(`code`,`customer_id`, `name`, `status`, `ship_address`, `payment_type`, `phone`, `created_at`) VALUES ('$data->code','$data->user_id','$data->name','$data->status','$data->address','$data->payment','$data->phone',NOW())";
            $db->exec($sql);
            $order_id = $db->lastInsertId();

            $id_product_in_order = array_keys($data->order_detail);
            //var_dump($data);
            //exit;
            foreach ($id_product_in_order as $value) {

                $quantity = $data->order_detail[$value]['quantity'];
                $size = $data->order_detail[$value]['size'];
                $color = $data->order_detail[$value]['color'];

                $sql = "INSERT INTO web_sneaker.order_detail(order_id,product_id,unit_price,quantity,size,color,note) VALUES ('$order_id','$value','$data->total_money_order','$quantity','$size','$color','$data->note')";

                $db->exec($sql);
                
            }
            $db->commit();
        } catch (Exception $e) {
            $db->rollBack();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }
}
