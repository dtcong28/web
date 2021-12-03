<?php
class ReportGateWay
{
    static function baoCaoSoLuongDonHang()
    {
        $db = Db::getInstance();
        $year = date("Y");
        $sql = "SELECT od.status,MONTH(`created_at`) as month, COUNT(status) as total FROM `order` as od WHERE YEAR(`created_at`) = $year GROUP BY MONTH(`created_at`);";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        for ($x = 0; $x <= 11; $x++){
            $data[$x] = 0;
        }
        foreach($results as $value){
            $data[(int)$value['month']-1] = (int)$value['total'];
        }
        return $data;
    }
    static function baoCaoTrangThaiDonHang()
    {
        $db = Db::getInstance();
        $sql = "SELECT status, COUNT(status) as SoLuongTrangThai FROM `order` GROUP BY status ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $i = 0;
        foreach($results as $value){
            $data[$i] = $value['SoLuongTrangThai'];
            $i++;
        }
        return $data;
        //var_dump($results);
        // trả về 1 mảng trạng thái đơn hàng
        // 'Chờ xử lý',
        //   'Đang vận chuyển',
        //   'Đã thanh toán',
        //   'Giao thành công',
    }
}
