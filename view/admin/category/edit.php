<?php
include "view/admin/layout/header.php";
include "view/admin/layout/navbar.php";
include "view/admin/layout/sidebar.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chỉnh sửa danh mục</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" name="name" value="<?= $category->name ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control" rows="3"><?= $category->description ?></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select class="custom-select" name="parent_id">
                                            <?php if ($category->parent_id == NULL) : ?>
                                                <option value='' selected>Chọn danh mục cha</option>
                                            <?php else:?>
                                                <option value=''>Chọn danh mục cha</option>
                                            <?php foreach ($category_1 as $value) : ?>
                                                <?php if($category->parent_id == $value->id) : ?>
                                                    <option value='<?= $value->id?>' selected><?= $value->name ?></option>
                                                <?php endif; ?>
                                            <?php 
                                                endforeach; 
                                            endif;
                                            ?>
                                            <?php foreach ($category_1 as $value) : ?>
                                                <?php if ($category->parent_id != $value->id) : ?>
                                                    <option value='<?= $value->id ?>'><?= $value->name ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit_product">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <?php include "view/admin/layout/footer.php" ?>