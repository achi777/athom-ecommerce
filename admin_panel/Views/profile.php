<section class="checkout-wrapper section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="checkout-steps-form-style-1">
              <ul id="accordionExample">
                <li>
                  <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                  <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <form method="post">  
                  <div class="row">
                      <div class="col-md-12">
                        <div class="single-form form-default">
                          <label>User Name </label>
                          <div class="row">
                            <div class="col-md-6 form-input form">
                                <input type="hidden" name="personalData" value="1">
                              <input type="text" name="firstname" value="{{$userData[0]->firstname}}" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 form-input form">
                              <input type="text" name="lastname" value="{{$userData[0]->lastname}}" placeholder="Last Name" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>Email Address</label>
                          <div class="form-input form">
                            <input type="text" readonly name="email" value="{{$userData[0]->email}}"  placeholder="Email Address" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-form form-default">
                          <label>Phone Number</label>
                          <div class="form-input form">
                            <input type="text" name="phone"  value="{{$userData[0]->phone}}" placeholder="Phone Number" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="single-form button">
                          <button class="btn" type="submit">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  </section>
                </li>
                <li>
                  <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                  <section class="checkout-steps-form-content collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
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
                        <div class="steps-form-btn button">
                          <button class="btn" type="submit">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  </section>
                </li>
                <li>
                  <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Security</h6>
                  <section class="checkout-steps-form-content collapse" id="collapsefive" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                      <form method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                    <label>Current Password </label>
                                    <div class="form-input form">
                                        <input type="password" name="old_password" placeholder="Current Password" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                    <label>New Password</label>
                                    <div class="form-input form">
                                        <input type="password" name="password" placeholder="new password" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                    <label>Confirm Password</label>
                                    <div class="form-input form">
                                        <input type="password" name="rpassword" placeholder="confirm new password" required>
                                    </div>
                                    </div>
                                </div>           
                                <div class="col-md-12">
                                    <div class="steps-form-btn button">
                                    <button class="btn" type="submit">Change Password</button>
                                    </div>
                                </div>
                                </div>
                      </form>
                  </section>
                </li>
                <li>
                  <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">My Orders</h6>
                  <section class="checkout-steps-form-content collapse" id="collapsesix" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                        <div class="row">
                        <!--Orders-->                

                        <div class="col-md-12">
                        
                                <@ foreach($orders AS $item): @>
                                    <@if($item->status == 0):@>
                                        <@$status = "Palaced";@>
                                        <@$palaced = "green";@>
                                    <@elseif($item->status == 1):@>
                                    <@$status = "Palaced";@>
                                        <@$status = "Accepted";@>
                                        <@$palaced = "green";@>
                                        <@$accepted = "green";@>
                                    <@elseif($item->status == 2):@>
                                        <@$status = "Packed";@>
                                        <@$palaced = "green";@>
                                        <@$accepted = "green";@>
                                        <@$packed = "green";@>
                                    <@elseif($item->status == 3):@>
                                        <@$status = "Shipped";@>
                                        <@$palaced = "green";@>
                                        <@$accepted = "green";@>
                                        <@$packed = "green";@>
                                        <@$shipped = "green";@>
                                    <@elseif($item->status == 4):@>
                                        <@$status = "Delivered";@>
                                        <@$palaced = "green";@>
                                        <@$accepted = "green";@>
                                        <@$packed = "green";@>
                                        <@$shipped = "green";@>
                                        <@$delivered = "green";@>
                                    <@endif@>
                                <div class="order my-3 bg-light">
                                    <div class="row">
                                        <div class="col-lg-4">
                                        <div class="d-flex flex-column justify-content-between order-summary">
                                            <div class="d-flex align-items-center">
                                            <div class="text-uppercase">ORDER # {{$item->order_id}}</div>
                                            <div class="blue-label ms-auto text-uppercase">paid</div>
                                            </div>
                                            <div class="fs-8">{{$item->product_name}}</div>
                                            <div class="fs-8">{{$item->order_date}}</div>
                                        </div>
                                        </div>
                                        <div class="col-lg-8">
                                        <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                            <div class="status">
                                                Status : {{$status}}
                                            </div>
                                            <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn btn-primary text-uppercase col-md-4">Product</a>
                                            <a href="{{baseurl}}/invoice/{{$item->order_id}}" class="btn btn-primary text-uppercase col-md-4">invoice</a>
                                        </div>
                                            <div class="progressbar-track">
                                                <ul class="progressbar">
                                                <li id="step-1" class="text-muted {{$palaced}}">
                                                    <span class="fas fa-gift"></span>
                                                </li>
                                                <li id="step-2" class="text-muted {{$accepted}}">
                                                    <span class="fas fa-check"></span>
                                                </li>
                                                <li id="step-3" class="text-muted {{$packed}}">
                                                    <span class="fas fa-box"></span>
                                                </li>
                                                <li id="step-4" class="text-muted {{$shipped}}">
                                                    <span class="fas fa-truck"></span>
                                                </li>
                                                <li id="step-5" class="text-muted {{$delivered}}">
                                                    <span class="fas fa-box-open"></span>
                                                </li>
                                                </ul>
                                                <div id="tracker"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <@endforeach@>
                                
                            
                        </div>

                        <!--/Orders-->
                        </div>              
                  </section>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="checkout-sidebar">
              <div class="checkout-sidebar-price-table">
                <h5 class="title">Navigation</h5>
                <div class="sub-total-price">
                  <div class="total-price">
                    <p><span style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Personal Details</a> </span>
                  </div>
                  <div class="total-price shipping">
                    <p><span style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Shipping Address</a> </span>
                  </div>
                  <div class="total-price shipping">
                    <p><span style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Security Details</a> </span>
                  </div>
                  <div class="total-price shipping">
                    <p><span style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">My Orders</a> </span>
                  </div>
                </div>
              </div>
              <div class="checkout-sidebar-banner mt-30">
                <a href="product-grids.html">
                  <img src="{{baseurl}}/assets/images/banner/banner.jpg" alt="#">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>