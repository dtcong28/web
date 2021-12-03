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
          <h1 class="m-0">Chi tiết sản phẩm</h1>
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
              <h3 class="card-title">Sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Tên</label>
                  <input type="text" class="form-control" name="name" value="<?= $productID->name ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Giá</label>
                  <input type="number" class="form-control" name="price" value="<?= $productID->price ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Mô tả ngắn</label>
                  <input type="text" class="form-control" name="description" value="<?= $productID->description ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Mô tả chi tiết</label>
                  <!-- /.card-header -->
                  <!-- sử dụng cả thư viện summernote vì thế cần add cả thư viện vào -->
                  <div class="card-body">
                    <textarea id="detail_description" name="detail_description" readonly><?= $productID->detail_description ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Ảnh chính</label>
                  <img style="width: 100px;" src="/public/uploads/product/<?= $id . '/' . $productID->main_image ?>">
                </div>
                <div class="form-group">
                  <label>Ảnh chi tiết</label>
                  <?php
                  $detail_images = explode(',', $productID->detail_image);
                  foreach ($detail_images as $detail_image) :
                  ?>
                    <img style="width: 100px;" src="/public/uploads/product/<?= $id . '/' . $detail_image ?>">
                  <?php endforeach; ?>
                </div>
                <div class="form-group">
                  <label>Kích thước(phân cách nhau bởi dấu ',')</label>
                  <input type="text" class="form-control" name="options[1]" value="<?= $productID->options_sizes ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Màu(phân cách nhau bởi dấu ',')</label>
                  <input type="text" class="form-control" name="options[2]" value="<?= $productID->options_colours ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Danh mục</label>
                  <input type="text" class="form-control" name="category" value="<?php
                                                                                  foreach ($categoryID as $value) :
                                                                                    echo $value->name.',';
                                                                                  endforeach;
                                                                                  ?>" readonly>
                </div>

                <div>
                  <a href="/?controller=product&action=edit&id=<?= $_GET['id']; ?>">Chỉnh sửa</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include "view/admin/layout/footer.php" ?>