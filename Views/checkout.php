<section class="checkout-wrapper section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="checkout-steps-form-style-1">
              <ul id="accordionExample">
                <li>
                  <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Shipping Address</h6>
                  <section class="checkout-steps-form-content collapse show" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <form method="post">   
                  <div class="row">
                    <div class="col-md-12">
                        <div class="single-form form-default">
                          <label>User Name </label>
                          <div class="row">
                            <div class="col-md-6 form-input form">
                              <input type="text" name="firstname" value="{{$shippingData[0]->firstname}}" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 form-input form">
                              <input type="text" name="lastname" value="{{$shippingData[0]->lastname}}" placeholder="Last Name" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>Email Address</label>
                          <div class="form-input form">
                            <input type="text"  name="email" value="{{$shippingData[0]->email}}" placeholder="Email Address" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>Phone Number</label>
                          <div class="form-input form">
                            <input type="text" name="phone" value="{{$shippingData[0]->phone}}" placeholder="Phone Number" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>City</label>
                          <div class="form-input form">
                            <input type="text" name="city" value="{{$shippingData[0]->city}}" placeholder="City" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>Post Code</label>
                          <div class="form-input form">
                            <input type="text" name="post_code" value="{{$shippingData[0]->post_code}}" placeholder="Post Code" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="single-form form-default">
                          <label>Address</label>
                          <div class="form-input form">
                            <input type="text" name="address" value="{{$shippingData[0]->address}}" placeholder="Address" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="checkout-payment-option">
                          <h6 class="heading-6 font-weight-400 payment-title">Select Delivery Option</h6>
                          <div class="payment-option-wrapper">
                            <div class="single-payment-option">
                              <input type="radio" name="shipping" checked id="shipping-1">
                              <label for="shipping-1">
                                <img src="assets/images/shipping/shipping-1.png" alt="Sipping">
                                <p>Standerd Shipping</p>
                                <span class="price">$10.50</span>
                              </label>
                            </div>
                            <div class="single-payment-option">
                              <input type="radio" name="shipping" id="shipping-2">
                              <label for="shipping-2">
                                <img src="assets/images/shipping/shipping-2.png" alt="Sipping">
                                <p>Standerd Shipping</p>
                                <span class="price">$10.50</span>
                              </label>
                            </div>
                            <div class="single-payment-option">
                              <input type="radio" name="shipping" id="shipping-3">
                              <label for="shipping-3">
                                <img src="assets/images/shipping/shipping-3.png" alt="Sipping">
                                <p>Standerd Shipping</p>
                                <span class="price">$10.50</span>
                              </label>
                            </div>
                            <div class="single-payment-option">
                              <input type="radio" name="shipping" id="shipping-4">
                              <label for="shipping-4">
                                <img src="assets/images/shipping/shipping-4.png" alt="Sipping">
                                <p>Standerd Shipping</p>
                                <span class="price">$10.50</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="steps-form-btn button">
                          <button class="btn" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Save & Continue</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  </section>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="checkout-sidebar">
              <div class="checkout-sidebar-coupon">
                <p>Appy Coupon to get discount!</p>
                <form action="#">
                  <div class="single-form form-default">
                    <div class="form-input form">
                      <input type="text" placeholder="Coupon Code">
                    </div>
                    <div class="button">
                      <button class="btn">apply</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="checkout-sidebar-price-table mt-30">
                <h5 class="title">Pricing Table</h5>
                <div class="sub-total-price">
                  <div class="total-price">
                    <p class="value">Subotal Price:</p>
                    <p class="price">₾ {{$totalPrice}}</p>
                  </div>
                  <div class="total-price shipping">
                    <p class="value">Coupon:</p>
                    <p class="price">₾ {{$cuponSale}}</p>
                  </div>
                  <div class="total-price discount">
                    <p class="value">You Save:</p>
                    <p class="price">₾ {{$totalDiscount + $cuponSale}}</p>
                  </div>
                </div>
                <div class="total-payable">
                  <div class="payable-price">
                    <p class="value">You Pay:</p>
                    <p class="price">₾ {{$totalPrice - ($totalDiscount + $cuponSale)}}</p>
                  </div>
                </div>
                <div class="price-table-btn button">
                  <@if($totalPrice > 0):@>
                    <@ $disabled = "";@>
                  <@else:@>
                    <@ $disabled = "disabled";@>
                  <@endif@>
                <form action="{{baseurl}}/payment" method="post">
                    <input class="form-control" type="hidden" name="pay" value="pay">
                    <button class="btn btn-alt" type="submit" {{$disabled}} >Checkout</button>                      
                </form>
                </div>
              </div>
              <div class="checkout-sidebar-banner mt-30">
                <a>
                  <img src="{{baseurl}}/assets/images/banner/banner.jpg" alt="#">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>