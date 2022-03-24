<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">კატეგორიები
                            <small>
                                <a href="{{baseurl}}/admin/shop_cat_details/0" id="add" class="btn btn-success"><i class="fa fa-plus-circle"></i> ძირითადი კატეგორიის დამატება</a>
                                <abutton href="#tree" class="btn btn-primary" data-toggle="collapse"><i class="fa fa-plus-circle"></i> ქვე კატეგორიის დამატება</abutton>
                            </small>
                        </h5>
                        <!--tree-->
                        <div id="tree" class="recent-members collapse">
                            <!--tree-->
                            <div class="tree well">
                                {{$tree}}
                            </div>
                            <!--/tree-->

                        </div>


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