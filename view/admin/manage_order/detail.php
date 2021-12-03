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
                    <h1 class="m-0">Đơn hàng <?= $infor[0]->code ?></h1>
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
                            <h4>Tổng tiền: <?= number_format($detail_order[0]->unit_price) . ' VND' ?> </h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                        <th>Màu sắc</th>
                                        <th>Chú ý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($detail_order as $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value->name ?></td>
                                            <td>
                                                <img style="width: 60px;" src="public/uploads/product/<?= $value->id . '/' . $value->main_image; ?>">
                                            </td>
                                            <td><?= $value->quantity ?></td>
                                            <td><?= $value->size ?></td>
                                            <td><?= $value->color ?></td>
                                            <td><?= $value->note ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-sm-6 pt-4">
                                <h5>Thông tin khách hàng:</h5>
                                <ul>
                                    <li> <?= $infor[0]->name ?></li>
                                    <li> <?= $infor[0]->phone ?></li>
                                    <li> <?= $infor[0]->ship_address ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 pt-1">
                                <!-- radio -->
                                <form class="form-group" method="post">
                                    <h5>Tình trạng đơn hàng</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" value=0>
                                        <label class="form-check-label">Chờ xử lý</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" value=1>
                                        <label class="form-check-label">Đang vận chuyển</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" value=2>
                                        <label class="form-check-label">Đã thanh toán</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" value=3>
                                        <label class="form-check-label">Giao thành công</label>
                                    </div>
                                    <div class="pt-3">
                                        <button type="submit" class="btn btn-success" name="submit">Cập nhật trạng thái</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "view/admin/layout/footer.php" ?>