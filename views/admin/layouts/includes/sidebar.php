<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=url('admin/dashboard')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Allaia <sup>Shop</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=url('admin/dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
            GIAO DIỆN
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dashboard" aria-expanded="true"
            aria-controls="dashboard">
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh mục sản phẩm</span>
        </a>
        <div id="dashboard" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=url('admin/category')?>">Xem danh mục sản phẩm</a>
                <a class="collapse-item" href="<?=url('admin/category/create')?>">Tạo danh mục sản phẩm</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
            aria-controls="product">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=url('admin/product')?>">Xem sản phẩm</a>
                <a class="collapse-item" href="<?=url('admin/product/create')?>">Thêm sản phẩm</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
            aria-controls="order">
            <i class="fas fa-fw fa-cog"></i>
            <span>Đơn hàng</span>
        </a>
        <div id="order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=url('admin/order?pages=1')?>">Xem đơn hàng</a>
                <!-- <a class="collapse-item" href="">Tạo danh mục sản phẩm</a> -->
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Khuyến mãi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=url('admin/discount')?>">Chi tiết</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
            THÊM    
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=url('admin/user')?>" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh sách người dùng</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=url('admin/sales')?>" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Thống kê doanh thu</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<script>
  
</script>