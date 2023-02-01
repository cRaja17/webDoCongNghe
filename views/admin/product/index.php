<?php require_once('views/admin/dashboard/index.php'); ?>

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
                            <div class="col-sm-3">
                                <?php

                                ?>
                                <select class="form-control" id="changeCategory">
                                    <option value="">Tất cả sản phẩm</option>
                                    <?php foreach ($data['categories'] as $category) { ?>
                                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="changeCategory">
                                    <option value="">Sắp xếp theo thứ tự</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="show_product">


                        </tbody>
                    </table>
                </div>
                <!-- show product  -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0" id="pagination" >
                            
                            <?php for($i = 1 ; $i<= $data['pages'] ; $i++) :?>
                            <li class="page-item active">
                                <a class="page-link pages" href="#" data-id="<?=$i?>"><?=$i?></a>
                            </li>
                            <?php endfor; ?>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('js') ?>

<script>
// var page = 1;
$(document).ready(function() {


    changeCategory()

    function changeCategory(page) {
        var id = $('#changeCategory').val();        
        $.ajax({
            method: 'GET',
            url: '<?=url('admin/product/product')?>',
            data: {
                id,
                page
            },
            success: function(product) {
                $('#show_product').html(product)
            }
        })
    }

    $("#pagination li a").click(function() {
        const page = $(this).data('id')
        changeCategory(page)
    });

    $('#changeCategory').change(function() {
        changeCategory()
    })


    $(document).on('click', ".button_brand", function() {

        var id = $(this).val();
        var brand = $('#brand_' + id).val();
        $.ajax({
            method: 'POST',
            url: '<?=url('admin/product/update')?>',
            data: {
                id: id,
                brand: brand,
            },
            success: function(data) {
                changeCategory()
            }
        })
    })

    $(document).on('click', ".drop_product", function() {
        var id = $(this).val();
        // alert(id);
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
                    method: "POST",
                    url: "<?=url('admin/product/delete')?>",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        if (result == true) {
                            Swal.fire(
                                'Xóa thành công!',
                                'Sản phẩm đã được xóa.',
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
                        changeCategory()

                    },
                    error: function() {

                    },
                });

            }
        })
    })
})
</script>
<?php endblock() ?>