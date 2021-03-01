<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{asset('/')}}assets/images/logo-icon.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Syndash</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('staff.dashboard') }}">
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('staff.brand.index') }}">
                <i class="bx bx-menu"></i>
                <div class="menu-title">Brands</div>
            </a>
        </li>
        <li>
            <a href="{{ route('staff.category.index') }}">
                <i class="bx bx-menu"></i>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="#" class="has-arrow">
                <div> <i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">SubItem</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Item</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>


