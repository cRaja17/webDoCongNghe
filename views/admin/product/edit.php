<?php require_once('views/admin/dashboard/index.php'); ?>

<?php startblock('title') ?>
<?= $data['name'] ?>
<?php endblock() ?>

<?php startblock('css') ?>
<?php endblock() ?>

<?php startblock('content') ?>
<!-- <div class="row">
    <div class="col"> -->
<!-- <div class="card shadow"> -->
<div class="card-header border-0">
    <h3 class="mb-0">Sửa sản phẩm</a></h3>
</div>
<div class="card-header border-0">
    <form action="<?php echo url('admin/product/update/'.$data['id']) ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh mục</label>
            <select class="form-control" name="category_id">

                <?php $category = new Category;
                                    $categories = $category->findAll(); ?>

                <?php foreach($categories as $category) : ?>
                <option value='<?php echo $category['id'] ?>'
                    <?php if($category['id'] == $data['category_id']) { echo 'selected' ;}?>>
                    <?php echo $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Thương hiệu</label>
            <input class="form-control" name="brand" value="<?=$data['brand']?>"></input>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" value="<?=$data['name']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Giá tiền</label>
            <input type="text" class="form-control" name="price" value="<?=$data['price']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Số lượng</label>
            <input class="form-control" name="amount" value="<?=$data['amount']?>"></input>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <img src="<?=asset('storage/thumbnail/'.$data['thumbnail'])?>" width=100px>
        </div>

        <div class="custom-file form-group">
            <label>Chọn ảnh</label>
            <input type="file" name="thumbnail">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Thêm hình ảnh</label>
            <textarea id="images" name="images"><?=$data['images']?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả</label>
            <textarea id="description" name="description"><?=$data['description']?></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Tạo sản phẩm</button>
    </form>
</div>
<!-- </div> -->
<!-- </div>
</div> -->
<?php endblock() ?>

<?php startblock('js') ?>
<script>
CKEDITOR.replace('images', {
    filebrowserImageUploadUrl: "<?=url('admin/product/upload_ckeditor')?>",
    filebrowserUploadMethod: "form"
});
CKEDITOR.replace('description', {
    filebrowserImageUploadUrl: "<?=url('admin/product/upload_ckeditor')?>",
    filebrowserUploadMethod: "form"
});
</script>
<?php endblock() ?>