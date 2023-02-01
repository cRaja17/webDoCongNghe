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
                <div id="show_product">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#crateDiscount" data-whatever="@getbootstrap">Thêm sản phẩm</button>
                            <div class="modal fade" id="crateDiscount" tabindex="-1" aria-labelledby="createDis"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createDis">Thêm sản phẩm giảm giá mới</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Sản phẩm :</label>
                                                <select class="custom-select product_id" name="product_id">
                                                    <?php foreach ($data as $key => $product) : ?>
                                                    <option value="<?=$product['id']?>"> <?=$product['name']?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Khuyến mãi:</label>
                                                <input type="datetime" class="form-control discount"
                                                    id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Ngày hết hạn:</label>
                                                <input type="datetime-local" class="form-control date_discount"
                                                    id="recipient-name">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" 
                                                    class="btn btn-primary discount_button" data-dismiss="modal">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá gốc</th>
                                    <th>Giảm giá</th>
                                    <th>Tỷ lệ giảm</th>
                                    <th>Ngày hết hạn</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="show_discount">

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
<script>

$(document).ready(function() {
    getDiscount()

    function getDiscount() {    
        $.ajax({
            method: 'GET',
            url: '<?=url('admin/discount/discount')?>',
            success: function(params) {
                $('#show_discount').html(params)
            }
        })
    }

    $('.discount_button').click(function() {
        
    const product_id = $(".product_id").val()
    const discount = $(".discount").val()
    const date_discount = $(".date_discount").val()

        $.ajax({
            method: 'POST',
            url: '<?=url('admin/discount/create')?>',
            data: {
                discount,
                date_discount,
                product_id
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm thành công',
                    showConfirmButton: false,
                    timer: 1500
                })
                getDiscount()
            }
        })
    })

    $(document).on('click','.delete_discount',function() {
        const id = $(this).data('id')
        $.ajax({
            method : 'POST',
            url : '<?=url('admin/discount/delete')?>',
            data : {id},
            success : function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Xóa thành công',
                    showConfirmButton: false,
                    timer: 1500
                })
                getDiscount()
                
            }
        })
    })
    $(document).on('show.bs.modal','#edit', function () {

    $('.edit_discount').click(function () {
        const dis_id =  $(this).data('id')
        const product_id = $('.edit_product_id').change().val()
        const discount = $('.edit_discount1').val()
        const date_discount = $('.edit_date_discount').val()

            $.ajax({
                method : 'POST',
                url : '<?=url('admin/discount/edit')?>',
                data : {dis_id,product_id,discount,date_discount},
                success : function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sửa thành công',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#edit').on('hidden.bs.modal', function () {
                        getDiscount()
                    })
                }
            })
    })
})    


})


</script>
<?php endblock() ?>