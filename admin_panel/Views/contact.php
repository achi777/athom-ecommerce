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
                <h3 class="page-title">პარამეტრები
                    <small>
                        კონტაქტი
                    </small>
                </h3>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <legend class="text-bold">საკონტაქტო ინფორმაცია</legend>
                        <fieldset class="content-group">
                            <form method="post">
                                <div class="row" style="margin-top: 40px!important;">
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{$contact[0]->address}}" placeholder="მისამართი" class="form-control" style="width: 350px;" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{$contact[0]->phone}}" placeholder="ტელეფონი" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" value="{{$contact[0]->email}}" placeholder="ელ. ფოსტა" class="form-control" require>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 40px!important;">
                                    <div class="form-group">
                                        <input type="text" name="fb" value="{{$contact[0]->fb}}" placeholder="facebook" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="twitter" value="{{$contact[0]->twitter}}" placeholder="twitter" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="instagram" value="{{$contact[0]->instagram}}" placeholder="instagram" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="youtube" value="{{$contact[0]->youtube}}" placeholder="youtube" class="form-control" require>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 40px!important;">
                                <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-success">საკონტაქტო ინფორმაციის განახლება</button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /PAGE CONTENT -->
