<style>
    .list_img {
        width: 75px;
    }
</style>
<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">პროდუქცია 
                    <small>
                    <@if(empty($catID)):@>
                        პროდუქციის დასამატებლად აირჩიეთ შესაბამისი კატეგორია
                    <@else:@>
                        <a href="{{baseurl}}/admin/product"><i class="fa fa-mail-reply"></i></a>&nbsp;&nbsp;
                        <a href="{{baseurl}}/admin/add_product/{{$catID}}"><i class="fa fa-plus-circle"></i> დამატება</a>
                    <@endif@>
                    </small>
                </h3>
                <a href="#tree" class="btn btn-primary" data-toggle="collapse">აირჩიეთ კატეგორია</a>
                <div id="tree" class="recent-members collapse">
                            <!--tree-->
                            <div class="tree well">
                                {{$tree}}
                            </div>
                            <!--/tree-->

                </div>
            </div>
        </div>

        <script>
            $(document).ready( function () {
                $('#productList').DataTable();
            } );
        </script>

        <!-- Your orders -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">პროდუქცია</h5>
                        <div class="recent-members">
                            <table class="display table table-stripped" id="productList">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>ფოტო</td>
                                    <td>დასახელება</td>
                                    <td>ფასი</td>
                                    <td>ფასდაკლება</td>
                                    <td>სტატუსი</td>
                                    <td>რედაქტირება</td>
                                    <td>წაშლა</td>
                                </tr>
                                </thead>

                                <tbody>
                                <@if(is_array($productList)):@>
                                    <@foreach ($productList as $item):@>
                                            <tr>
                                                <td><a target="_blank" href="{{baseurl}}/details/{{$item->product_id}}">{{$item->product_id}}</a></td>
                                                <td>
                                                <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}"  class="list_img">                    
                                                </td>
                                                <td>{{$item->product_name_geo}}</td>
                                                <td>₾ {{$item->product_price}}</td>
                                                <td>₾ {{$item->product_sale}}</td>
                                                <td>
                                                    <@if($item->product_status == 0):@>
                                                        წაშლილი
                                                    <@else:@>
                                                        აქტიური
                                                    <@endif@>
                                                </td>
                                                <td><a href="{{baseurl}}/admin/edit_product/{{$item->product_id}}"><i class="fa fa-edit"></i> </a></td>
                                                <td>
                                                    <@if($item->product_status == 0):@>
                                                        <a href="" data-href="{{baseurl}}/admin/product_active/{{$item->product_id}}/1/" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-undo"></i> </a>
                                                    <@else:@>
                                                        <a href="" data-href="{{baseurl}}/admin/product_active/{{$item->product_id}}/0/" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> </a>                                         
                                                    <@endif@>
                                                </td>
                                            </tr>
                                    <@endforeach@>
                                
                                <@endif@>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE CONTENT -->
<!--modal-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">წაშლის / აღდგენა</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ ან აღადგინოთ პროდუქტი</p>
                <p>დააკლიკეთ "დადასტურება" ს, წინააღმდეგ შემთხვევაში გაუქმება</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">გაუქმება</button>
                <a class="btn btn-danger btn-ok">დადასტურება</a>
            </div>
        </div>
    </div>
</div>
<!--/modal-->
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>