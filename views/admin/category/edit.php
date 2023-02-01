<?php require_once('views/admin/dashboard/index.php'); ?> 

<?php startblock('title') ?>
Edit Category
<?php endblock() ?>

<?php startblock('content') ?>
<?php 
        $id = $_GET['id'];
        $category = new Category();
        $category = $category->show_category($id);
?>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
              <h3 class="mb-0">Sửa danh mục sản phẩm</a></h3>
      </div>
      <div class="card-header border-0">
        <form action="<?php echo url('admin/category/update/'.$id); ?>" method="POST">
            <div class="form-group">
             <label for="exampleFormControlInput1">Tên danh mục sản phẩm</label>
             <input type="text" class="form-control" name="name" placeholder="<?php echo $category['name'] ?>" value="<?php echo $category['name'] ?>">
            </div>
          <button class="btn btn-primary" type="submit">Sửa sản phẩm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endblock() ?>