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
                        ზომები
                    </small>
                </h3>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <legend class="text-bold">ზომების დამატება</legend>
                        <fieldset class="content-group">
                            <form method="post">
                                <div class="row" style="margin-top: 40px!important;">
                                    <div class="form-group">
                                        <input type="text" name="sizeName" placeholder="ზომა" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-success">ზომის დამატება</button>
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
                $('#colorList').DataTable();
            });
        </script>

        <!-- Your orders -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Colors</h5>
                        <div class="recent-members">
                            <table class="display table table-stripped" id="colorList">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>ზომა</td>
                                        <td>წაშლა</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <@if(is_array($sizeList)):@>
                                        <@foreach ($sizeList as $item):@>
                                            <tr>
                                                <td><a href="">{{$item->size_id}}</a></td>
                                                <td>{{$item->size_name}}</td>
                                                <td><a href="" data-href="{{baseurl}}/admin/delete_size/{{$item->size_id}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> </a></td>
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
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ ზომა მთლიანად</p>
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