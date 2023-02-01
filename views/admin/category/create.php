<?php require_once('views/admin/layouts/index.php'); ?> 

<?php startblock('title') ?>
<!-- Create Category -->
<?php endblock() ?>

<?php startblock('content') ?>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
              <h3 class="mb-0">Thêm danh mục sản phẩm</a></h3>
      </div>
      <div class="card-header border-0">
        <form action="<?php echo url('admin/category/store') ?>" method="POST" >
          <div class="form-group">
            <label for="exampleFormControlInput1">Tên danh mục sản phẩm</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập danh mục sản phẩm" >
          </div>
          <button class="btn btn-primary" type="submit">Thêm danh mục sản phẩm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endblock() ?>
