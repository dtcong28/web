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
                    <h1 class="m-0">Tất cả người dùng</h1>
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
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = (!isset($_GET['page'])) ?  1 : $_GET['page'];
                                    $i = 5 * $page;
                                    $j = 4;
                                    foreach ($user as $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i - $j ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->phone ?></td>
                                            <td><?= $value->date_of_birth ?></td>
                                            <td><?= $value->gender ?></td>
                                            <td><?= $value->email ?></td>
                                            <td><?= $value->address ?></td>
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
                                    <li class="page-item"><a class="page-link" href="/?controller=user&action=list&page=<?= $i ?>"><?= $i ?></a></li>
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