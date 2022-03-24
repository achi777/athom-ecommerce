    <div class="shopping-cart section">
      <div class="container">
        <div class="cart-list-head">
          <div class="cart-list-title">
            <div class="row">
              <div class="col-lg-1 col-md-1 col-12"></div>
              <div class="col-lg-4 col-md-3 col-12">
                <p>{{item_name}}</p>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <p>{{quantity}}</p>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <p>{{price}}</p>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <p>{{total_sale_cost}}</p>
              </div>
              <div class="col-lg-1 col-md-2 col-12">
                <p>{{delete}}</p>
              </div>
            </div>
          </div>
          <!--item-->
          <@foreach($result AS $item):@>
            <@if($result->status == "empty"):@>
                <div class="cart-single-list">
                <div class="row align-items-center">
                    <center>CART IS EMPTY</center>
                </div>
              </div>
              <@break;@>
            <@endif@>
          <div class="cart-single-list">
            <div class="row align-items-center">
              <div class="col-lg-1 col-md-1 col-12">
                <a href="{{baseurl}}/details/{{$item->product_id}}">
                  <img src="{{baseurl}}/assets/images/products/{{$item->image}}" alt="{{ $item->{product_name} }}">
                </a>
              </div>
              <div class="col-lg-4 col-md-3 col-12">
                <h5 class="product-name">
                  <a href="{{baseurl}}/details/{{$item->product_id}}"> {{ $item->{product_name} }}</a>
                </h5>
                <p class="product-des">
                  <span>
                    <em>Size:</em> {{$item->size_name}} </span>
                  <span>
                    <em>Color:</em> {{$item->{color_name} }} </span>
                </p>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <div class="count-input">
                    <span>
                        <em>{{$item->quantity}}</em>
                    <span>    
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <p>₾ {{($item->product_price - $item->product_sale) * $item->quantity}}</p>
              </div>
              <div class="col-lg-2 col-md-2 col-12">
                <p>₾ {{$item->product_sale * $item->quantity}}</p>
              </div>
              <div class="col-lg-1 col-md-2 col-12">
                <a class="remove-item" href="{{baseurl}}/cart/3/{{$item->vriation_id}}">
                  <i class="lni lni-close"></i>
                </a>
              </div>
            </div>
          </div>
          <@$totalPrice += $item->product_price * $item->quantity;@>
          <@$totalDiscount += $item->product_sale * $item->quantity;@>
          <@$totalSaledPrice += ($item->product_price - $item->product_sale) * $item->quantity;@>
          <@endforeach@>
          <!--/item-->

        </div>
        <div class="row">
          <div class="col-12">
            <div class="total-amount">
              <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                  <div class="left">
                    <div class="coupon">
                      <form method="post">
                        <input name="cuponCode" placeholder="{{enter_your_coupon}}">
                        <div class="button">
                          <button type="submit" class="btn">{{enter}}</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="right">
                    <ul>
                      <li>{{price}} <span>₾ {{$totalPrice}}</span>
                      </li>
                      <li>{{coupon}} <span>₾ {{$cuponSale}}</span>
                      </li>
                      <li>{{total_sale_cost}} <span>₾ {{$totalDiscount + $cuponSale}}</span>
                      </li>
                      <li class="last">{{total_price}} <span>₾ {{$totalSaledPrice - $cuponSale}}</span>
                      </li>
                    </ul>
                    <div class="button">
                      <a href="{{baseurl}}/checkout" class="btn">{{checkout}}</a>
                      <a href="{{baseurl}}" class="btn btn-alt">{{continue_shopping}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>