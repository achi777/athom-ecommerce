<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="product-sidebar">
                    <div class="single-widget search">
                        <h3>Search Product</h3>
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button type="submit">
                                <i class="lni lni-search-alt"></i>
                            </button>
                        </form>
                    </div>

                    <div class="single-widget">
                        <h3>All Categories</h3>
                        <ul class="list">
                            <@foreach($result AS $item):@>
                                <li>
                                    <a href="{{baseurl}}/shop/{{$item->cat_id}}/">{{$item->{cat_name} }} </a>
                                    <!--<span>(12)</span>-->
                                </li>
                                <@endforeach@>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">

                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                            <div class="row">
                                <!--item-->
                                <@foreach($result AS $item):@>
                                    <@if($item->product_id > 0):@>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <img src="{{baseurl}}/assets/images/products/{{$item->image}}" style="max-height:288px!important;" alt="#">
                                                    <div class="button">
                                                        <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn">
                                                            View Details </a>

                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <span class="category">{{$item->{cat_name} }}</span>
                                                    <h4 class="title">
                                                        <a href="{{baseurl}}/details/{{$item->product_id}}">{{$item->{product_name} }}</a>
                                                    </h4>
                                                    <@if($item->product_sale > 0):@>
                                                        <div class="price">
                                                            <span>₾{{$item->product_price - $item->product_sale}}</span>
                                                            <span class="discount-price">₾{{$item->product_price}}</span>
                                                        </div>
                                                        <@else:@>
                                                            <div class="price">
                                                                <span>₾{{$item->product_price}}</span>
                                                            </div>
                                                            <@endif@>
                                                </div>
                                            </div>
                                        </div>
                                        <@endif@>
                                            <@endforeach@>
                                                <!--/item-->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination left">
                                        {{$pagination}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>