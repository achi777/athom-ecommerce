<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }

    .container {
        margin-top: 50px;
        margin-bottom: 50px
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #2f80b6;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #2f80b6;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

</style>
<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">სტატისტიკა <small>შეკვეთის დეტალები</small></h3>
            </div>
        </div>

        <!-- /dashboard -->
        <@if($item[0]->status == 0):@>
            <@$status="Palaced" ;@>
            <@ $one = "active"; @>
        <@elseif($item[0]->status == 1):@>
            <@$status="Accepted" ;@>
            <@ $two = "active"; @>
        <@elseif($item[0]->status == 2):@>
            <@$status="Packed" ;@>
            <@ $three = "active"; @>
        <@elseif($item[0]->status == 3):@>
            <@$status="Shipped" ;@>
            <@ $four = "active"; @>
        <@elseif($item[0]->status == 4):@>
            <@$status="Delivered" ;@>
            <@ $five = "active"; @>
        <@endif@>

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <article class="card col-lg-12">
                        <header class="card-header"> 
                            My Orders / Tracking | 
                            <@if(!empty($shippingData[0]->cupon_code)):@>
                                <span>გამოყენებულია ფასდაკლების კუპონი : {{$shippingData[0]->cupon_code}}</span>
                            <@endif@>
                        </header>
                        <div class="card-body">
                            <h6>Order CodeID: {{$shippingData[0]->order_code}}</h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Order Date:</strong> <br>{{$shippingData[0]->order_date}} </div>
                                    <div class="col"> <strong>Address:</strong> <br> {{$shippingData[0]->city}}, {{$shippingData[0]->shipping_address}}| <i class="fa fa-phone"></i> {{$shippingData[0]->shipping_phone}} </div>
                                    <div class="col"> <strong>Status:</strong> <br> {{$status}} </div>
                                    <div class="col"> <strong>Tracking #:</strong> <br> {{$shippingData[0]->tracking_code}} </div>
                                </div>
                            </article>
                            <div class="track">
                                <div class="step {{$one}}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                <div class="step {{$two}}"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                <div class="step {{$three}}" > <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                <div class="step {{$four}}" > <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                            </div>
                            <hr>
                            <ul class="row">
                                <@foreach($orderProducts AS $item):@>
                                <li class="col-md-4">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="{{baseurl}}/assets/images/products/{{$item->image}}" class="img-sm border"></div>
                                        <figcaption class="info align-self-center">
                                            <span class="title"><a target="_blank" href="{{baseurl}}/details/{{$item->product_id}}">{{$item->product_name_geo}}</a></span>
                                            <span class="text-muted"> {{$item->color_name_geo}} - {{$item->size_name}} </span> 
                                            <div class="text-muted">ფასი ₾ {{$item->product_price}} </div>
                                            <div class="text-muted">გადახდილია ₾ {{$item->product_price - $item->product_sale}} </div>
                                        </figcaption>
                                    </figure>
                                </li>
                                <@endforeach@>
                            </ul>
                            <hr> <a href="{{baseurl}}/admin/" class="btn btn-primary" data-abc="true"> <i class="fa fa-chevron-left"></i> უკან დაბრუნება </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- Your orders -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">მომხმარებელი რომელმაც შეუკვეთა</h5>
                        <div class="recent-members">
                            <table class="table table-stripped table-hover" id="orders">
                                <thead>
                                    <tr>
                                        <td>სახელი</td>
                                        <td>გვარი</td>
                                        <td>ტელეფონი</td>
                                        <td>ელ. ფოსტა</td>
                                    </tr>
                                </thead>

                                <tbody>
                                        <tr>
                                            <td>{{$shippingData[0]->firstname}}</td>
                                            <td>
                                                {{$shippingData[0]->lastname}}
                                            </td>
                                            <td>
                                                {{$shippingData[0]->phone}}
                                            </td>
                                            <td>
                                                {{$shippingData[0]->email}}
                                            </td>
                                           
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">ამანათის მიმღები პირი</h5>
                        <div class="recent-members">
                            <table class="table table-stripped table-hover" id="orders">
                                <thead>
                                    <tr>
                                        <td>სახელი</td>
                                        <td>გვარი</td>
                                        <td>ტელეფონი</td>
                                        <td>ელ. ფოსტა</td>
                                    </tr>
                                </thead>

                                <tbody>
                                        <tr>
                                            <td>{{$shippingData[0]->shipping_firstname}}</td>
                                            <td>
                                                {{$shippingData[0]->shipping_lastname}}
                                            </td>
                                            <td>
                                                {{$shippingData[0]->shipping_phone}}
                                            </td>
                                            <td>
                                                {{$shippingData[0]->shipping_email}}
                                            </td>
                                           
                                        </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>საფოსტო კოდი</th>
                                        <th>ქალაქი</th>
                                        <th>მისამართი</th>
                                        <th>-</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <tr>
                                            <td>{{$shippingData[0]->post_code}}</td>
                                            <td>
                                                {{$shippingData[0]->city}}
                                            </td>
                                            <td>
                                                {{$shippingData[0]->address}}
                                            </td>
                                            <td>
                                                -
                                            </td>
                                           
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/Your orders-->

    </div>
</div>
<!-- /PAGE CONTENT -->