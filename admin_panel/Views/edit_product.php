<style>
    .list_img {
        width: 75px;
        height: 120px;
    }

    .delete {
        cursor: pointer !important;
        font-size: 30px;
        position: absolute;
        color: white;
        border: none;
        background: none;
        right: -15px;
        top: -15px;
        line-height: 1;
        z-index: 99;
        padding: 0;
    }

    .delete span {
        height: 30px;
        width: 30px;
        background-color: black;
        border-radius: 50%;
        display: block;
    }

    .box {
        width: calc((100% - 30px) * 0.333);
        margin: 5px;
        height: 150px;
        width: 150px;
        background: #CCCCCC;
        float: left;
        box-sizing: border-box;
        position: relative;
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .15);
    }

    .box:hover {
        box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.5);
    }

    .box .image {
        width: 100%;
        height: 80%;
        position: relative;
        overflow: hidden;
    }

    .box .image img {
        width: 100%;
        min-height: 80%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }

    .box .title {
        width: 100%;
        height: 20%;
        top: 80%;
        text-align: center;
        z-index: 100;
    }

    .custom-file-control::after {
        content: "Choose file...";
    }

    .custom-file-control::before {
        content: "Browse";
    }

    @media (max-width: 600px) {
        .box {
            width: calc((100% - 20px) * 0.5);
            height: 200px;
        }
    }
</style>
<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">პროდუქცია <small><a href="{{baseurl}}/admin/variations/{{$productID}}"><i class="fa fa-plus-circle"></i> საწყობი </a> </small></h3>
            </div>
        </div>

        <!-- form -->

        <div class="card">
            <div class="card-block">

                <legend class="text-bold">პროდუქციის დასახელება</legend>
                <fieldset class="content-group">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row margin-top-10">
                            <div class="col-md-2">
                                <label class="control-label col-form-label"> ქართულად</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="product_name_geo" value="{{$productDetails[0]->product_name_geo}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label class="control-label col-form-label"> ინგლისურად</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="product_name_eng" value="{{$productDetails[0]->product_name_eng}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label class="control-label col-form-label"> რუსულად</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="product_name_rus" value="{{$productDetails[0]->product_name_rus}}">
                            </div>
                        </div>


                </fieldset>

                <legend class="text-bold">პროდუცტის ფასები</legend>
                <fieldset class="content-group">

                    <div class="form-group row margin-top-10">
                        <div class="col-md-2">
                            <label class="control-label col-form-label">ფასი</label>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><i class="lari lari-bolder"></i></span>
                                <input type="text" class="form-control" placeholder="ფასი" name="product_price" value="{{$productDetails[0]->product_price}}" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row margin-top-10">
                        <div class="col-md-2">
                            <label class="control-label col-form-label">ფასდაკლება</label>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><i class="lari lari-bolder"></i></span>
                                <input type="text" class="form-control" placeholder="ფასდაკლები" name="product_sale" value="{{$productDetails[0]->product_sale}}" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>


                </fieldset>

                <legend class="text-bold">მოკლე აღწერა</legend>
                <fieldset class="content-group">
                    <div class="card-block text-center">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#geo" role="tab">ქართულად</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#eng" role="tab">ინგლისურად</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rus" role="tab">რუსულად</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="geo" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-geo" name="product_desc_geo">{{$productDetails[0]->product_desc_geo}}</textarea>
                            </div>
                            <div class="tab-pane" id="eng" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-eng" name="product_desc_eng">{{$productDetails[0]->product_desc_eng}}</textarea>
                            </div>
                            <div class="tab-pane" id="rus" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-rus" name="product_desc_rus">{{$productDetails[0]->product_desc_rus}}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <legend class="text-bold">დეტალური ინფორმაცია</legend>
                <fieldset class="content-group">
                    <div class="card-block text-center">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#geoFull" role="tab">ქართულად</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#engFull" role="tab">ინგლისურად</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rusFull" role="tab">რუსულად</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="geoFull" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-full-geo" name="product_full_geo">{{$productDetails[0]->product_full_geo}}</textarea>
                            </div>
                            <div class="tab-pane" id="engFull" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-full-eng" name="product_full_eng">{{$productDetails[0]->product_full_eng}}</textarea>
                            </div>
                            <div class="tab-pane" id="rusFull" role="tabpanel">
                                <textarea class="form-control" rows="5" id="editor-full-rus" name="product_full_rus">{{$productDetails[0]->product_full_rus}}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <legend class="text-bold">აირჩიეთ ბრენდი </legend>
                <fieldset class="content-group">
                    <div class="row" style="margin-top: 20px!important; margin-left: 20px!important;">
                        <div class="form-group">
                            <select name="brandID" class="form-control" require>
                                <@foreach($brandList AS $item):@>
                                    <@if($productDetails[0]->brand_id == $item->brand_id):@>
                                        <option value="{{$item->brand_id}}" selected>{{$item->brand_name}}</option>
                                        <@else:@>
                                            <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                            <@endif@>
                                                <@endforeach@>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <legend class="text-bold">ფოტოები</legend>

                <fieldset class="content-group">
                    <div class="row">

                        <@foreach($photoList AS $item):@>
                            <div class="box">
                                <button type="button" onclick="window.location.href='{{baseurl}}/admin/delete_photo/{{$item->photo_id}}'" class="delete" ng-click="deleteModel(model)">
                                    <span>&times;</span>
                                </button>
                                <div class="image" id="{{$item->photo_id}}">
                                    <img ng-click="selectModel(model)" src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" />
                                </div>
                                <div class="title" for="{{$item->photo_id}}">{{$item->color_name}}</div>
                            </div>
                            <@endforeach@>


                    </div>

                </fieldset>

                <legend class="text-bold">აირჩიეთ ფოტოები (600x600) შემდეგ დააკლიკეთ "შენახვა" - ს </legend>
                <fieldset class="content-group">
                    <div class="row" style="margin-top: 40px!important;">
                        <div class="form-group">
                            <select name="color" class="form-control">
                                <@foreach($colorList AS $item):@>
                                    <option value="{{$item->color_id}}">{{$item->color_name_geo}}</option>
                                    <@endforeach@>
                            </select>
                        </div>

                        <label class="custom-file">
                            <input type="file" id="file" name="files[]" class="custom-file-input" multiple="multiple">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                </fieldset>



                <legend class="text-bold">თუ დაამთავრეთ პროდუქციის შეტანა დააკლიკეთ "შენახვა" - ს</legend>
                <fieldset class="content-group">

                    <div class="form-group row margin-top-10">
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success" value="შენახვა" name="add_product">

                            </div>
                        </div>
                    </div>

                </fieldset>

                </form>
            </div>
        </div>

        <!--/form-->

    </div>
</div>
<!-- /PAGE CONTENT -->
<script type="text/javascript" src="{{baseurl}}/theme_lib/thirdparty/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace("editor-geo", {
            height: "350px",
            extraPlugins: "forms"
        });
        CKEDITOR.replace("editor-eng", {
            height: "350px",
            extraPlugins: "forms"
        });
        CKEDITOR.replace("editor-rus", {
            height: "350px",
            extraPlugins: "forms"
        });
        CKEDITOR.replace("editor-full-geo", {
            height: "350px",
            extraPlugins: "forms"
        });
        CKEDITOR.replace("editor-full-eng", {
            height: "350px",
            extraPlugins: "forms"
        });
        CKEDITOR.replace("editor-full-rus", {
            height: "350px",
            extraPlugins: "forms"
        });
    });
</script>