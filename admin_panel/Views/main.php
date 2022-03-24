<script type="text/javascript">
    $(function() {
        // Dashboard Sales Chart
        // ------------------------------------------------------------------

        var dataMain = {
            labels: ['იან', 'თებ', 'მარ', 'აპრ', 'მაი', 'ივნ', 'ივლ', 'აგვ', 'სექ', 'ოქტ', 'ნოე', 'დეკ'],
            series: [
                ["{{$jan}}", "{{$feb}}", "{{$mar}}", "{{$apr}}", "{{$may}}", "{{$jun}}", "{{$jul}}", "{{$aug}}", "{{$sep}}", "{{$oct}}", "{{$noe}}", "{{$dec}}"]

            ]
        };

        var optionsMain = {
            seriesBarDistance: 10
        };

        var responsiveOptionsMain = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];
        var chart = new Chartist.Bar('.ct-chart-dashboard', dataMain, optionsMain, responsiveOptionsMain);
    });
</script>
<script>
    $(document).ready(function() {
        $('#orders').DataTable({
            paging: true,
            ordering: true,
            info: true,
            searching: true
        });

    });
</script>
<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">სტატისტიკა <small>ფინანსები</small></h3>
            </div>
        </div>

        <!-- dashboard -->
        <div class="row">
            <div class="col-lg-3 col-xs-4">
                <div class="widget-overview bg-primary-1">
                    <div class="inner">
                        <h2><i class="lari lari-bolder"></i> {{$orderStats[0]->price - $orderStats[0]->sale}}</h2>
                        <p>შემოსული თანხა</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-credit-card-alt"></i>
                    </div>

                    <div class="details bg-primary-3">
                        <span>View Details <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-4">
                <div class="widget-overview bg-primary-1">
                    <div class="inner">
                        <h2>{{$orderStats[0]->qty}}</h2>
                        <p>გაყიდული პროდუქცია</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-cart-arrow-down"></i>
                    </div>

                    <div class="details bg-primary-3">
                        <span>View Details <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-4">
                <div class="widget-overview bg-primary-1">
                    <div class="inner">
                        <h2>{{$compledOrders[0]->qty}}</h2>
                        <p>დასრულებული შეკვეთები</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-cart-plus"></i>
                    </div>

                    <div class="details bg-primary-3">
                        <span>View Details <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-4">
                <div class="widget-overview bg-primary-1">
                    <div class="inner">
                        <h2>{{$currentOrders[0]->qty}}</h2>
                        <p>მიმდინარე შეკვეთბი</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>

                    <div class="details bg-primary-3">
                        <span>View Details <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

        </div>

        <!-- /dashboard -->

        <div class="row margin-top-10">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">გაყიდვები</h5>
                    </div>
                    <div class="ct-chart-dashboard height-250 ct-chart-blue"></div>
                </div>
            </div>
        </div>

        <!-- Your orders -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">შეკვეთები</h5>
                        <div class="recent-members">
                            <table class="table table-stripped table-hover" id="orders">
                                <thead>
                                    <tr>
                                        <td>#ID</td>
                                        <td>დასახელება</td>
                                        <td>სტატუსი</td>
                                        <td>თარიღი</td>
                                        <td>დეტალურად</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <@foreach($orders AS $item):@>
                                        <@if($item->status == 0):@>
                                            <@$status = "Palaced";@>
                                        <@elseif($item->status == 1):@>
                                        <@$status = "Palaced";@>
                                            <@$status = "Accepted";@>
                                        <@elseif($item->status == 2):@>
                                            <@$status = "Packed";@>
                                        <@elseif($item->status == 3):@>
                                            <@$status = "Shipped";@>
                                        <@elseif($item->status == 4):@>
                                            <@$status = "Delivered";@>
                                        <@endif@>
                                        <tr>
                                            <td><a href="#">{{$item->order_id}}</a></td>
                                            <td>{{$item->product_name_geo}}</td>
                                            <td>
                                                {{$status}}
                                            </td>
                                            <td>
                                                {{$item->order_date}}
                                            </td>
                                            <td><a href="{{baseurl}}/admin/order_details/{{$item->order_id}}/{{$item->order_code}}">დეტალურად</a></td>
                                        </tr>
                                        <@endforeach@>
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