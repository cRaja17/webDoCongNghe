<?php require_once('views/web/layouts/index.php') ?>
<?php startblock('title') ?>
Cart
<?php endblock() ?>

<?php startblock('css') ?>
<link href="<?php echo asset('assets/web/css/cart.css') ?>" rel="stylesheet">
<link href="<?php echo asset('assets/web/css/checkout.css') ?>" rel="stylesheet">
<?php endblock() ?>

<?php startblock('content') ?>
<main class="bg_gray show_cart">
<!-------------------------------- show-cart----------------- -->
</main>
<?php endblock() ?>

<?php startblock('js') ?>
<script>
$(document).ready(function() {

    cart()

    function cart() {
        $.ajax({
            method: 'GET',
            url: '<?=url('cart/cart')?>',
            success : function(data) {
                $('.show_cart').html(data)
            }
        })
    }

    $(document).on("click",".btn-primary",function() {
        var key = $(this).attr('data')
        var id = $('#id_' + key).val()
        var quantity = $('#quantity_' + key).val()
        if ($(this).hasClass('increase')) {
            $('#quantity_' + key).val(parseInt(quantity) + 1)
            update_quantity(id, parseInt(quantity) + 1)
        } else if (quantity > 1) {
            if ($(this).hasClass('discount')) {
                $('#quantity_' + key).val(parseInt(quantity) - 1)
                update_quantity(id, parseInt(quantity) - 1)
            }
        }
    })

    $(document).on("change",".form-control.change",function() {
    var key = $(this).attr('data')
    var id = $('#id_' + key).val()
    var quantity = $('#quantity_' + key).val()

        if (quantity >= 0) {
            update_quantity(id, quantity)
        } else {
            quantity = 1
            update_quantity(id, quantity)
        }
    })

    function update_quantity(id, quantity) {
    $.ajax({
        method: 'POST',
        url: '<?php echo url('cart/update_quantity')?>',
        data: {
            id,
            quantity
        },
        success: function() {
            cart()
        },
        error: function() {

        }
    })
        return false;
    }

})


</script>
<?php endblock() ?>