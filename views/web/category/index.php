<?php require_once('views/web/layouts/index.php') ?>
<?php startblock('title') ?>
Category
<?php endblock() ?>


<?php startblock('css') ?>
<link href="<?php echo asset('assets/web/css/listing.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<?php endblock() ?>

<?php startblock('content') ?>
<main>
    <div class="container margin_30">
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <label>Giá tiền:</label>
                    <div class="filter_type version_2">
                        <div class="collapse show" id="filter_1">
                            <div class="select-price">
                                <input type="hidden" id="price_min" value="100000">
                                <input type="hidden" id="price_max" value="100000000">
                                <p id="price_show">100.000 ₫ - 100.000.000 ₫</p>
                                <div id="price_range"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <label>Thương hiệu:</label>
                    
                    <?php foreach ($data['brand'] as $key => $value) : ?>
                    <div class="filter_type version_2">
                        <div class="collapse show" id="filter_2">
                            <div class="input-group-prepend checkbox-brand">
                                <div class="input-group">
                                    <input type="checkbox" class="selector BRAND" value="<?=$value['brand']?>"><?=$value['brand']?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </aside>

            <!-- /col -->
            <div class="col-lg-9">

                <div class="row filter_data">
                    <!-- show san pham -->
                    <!-- show san pham -->
                    <!-- show san pham -->

                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>

<?php endblock() ?>

<?php startblock('js') ?>
<script src="<?php echo asset('assets/web/js/sticky_sidebar.min.js') ?>"></script>
<script src="<?php echo asset('assets/web/js/specific_listing.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$(document).ready(function() {


    filterData();

    function filterData() {
        <?php if(!empty($_GET['id'])) :?>
        var id = '<?=$_GET['id']?>'
        <?php else : ?>
        var id = ''
        <?php endif; ?>
        <?php if(!empty($_GET['search'])) :?>
        var search = '<?=$_GET['search']?>'
        <?php else : ?>
        var search = ''
        <?php endif; ?>
        var price_min = $('#price_min').val()
        var price_max = $('#price_max').val()
        var brand = getClass('BRAND')

        $.ajax({
            url: "<?=url('category/product')?>",
            data: {
                category_id: id,
                price_min: price_min,
                price_max: price_max,
                brand : brand,
                search : search
            },
            success: function(data) {
                $('.filter_data').html(data)
            }
        })
    }

    // $("#button").click(function() {
    //     filterData()
    // })
    // Create our number formatter.
    var formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',

    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });

    function getClass(className) {
        var filter = []
        $('.' + className + ':checked').each(function() {
            filter.push($(this).val())
        })
        return filter
    }

    $('.selector').click(function() {
        filterData()
    })

    $("#price_range").slider({
        range: true,
        min: 100000,
        max: 100000000,
        values: [100000, 100000000],
        step: 500000,
        slide: function(event, ui) {
            $("#price_min").val(ui.values[0]);
            $("#price_max").val(ui.values[1]);
            $("#price_show").html('Giá: ' + formatter.format(ui.values[0]) + '-' + formatter.format(ui.values[1]) );
            filterData();
        }
    });


})
</script>
<?php endblock() ?>