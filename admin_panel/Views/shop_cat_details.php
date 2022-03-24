<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">მაღაზიის კატეგორიები <small> </small></h3>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <div class="recent-members">
                            <div class="col-xs-6 col-lg-5">
                                <@if($catID> 0):@>
                                    <legend class="text-bold">კატეგორიის რედაქტირება</legend>
                                    <fieldset class="content-group">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group row margin-top-10">
                                                <div class="col-md-4">
                                                    <label class="control-label col-form-label"> ქართულად</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="product_cat_name_geo_up" value="{{$details[0]->cat_name_geo}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="control-label col-form-label"> ინგლისურად</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="product_cat_name_eng_up" value="{{$details[0]->cat_name_eng}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="control-label col-form-label"> რუსულად</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="product_cat_name_rus_up" value="{{$details[0]->cat_name_rus}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="control-label col-form-label"> აირჩიეთ ფოტო (200x200) </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="cat_photo">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <span class="input-group-btn">
                                                        <button type="submit" name="update" class="btn btn-warning"><i class="fa fa-cloud-upload"></i> რედაქტირება</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset>
                                    <@endif@>
                                        <legend class="text-bold">კატეგორიის დამატება</legend>
                                        <fieldset class="content-group">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group row margin-top-10">
                                                    <div class="col-md-4">
                                                        <label class="control-label col-form-label"> ქართულად</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="product_cat_name_geo_add">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="control-label col-form-label"> ინგლისურად</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="product_cat_name_eng_add">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="control-label col-form-label"> რუსულად</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="product_cat_name_rus_add">
                                                    </div>
                                                </div>

                                                <@if($catID==0):@>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label class="control-label col-form-label">აირჩიეთ ფოტო (200x200) </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="cat_photo">
                                                        </div>
                                                    </div>
                                                    <@endif@>

                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <span class="input-group-btn">
                                                                    <button type="submit" name="add" class="btn btn-success"><i class="fa fa-plus-circle"></i> დამატება</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                            </form>
                                        </fieldset>
                                        <@if($catID> 0):@>
                                            <legend class="text-bold">კატეგორიის წაშლა</legend>
                                            <fieldset class="content-group">
                                                <div class="form-group row margin-top-10">
                                                    <div class="col-md-12">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <@if($details[0]->cat_status == 0):@>
                                                                <a href="" data-href="{{baseurl}}/admin/shop_cat_details/{{$catID}}/1/active" data-toggle="modal" data-target="#confirm-delete" class="btn btn-success form-control"><i class="fa fa-trash-o"></i> აღდგენა</a>
                                                            <@else:@>
                                                                <a href="" data-href="{{baseurl}}/admin/shop_cat_details/{{$catID}}/0/active" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger form-control"><i class="fa fa-undo"></i> წაშლა</a>
                                                            <@endif@>
                                                        </form>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <@endif@>
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
                <h4 class="modal-title" id="myModalLabel">წაშლის / აღდგენა</h4>
            </div>

            <div class="modal-body">
                <p>თქვენ თუ ნამდვილად გინდათ წაშალოთ ან აღადგინოთ კატეგორია და ამ კატეგორიაშ არსებული ყველა პროდუქტი?</p>
                <p>დააკლიკეთ დადასტურება, წინააღმდეგ შემთხვევაში გაუქმება</p>
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