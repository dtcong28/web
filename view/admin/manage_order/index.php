<?php
include "view/admin/layout/header.php";
include "view/admin/layout/navbar.php";
include "view/admin/layout/sidebar.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách đơn hàng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Mã đơn</th>
                                        <th>Tên khách</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tình trạng</th>
                                        <th>Chi tiết đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = (!isset($_GET['page'])) ?  1 : $_GET['page'];
                                    $i = 5 * $page;
                                    $j = 4;
                                    foreach ($orders as $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i - $j ?></td>
                                            <td><?= $value->code ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->phone ?></td>
                                            <td><?= $value->ship_address ?></td>
                                            <td>
                                                <span class="manage-o__badge badge--processing">
                                                    <?php
                                                    if ($value->status == 0) {
                                                        echo "Chờ xử lý";
                                                    } elseif ($value->status == 1) {
                                                        echo "Đang vận chuyển";
                                                    } elseif ($value->status == 2) {
                                                        echo "Đã thanh toán";
                                                    } elseif ($value->status == 3) {
                                                        echo "Giao thành công";
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="/?controller=manage_order&action=detail&id=<?= $value->id; ?>">Xem</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $j--;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <?php for ($i = $total_pages; $i >= 1; $i--) : ?>
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="/?controller=manage_order&action=index&page=<?= $i ?>"><?= $i ?></a></li>
                                </ul>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "view/admin/layout/footer.php" ?>