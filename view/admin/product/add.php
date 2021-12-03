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
          <h1 class="m-0">Thêm mới sản phẩm</h1>
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
                  <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                  <label>Giá</label>
                  <input type="number" class="form-control" name="price" placeholder="Giá">
                </div>
                <div class="form-group">
                  <label>Mô tả ngắn</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Mô tả ..."></textarea>
                </div>
                <div class="form-group">
                  <label>Mô tả chi tiết</label>
                  <!-- /.card-header -->
                  <!-- sử dụng cả thư viện summernote vì thế cần add cả thư viện vào -->
                  <!-- <div class="card-body"> -->
                  <textarea id="detail_description" name="detail_description"></textarea>
                  <!-- </div> -->
                </div>

                <div class="form-group">
                  <label>Ảnh chính</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="main_image" required>
                      <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Ảnh chi tiết</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="detail_image[]" multiple required>
                      <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kích thước(phân cách nhau bởi dấu ',' để nhập nhiều kết quả)</label>
                  <input type="text" class="form-control" name="options[1]" placeholder="Kích thước">
                </div>
                <div class="form-group">
                  <label>Màu(phân cách nhau bởi dấu ',' để nhập nhiều kết quả)</label>
                  <input type="text" class="form-control" name="options[2]" placeholder="Màu">
                </div>

                <!-- xử lý category -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Danh Mục</h3>
                      </div>
                      <!-- ./card-header -->
                      <?php foreach ($value as $v): 
                        echo $v;
                      endforeach; ?>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_product">Gửi</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include "view/admin/layout/footer.php" ?>