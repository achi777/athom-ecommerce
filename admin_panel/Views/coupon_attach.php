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
                            <legend class="text-bold">პოსტის სათაური</legend>
                            <fieldset class="content-group">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row margin-top-10">
                                        <div class="col-md-2">
                                            <label class="control-label col-form-label"> კუპონის კოდი</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="uuid" value="{{$coupon_uuid}}">
                                        </div>
                                    </div>
                                    <div class="form-group row margin-top-10">
                                        <div class="col-md-2">
                                            <label class="control-label col-form-label"> მომხმარებლის მეილი</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" name="email" value="{{$userData[0]->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row margin-top-10">
                                        <div class="col-md-2">
                                            <label class="control-label col-form-label">ფასდაკლების თანხა</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="cupon_amount">
                                        </div>
                                    </div>
                                    <fieldset class="content-group">

                                        <div class="form-group row margin-top-10">
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-success" value="გაგზავნა" name="addCupon">

                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </fieldset>
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
