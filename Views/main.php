    
    <!--carusel-->
    <section class="hero-area d-none d-sm-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-12 custom-padding-right">
            <div class="slider-head">
              <div class="hero-slider">
              <@foreach($productTopRated AS $item):@>
                <div class="single-slider" style="background-image: url({{baseurl}}/assets/images/products/{{$item->photo_url}}); background-size: 60%!important; background-position: center right!important;">
                  <div class="content">
                    <h2>
                      <span>(₾ {{$item->product_sale}} savings)</span> {{ $item->{product_name} }}
                    </h2>
                    <p>{{ $item->{product_desc} }}</p>
                    <h3>
                      <span>Now Only</span> ₾ {{$item->product_price - $item->product_sale}}
                    </h3>
                    <div class="button">
                      <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn btn-blue">{{view_details}}</a>
                    </div>
                  </div>
                </div>
                <@endforeach@>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="row">
              <@$i = 0;@>
              <@foreach($bestSellers AS $item):@>
              <@$i++;@>
              <@if($i == 1):@>
              <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                <div class="hero-small-banner" style="background-image: url('{{baseurl}}/assets/images/products/{{$item->photo_url}}');background-size: 300px!important; background-color:#f8f8f8; background-position:right;">
                  <div class="content">
                    <h2>
                    <a href="{{baseurl}}/details/{{$item->product_id}}"><span>New line required</span>{{ $item->{product_name} }} </a>
                    </h2>
                    <h3>₾ {{ $item->product_price - $item->product_sale }}</h3>
                  </div>
                </div>
              </div>
              <@elseif($i == 2):@>
              <div class="col-lg-12 col-md-6 col-12">
                <div class="hero-small-banner style2">
                  <div class="content">
                    <h2>{{ $item->{product_name} }} </h2>
                    <p>{{ $item->{product_desc} }}</p>
                    <div class="button">
                      <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn btn-blue">
                      {{view_details}} </a>
                    </div>
                  </div>
                </div>
              </div>
              <@break;@>
              <@endif@>
              <@endforeach@>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /carusel -->


    <!--catalog-->

    <section class="featured-categories section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2> {{gallery}}</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <@foreach ($catalog AS $item):@>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="single-category">
              <h3 class="heading">{{$item->{cat_name} }}</h3>
              <ul>
                <@foreach ($catalogSub AS $subItem):@>
                  <@if($subItem->cat_parent_id == $item->cat_id):@>
                    <li>
                      <a href="{{baseurl}}/shop/{{$subItem->cat_id}}">{{ $subItem->{cat_name} }}</a>
                    </li>
                  <@endif@>
                <@endforeach@>    
                <li>
                  <a href="{{baseurl}}/shop">View All</a>
                </li>          
              </ul>
              <div class="images">
                <img src="{{baseurl}}/assets/images/featured-categories/{{$item->photo}}" alt="#">
              </div>
            </div>
          </div>
          <@endforeach@>
        </div>
      </div>
    </section>

    <!--/catalog-->



    <!--trending product-->


    <section class="trending-product section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>{{tranding}}</h2>
            </div>
          </div>
        </div>
        <div class="row">
        <@foreach ($trendingProduct AS $item):@>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
              <div class="product-image">
                <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}"  style="max-height: 288px!important;" alt="#">
                <div class="button">
                  <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn btn-blue">
                     {{view_details}} </a>
                </div>
              </div>
              <div class="product-info">
                <span class="category">{{ $item->{cat_name} }}</span>
                <h4 class="title">
                  <a href="{{baseurl}}/details/{{$item->product_id}}">{{ $item->{product_name} }}</a>
                </h4>
                    <@if($item->product_sale > 0):@>
                      <div class="price">
                        <span>₾{{$item->product_price - $item->product_sale}}</span>
                        <span class="discount-price">₾{{$item->product_price}}</span>
                      </div>
                      <@else:@>
                      <div class="price">
                        <span>{{$item->product_price}}</span>
                      </div>
                    <@endif@>
              </div>
            </div>
          </div>
          <@endforeach@>
          
          
          
          
        </div>
      </div>
    </section>


    <!--/trending product-->



    <!--banner-->

    <!--
    <section class="banner section">
      <div class="container">
        <div class="row">
          <@foreach($bannerProduct AS $item):@>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="single-banner" style="background-image:url('{{baseurl}}/assets/images/products/{{$item->photo_url}}'); background-position: right center; background-size: 213px;">
              <div class="content">
                <h2>{{ $item->{product_name} }}</h2>
                <p>{{ $item->{product_desc} }} <br>{{$item->brand_name}} </p>
                <div class="button">
                  <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn">{{view_details}}</a>
                </div>
              </div>
            </div>
          </div>
          <@endforeach@>
        </div>
      </div>
    </section>
     -->

    <!--/banner-->


    <!--special offer-->

    <section class="special-offer section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>{{SpecialOffer}}</h2>
              <p>Sale event today</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-12 col-12">
            <div class="row">
              <!--item-->
              <@foreach($specialOffer AS $item):@>
              <div class="col-lg-4 col-md-4 col-12">
                <div class="single-product">
                  <div class="product-image">
                    <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}"  style="max-height: 288px!important;" alt="{{$item->{product_name} }}">
                    <div class="button">
                      <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn btn-blue">
                      {{view_details}} </a>
                    </div>
                  </div>
                  <div class="product-info">
                    <span class="category">{{ $item->{cat_name} }}</span>
                    <h4 class="title">
                      <a href="">{{ $item->{product_name} }}</a>
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
              <@endforeach@>
              <!--/item-->
            </div>
            <div class="single-banner right" style="background-image:url('{{baseurl}}/assets/images/products/{{$productBestSale[0]->photo_url}}');margin-top: 30px;background-size: 250px;background-position: left; margin-left:10px; background-color:#fff;">
              <div class="content">
                <h2>{{ $productBestSale[0]->{product_name} }} </h2>
                <p>{{ $productBestSale[0]->{product_desc} }}</p>
                <div class="price">
                  <span>₾{{$productBestSale[0]->product_price - $productBestSale[0]->product_sale}}</span>
                </div>
                <div class="button">
                  <a href="" class="btn btn-blue">{{view_details}}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12">
            <div class="offer-content">
              <div class="image">
                <img src="{{baseurl}}/assets/images/products/{{$productBestSale[0]->photo_url}}" alt="#">
                <span class="sale-tag">-{{round(($productBestSale[0]->product_sale * 100) / $productBestSale[0]->product_price, 1)}}%</span>
              </div>
              <div class="text">
                <h2>
                  <a href="{{baseurl}}/{{$productBestSale[0]->product_id}}">{{ $productBestSale[0]->{product_name} }}</a>
                </h2>
                <div class="price">
                  <span>₾{{$productBestSale[0]->product_price - $productBestSale[0]->product_sale}}</span>
                  <span class="discount-price">₾{{$productBestSale[0]->product_price}}</span>
                </div>
                <div class="button">
                      <a href="{{baseurl}}/details/{{$productBestSale[0]->product_id}}" class="btn btn-blue">
                         {{view_details}} </a>
                </div>
                <p>
                  <br>  
                  {{ $productBestSale[0]->{product_desc} }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!--/special offer-->


    <!--home product-list-->


    <section class="home-product-list section d-none d-sm-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
            <h4 class="list-title">Best Sellers</h4>
            <!--item-->
            <@foreach($bestSellers AS $item):@>
            <div class="single-list">
              <div class="list-image">
                <a href="{{baseurl}}/details/{{$item->product_id}}">
                  <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" style="max-height:48px!important;" alt="{{ $item->{product_name} }}">
                </a>
              </div>
              <div class="list-info">
                <h3>
                  <a href="{{baseurl}}/details/{{$item->product_id}}">{{ $item->{product_name} }}</a>
                </h3>
                <span>₾{{$item->product_price}}</span>
              </div>
            </div>
            <@endforeach@>
            <!--/item-->
          </div>
          <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
            <h4 class="list-title">New Arrivals</h4>
            <@foreach($productNewArrival AS $item):@>
            <div class="single-list">
              <div class="list-image">
                <a href="{{baseurl}}/details/{{$item->product_id}}">
                  <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" style="max-height:48px!important;" alt="{{ $item->{product_name} }}">
                </a>
              </div>
              <div class="list-info">
                <h3>
                  <a href="{{baseurl}}/details/{{$item->product_id}}">{{ $item->{product_name} }}</a>
                </h3>
                <span>₾{{$item->product_price}}</span>
              </div>
            </div>
            <@endforeach@>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <h4 class="list-title">Top Rated</h4>
            <@foreach($productTopRated AS $item):@>
            <div class="single-list">
              <div class="list-image">
                <a href="{{baseurl}}/details/{{$item->product_id}}">
                  <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" style="max-height:48px!important;" alt="{{ $item->{product_name} }}">
                </a>
              </div>
              <div class="list-info">
                <h3>
                  <a href="{{baseurl}}/details/{{$item->product_id}}">{{ $item->{product_name} }}</a>
                </h3>
                <span>₾{{$item->product_price}}</span>
              </div>
            </div>
            <@endforeach@>
          </div>
        </div>
      </div>
    </section>


    <!--/home product-list-->


    <!--brands-->


    <div class="brands">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
            <h2 class="title">Popular Brands</h2>
          </div>
        </div>
        <div class="brands-logo-wrapper">
          <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
            <@foreach($brandList AS $item):@>
            <div class="brand-logo">
              <a href="{{baseurl}}/shop/x/x/x/x/{{$item->brand_id}}/x/x/">
              <img src="{{baseurl}}/assets/images/brands/{{$item->brand_logo}}" alt="#">
              </a>
            </div>
            <@endforeach@>
            
          </div>
        </div>
      </div>
    </div>


    <!--/brands-->


    <!--last news-->



    <section class="blog-section section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>Our Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <@foreach($lastPosts AS $item):@>
          <!--post-->
          <div class="col-lg-4 col-md-6 col-12">
            <div class="single-blog">
              <div class="blog-img">
                <a href="{{baseurl}}/info_details/{{$item->id}}">
                  <img src="{{baseurl}}/assets/images/blog/{{$item->photo}}" alt="">
                </a>
              </div>
              <div class="blog-content">
                <a class="category" href="{{baseurl}}/info/{{$item->cat_id}}">{{$item->{cat_name} }}</a>
                <h4>
                  <a href="{{baseurl}}/info_details/{{$item->id}}">{{$item->{title} }}</a>
                </h4>
                <p>{{$item->{description} }}</p>
                <div class="button">
                  <a href="{{baseurl}}/info_details/{{$item->id}}" class="btn btn-blue">{{fullView}}</a>
                </div>
              </div>
            </div>
          </div>
          <!--/post-->
          <@endforeach@>
        </div>
      </div>
    </section>


    <!--/last news-->


    <!--shipping-->


    
    <section class="shipping-info d-none d-sm-block">
      <div class="container">
        <ul>
          <li>
            <div class="media-icon">
              <i class="lni lni-delivery"></i>
            </div>
            <div class="media-body">
              <h5>Free Shipping</h5>
              <span>On order over $99</span>
            </div>
          </li>
          <li>
            <div class="media-icon">
              <i class="lni lni-support"></i>
            </div>
            <div class="media-body">
              <h5>24/7 Support.</h5>
              <span>Live Chat Or Call.</span>
            </div>
          </li>
          <li>
            <div class="media-icon">
              <i class="lni lni-credit-cards"></i>
            </div>
            <div class="media-body">
              <h5>Online Payment.</h5>
              <span>Secure Payment Services.</span>
            </div>
          </li>
          <li>
            <div class="media-icon">
              <i class="lni lni-reload"></i>
            </div>
            <div class="media-body">
              <h5>Easy Return.</h5>
              <span>Hassle Free Shopping.</span>
            </div>
          </li>
        </ul>
      </div>
    </section>


    <!--/shipping-->

