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
                        საწყობი
                    </small>
                </h3>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <legend class="text-bold">საწყობში დამატება</legend>
                        <fieldset class="content-group">
                            <form method="post">
                                <div class="row" style="margin-top: 40px!important;">
                                    <div class="form-group">
                                        <select name="colorID" class="form-control" require>
                                            <@foreach($colorList AS $item):@>
                                                <option value="{{$item->color_id}}">{{$item->color_name_geo}}</option>
                                                <@endforeach@>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="sizeID" class="form-control" require>
                                            <@foreach($sizeList AS $item):@>
                                                <option value="{{$item->size_id}}">{{$item->size_name}}</option>
                                                <@endforeach@>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="barCode" placeholder="BarCode" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="sku" value="1" placeholder="რაოდენობა" class="form-control" require>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-success">საწყობში დამატება</button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#productList').DataTable();
            });
        </script>

        <!-- Your orders -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Product</h5>
                        <div class="recent-members">
                            <table class="display table table-stripped" id="productList">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>ფერი</td>
                                        <td>ზომა</td>
                                        <td>ბარკოდი</td>
                                        <td>რაოდენობა</td>
                                        <td>წაშლა</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <@if(is_array($variationList)):@>
                                        <@foreach ($variationList as $item):@>
                                            <tr>
                                                <td><a href="">{{$item->variation_id}}</a></td>
                                                <td>{{$item->color_name_geo}}</td>
                                                <td>{{$item->size_name}}</td>
                                                <td>{{$item->barcode}}</td>
                                                <td>
                                                    <form method="post">
                                                        <input type="number" style="width: 45px;" width="10" name="sku" value="{{$item->sku}}">
                                                        <input type="hidden" name="variationID" value="{{$item->variation_id}}">
                                                        <input type="submit" name="update" value="&#x2714;">
                                                    </form>
                                                </td>
                                                <td><a href="" data-href="{{baseurl}}/admin/delete_variation/{{$item->variation_id}}/{{$productID}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> </a></td>
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
                <h4 class="modal-title" id="myModalLabel">წაშლის დადასტურება</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ პროდუქტი მთლიანად</p>
                <p>დააკლიკეთ წაშლა, წინააღმდეგ შემთხვევაში გაუქმება</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">გაუქმება</button>
                <a class="btn btn-danger btn-ok">წაშლა</a>
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