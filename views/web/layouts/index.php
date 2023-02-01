<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <!-- title -->
    <title><?php echo defineblock('title') ?></title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo asset('assets/web/img/favicon.ico') ?>" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="<?php echo asset('assets/web/img/apple-touch-icon-57x57-precomposed.png') ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="<?php echo asset('assets/web/img/apple-touch-icon-72x72-precomposed.png') ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="<?php echo asset('assets/web/img/apple-touch-icon-114x114-precomposed.png') ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="<?php echo asset('assets/web/img/apple-touch-icon-144x144-precomposed.png') ?>">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="<?php echo asset('assets/web/css/bootstrap.custom.min.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('assets/web/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- SPECIFIC CSS -->

    <?php echo defineblock('css') ?>


</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0"
        nonce="I0djhMVT">
    </script>
    
    <div id="page">
        <!-- header -->
        <?php include('views/web/layouts/includes/header.php') ?>
        <!-- /header -->

        <!-- main -->
        <?php defineblock('content') ?>
        <!-- /main -->

        <!-- footer -->
        <!--/footer-->
        <?php include('views/web/layouts/includes/footer.php') ?>
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "101873442673807");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Back to top button -->
    <!-- Sign In Modal -->
    <!-- /Sign In Modal -->


    <!-- COMMON SCRIPTS -->
    <script src="<?php echo asset('assets/web/js/common_scripts.min.js') ?>"></script>
    <script src="<?php echo asset('assets/web/js/main.js') ?>"></script>
    <!-- SPECIFIC SCRIPTS -->
    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.js"></script>

    <?php defineblock('js') ?>


    <script>
    $(document).ready(function() {

        showCart()
        getCountCart()

        function getCountCart() {
            $.ajax({
                method: 'GET',
                url: '<?=url('layout/getCountCart')?>',
                success: function(data) {
                    $('.getCountCart').text(data)
                }
            })
        }

        $("form").submit(function() {
            $search = $("input:[name='name']").val()
            $.ajax({
                method: 'POST',
                url: '<?=url('category')?>',
                data: {
                    search
                }
            })
        })


        // alert


        function addSuccess() {
            Swal.fire({
                icon: 'success',
                title: 'Thêm thành công',
                showConfirmButton: false,
                timer: 1500
            })
        }

        function deleteSuccess() {
            Swal.fire({
                icon: 'success',
                title: 'Xóa thành công',
                showConfirmButton: false,
                timer: 1500
            })
        }

        // endAlert


        // show-cart header//

        function showCart() {

            $(".dropdown-cart").mouseenter(function() {
                $.ajax({
                    method: 'GET',
                    url: '<?=url('layout/show_cart_to_header')?>',
                    success: function(result) {
                        $('#show_cart').html(result)
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            })
        }



        ///addCart/////

        $(document).on('click', '.add_to_cart', function() {
            const product_id = $(this).data('product')
            const quantity = '1'
            const users_id = $(this).data('user')
            <?php if(empty(Auth::getUser('user'))) { ?>
            const client_id = '<?=($_SERVER['HTTP_USER_AGENT']);?>'
            <?php } else { ?>
            const client_id = ''
            <?php } ?>

            $.ajax({
                method: 'POST',
                url: '<?php echo url('cart/add_to_cart') ?>',
                data: {
                    client_id,
                    product_id,
                    quantity,
                    users_id
                },
                success: function() {
                    addSuccess()
                    showCart()
                    getCountCart()
                },
                error: function() {

                }
            })

            return false;

        })

        function cart() {
            $.ajax({
                method: 'GET',
                url: '<?=url('cart/cart')?>',
                success: function(data) {
                    $('.show_cart').html(data)
                }
            })
        }
        
        $(document).on('click', '.delete_cart', function() {

            const id = $(this).data('cart-id')
            $.ajax({
                method: 'POST',
                url: '<?php echo url('cart/delete_to_cart') ?>',
                data: {
                    id
                },
                success: function() {
                    deleteSuccess()
                    showCart()
                    getCountCart()
                    cart()
                },
                error: function() {}
            })
            return false;
        })



        $('#other_addr input').on("change", function() {
            if (this.checked)
                $('#other_addr_c').fadeIn('fast');
            else
                $('#other_addr_c').fadeOut('fast');
        });



    })
    </script>
</body>

</html>