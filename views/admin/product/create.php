<?php require_once('views/admin/dashboard/index.php'); ?>

<?php startblock('title') ?>
Create Product
<?php endblock() ?>

<?php startblock('css') ?>
<?php endblock() ?>

<?php startblock('content') ?>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Thêm sản phẩm</a></h3>
            </div>
            <div class="card-header border-0">
                <form action="<?php echo url('admin/product/store') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Danh mục</label>
                        <?php $category = new Category;
                            $categories = $category->findAll();
                        ?>
                        <select class="form-control" name="category_id">
                            <?php foreach($categories as $category) : ?>
                            <option value='<?php echo $category['id'] ?>'><?php echo $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Thương hiệu</label>
                        <input class="form-control" name="brand"
                            placeholder="Nhập tên thương hiệu Ex: Acer = 'Acer'"></input>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Giá tiền</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá tiền">
                    </div>
                    <div class="custom-file">
                        <label placeholder="Chọn ảnh">Chọn ảnh</label>
                        <input type="file" name="thumbnail">
                    </div>

                    <div class="form-group">
                        <label placeholder="Chọn ảnh">Thêm nhiều ảnh</label>

                        <textarea id='images' name="images">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Số lượng</label>
                        <input class="form-control" name="amount" placeholder="Nhập số lượng trong kho"></input>
                    </div>




                    <div class="form-group">

                        <textarea id='description' name="description">

                        </textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Tạo sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('js') ?>
<script>
CKEDITOR.replace('images', {
    filebrowserImageUploadUrl: "<?=url('admin/product/upload_ckeditor?_token='.time())?>",
    filebrowserUploadMethod: "form"

});
CKEDITOR.replace('description', {
    filebrowserImageUploadUrl: "<?=url('admin/product/upload_ckeditor?_token='.time())?>",
    filebrowserUploadMethod: "form"

});
</script>
<?php endblock() ?>