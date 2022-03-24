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
                <h3 class="page-title">მომხმარებლები
                    <small>
                        მომხმარებელთა სია
                    </small>
                </h3>
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
                        <h5 class="card-title">მომხმარებლები</h5>
                        <div class="recent-members">
                            <table class="display table table-stripped" id="productList">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>სახელი</td>
                                    <td>გვარი</td>
                                    <td>ელ. ფოსტა</td>
                                    <td>ტელეფონი</td>
                                    <td>სტატუსი</td>
                                    <td><i class="fa fa-user-circle-o"></i></td>
                                    <td>კუპონის გაგზავნა</td>
                                </tr>
                                </thead>

                                <tbody>
                                <@if(is_array($userList)):@>
                                    <@foreach ($userList as $item):@>
                                            <tr>
                                                <td>{{$item->user_id}}</td>
                                                <td>{{$item->firstname}}</td>
                                                <td>{{$item->lastname}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>
                                                    <@if($item->user_status == 0):@>
                                                        დაბლოკილი
                                                    <@else:@>
                                                        აქტიური
                                                    <@endif@>
                                                </td>
                                                <td>
                                                <@if($item->user_status == 0):@>
                                                    <a style="margin-left: 10px;" href="" data-href="{{baseurl}}/admin/user_active/{{$item->user_id}}/1/" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-check"></i> </a>
                                                <@else:@>
                                                    <a style="margin-left: 10px;" href="" data-href="{{baseurl}}/admin/user_active/{{$item->user_id}}/0/" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-ban"></i> </a>
                                                <@endif@>

                                                </td>
                                                <td><a class="btn btn-primary" href="{{baseurl}}/admin/coupon_attach/{{$item->user_id}}/" role="button">კუპონის</a></td>
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
                <h4 class="modal-title" id="myModalLabel">დაბლოკვია / გააქტიურება</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ დაბლოკოთ ან გაააქტიუროთ მომხმარებელი</p>
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
