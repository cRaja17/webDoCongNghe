<?php require_once('views/admin/layouts/index.php'); ?>
<?php require_once('core/Unit.php'); ?>
<?php require_once('app/Models/CheckOrder.php'); ?>
<?php require_once('app/Models/Admin/Checkout.php'); ?>

<?php startblock('title') ?>
Order
<?php endblock() ?>

<?php startblock('css') ?>

<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Giá đơn hàng</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Tình trạng thanh toán</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="show_order">

                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <?php if(($_GET['pages']) > 1 ) :?>
                            <li class="page-item">
                                <a class="page-link" href="<?=url('admin/order?pages='.($_GET['pages']-1))?>" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php for($i = 1 ; $i <= $data['pages'] ; $i ++) : ?>
                            <li class="page-item">
                                <a class="page-link pages" href="<?=url('admin/order?pages='.$i)?>"><?=$i?></a></li>
                            <?php endfor; ?>
                            <?php if(($_GET['pages']) < $data['pages']) :?>
                            <li class="page-item">
                                <a class="page-link" href="<?=url('admin/order?pages='.($_GET['pages']+1))?>">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->



<?php endblock() ?>

<?php startblock('js') ?>
<script>
$(document).ready(function() {

    getOrder()
    confirmOrder()

    function getOrder() {
        $.ajax({
            method: 'GET',
            url: '<?=url('admin/order/order')?>',
            data:{
                page : <?php if(empty($_GET['pages'])) { echo 1;} else { echo $_GET['pages'] ;}?>
            },
            success: function(data) {
                $('.show_order').html(data)
            }
        })
    }

    $(document).on('click', '#order_confirm', function() {
        const id = $(this).data('id')
        const status_order = $(this).data('status_order')
        confirmOrder(id, status_order)
    })

    $(document).on('click', '#order_shipping', function() {
        const id = $(this).data('id')
        const status_order = $(this).data('status_order')
        confirmOrder(id, status_order)
    })

    $(document).on('click', '#order_success', function() {
        const id = $(this).data('id')
        const status_order = $(this).data('status_order')
        // console.log(id,status_order)
        confirmOrder(id, status_order)
    })

    $(document).on('click', '#order_error', function() {
        const id = $(this).data('id')
        const status_order = $(this).data('status_order')
        // console.log(id,status_order)
        confirmOrder(id, status_order)
    })

    function confirmOrder(id, status_order) {

        $.ajax({
            method: 'POST',
            url: '<?=url('admin/order/confirm')?>',
            data: {
                id: id,
                status_order: status_order
            },
            success: function(data) {
                getOrder(data)
            }
        })
    }

    $(document).on('click', '.drop_order', function() {
        var id = $(this).val();
        Swal.fire({
            title: 'Xóa ?',
            text: "Bạn sẽ không thể hoàn tác lại!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: '<?=url('admin/order/delete')?>',
                    data: {
                        id
                    },
                    success: function(result) {
                        if (result == true) {
                            Swal.fire(
                                'Xóa thành công!',
                                'Đơn hàng đã được xóa.',
                                'success'
                            )
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Không thực hiện đc !',
                                footer: '<a href="">Liên hệ chúng tôi để được hỗ trợ?</a>'
                            })
                        }
                        getOrder()

                    },
                    error: function() {

                    },
                });

            }
        })

    });
})
</script>
<?php endblock() ?>