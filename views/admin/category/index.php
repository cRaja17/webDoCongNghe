<?php require_once('views/admin/layouts/index.php') ?>
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
                                    <th>Name:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $category) : ?>
                                <tr>
                                    <td><?= $category['name'] ?></td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="<?=url('admin/category/edit/'.$category['id'])?>">Sửa</a>
                                                <a class="dropdown-item" onclick="return confirm('are you sure ?')"
                                                    href="<?=url('admin/category/delete/'.$category['id'])?>">Xóa</a>
                                            </div>
                                        </div>
                                    </td>
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