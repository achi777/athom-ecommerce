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
                <h3 class="page-title">პოსტები 
                    <small>
                        აირჩიეთ კატეგორია
                    </small>
                </h3>
            </div>
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{baseurl}}/admin/post_list/">ყველა</a>
                <@foreach($postCats AS $item):@>
                    <a class="btn btn-primary" href="{{baseurl}}/admin/post_list/{{$item->cat_id}}">{{$item->cat_name_geo}}</a>
                <@endforeach@>
            </div>
        </div>

        <script>
            $(document).ready( function () {
                $('#productList').DataTable({
                    "pageLength": 50
                });
            } );
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
                                    <td>დასახელება</td>
                                    <td>აღწერა</td>
                                    <td>რედაქტირება</td>
                                    <td>წაშლა</td>
                                </tr>
                                </thead>

                                <tbody>
                                <@if(is_array($postList)):@>
                                    <@foreach ($postList as $item):@>
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->title_geo}}</td>
                                                <td>{{$item->description_geo}}</td>
                                                <td><a href="{{baseurl}}/admin/edit_post/{{$item->id}}"><i class="fa fa-edit"></i> </a></td>
                                                <td>
                                                    <a href="" data-href="{{baseurl}}/admin/delete_post/{{$item->id}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> </a>
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
                <h4 class="modal-title" id="myModalLabel">პოსტის წაშლია</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ პოსტი</p>
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