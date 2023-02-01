<?php require_once('views/admin/layouts/index.php'); ?>

<?php startblock('title') ?>
Product
<?php endblock() ?>

<?php startblock('css') ?>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
                <div >
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>Họ và tên:</th>
                                    <th>Tài khoản:</th>
                                    <th>Số điện thoại:</th>
                                    <th>Địa chỉ:</th>
                                    <th>Phân cấp:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $user) : ?>
                                <tr>
                                    <td><?= $user['fullname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone_number'] ?></td>
                                    <td><?= $user['address'] ?></td>
                                    <td><?=Role::check($user['role_id']) ?></td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('js') ?>

<?php endblock() ?>
