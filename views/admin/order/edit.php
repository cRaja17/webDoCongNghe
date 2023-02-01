<?php require_once('views/admin/dashboard/index.php'); ?>

<?php startblock('title') ?>
Sửa đơn hàng
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
    <form action="<?php echo url('admin/order/update/'.$data['id']) ?>" method="POST">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Họ và tên</label>
            <input class="form-control" name="full_name" value="<?=$data['full_name']?>"></input>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Địa chỉ nhận hàng</label>
            <input class="form-control" name="address" value="<?=$data['address']?>"></input>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Số điện thoại</label>
            <input class="form-control" name="phone_number" value="<?=$data['phone_number']?>"></input>
        </div>
        <button class="btn btn-primary" type="submit">Sửa đơn hàng</button>
    </form>
</div>
<!-- </div> -->
<!-- </div>
</div> -->
<?php endblock() ?>

<?php startblock('js') ?>

</script>
<?php endblock() ?>