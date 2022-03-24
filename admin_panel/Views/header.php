<!-- NAVBAR -->
<nav class="navbar navbar-toggleable-md">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
        <span>
            <i class="fa fa-code-fork"></i>
        </span>
    </button>

    <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
        <span>
            <i class="fa fa-align-justify"></i>
        </span>
    </button>

    <a class="navbar-brand logo" href="{{baseurl}}/admin">
        <span style="color: aliceblue; font-size: larger"><strong>მართვის პანელი</strong></span>
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
            <span>
                <i class="fa fa-align-justify"></i>
            </span>
        </button>
    </div>
</nav>
<!-- /NAVBAR -->

<div class="page-container">
    <div class="page-content">
        <!-- inject:SIDEBAR -->


        <div id="sidebar-main" class="sidebar sidebar-default">

            <div class="sidebar-content">
                <ul class="navigation">
                    <li class="navigation-header">
                        <a href="{{baseurl}}/admin"><span>საწყისი გვერდი</span></a>
                        <i class="icon-menu"></i>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-home"></i> <span>სტატისტიკა</span></a>
                    </li>

                    <li class="navigation-header">
                        <span>ნავიგაცია</span>
                        <i class="icon-menu"></i>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-cart-arrow-down"></i> <span>ონლაინ მაღაზია</span></a>
                        <ul>
                            <li><a href="{{baseurl}}/admin/product">პროდუქცია</a></li>
                            <li><a href="{{baseurl}}/admin/shop_cat">კატეგორიები</a></li>
                            <li><a href="{{baseurl}}/admin/colors">ფერები</a></li>
                            <li><a href="{{baseurl}}/admin/sizes">ზომები</a></li>
                            <li><a href="{{baseurl}}/admin/brands">ბრენდები</a></li>
                            <li><a href="{{baseurl}}/admin/combos">კომბინაციები</a></li>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-info-circle"></i> <span>საინფორმაციო გვერდები</span></a>
                        <ul>
                            <li><a href="{{baseurl}}/admin/add_post">პოსტის დამატება</a></li>
                            <li><a href="{{baseurl}}/admin/post_list">პოსტები</a></li>
                            <li><a href="{{baseurl}}/admin/post_cats">კტეგორიები</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-user"></i> <span>მომხმარებლები</span></a>
                        <ul>
                            <li><a href="{{baseurl}}/admin/user_list">მომხმარებლების სია</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-gears"></i> <span>საიტის პარამეტრები</span></a>
                        <ul>
                            <li><a href="{{baseurl}}/admin/contact">კონტაქტი</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{baseurl}}/admin"><i class="fa fa-key"></i> <span>ადმინისტრატორი</span></a>
                        <ul>
                            <li><a href="{{baseurl}}/admin/change_pass">პაროლის შეცვლა</a></li>
                            <li><a href="{{baseurl}}/admin/logout">გამოსვლა</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- inject:/SIDEBAR -->