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
                        კომბინაციაში პროდუქტის დასამატებლად დააკლიკეთ შესაბამის კომბო კოდს
                    </small>
                </h3>
            </div>
        </div>

        <script>
            $(document).ready( function () {
                $('#comboList').DataTable({
                    "paging":   true
                });
            } );
            $(document).ready( function () {
                $('#productList').DataTable({
                    "paging":   false
                });
            } );
        </script>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">კომბინაციები</h5>

                        <div class="recent-members">
                            <table class="display table table-stripped" id="comboList">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>ფოტო</td>
                                    <td>დასახელება</td>
                                    <td>ფასი</td>
                                    <td>ფასდაკლება</td>
                                    <td>კომბო კოდი</td>
                                    <td>წაშლა</td>
                                </tr>
                                </thead>

                                <tbody>
                                <@if(is_array($comboList)):@>
                                    <@foreach ($comboList as $item):@>
                                            <tr>
                                                <td><a target="_blank" href="{{baseurl}}/details/{{$item->product_id}}">{{$item->product_id}}</a></td>
                                                <td>
                                                <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}"  class="list_img">                    
                                                </td>
                                                <td>{{$item->product_name_geo}}</td>
                                                <td>₾ {{$item->product_price}}</td>
                                                <td>₾ {{$item->product_sale}}</td>
                                                <td><a href="{{baseurl}}/admin/combos/{{$item->combo_code}}">{{$item->combo_code}}</a></td>
                                                <td><a href="" data-href="{{baseurl}}/admin/delete_combo/{{$item->combo_code}}/{{$item->product_id}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> </a> </td>
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
        <!-- Your orders -->
        <form method="POST">
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
                                    <td>კომბინირება</td>
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
                                                <td><input type="checkbox" name="check_list[]" value="{{$item->product_id}}"></td>
                                            </tr>
                                    <@endforeach@>
                                
                                <@endif@>
                                </tbody>
                            </table>
                        </div>
                        <input type="submit" name="submit" value="კომბინირება">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /PAGE CONTENT -->
<!--modal-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">წაშლა</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ კომბინაცია</p>
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