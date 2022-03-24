    <section class="product-grids section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-12">
            <div class="product-sidebar">
              <div class="single-widget search">
                <h3>Search Product</h3>
                <form action="#">
                  <input type="text" placeholder="Search Here...">
                  <button type="submit">
                    <i class="lni lni-search-alt"></i>
                  </button>
                </form>
              </div>
              
              <@if($productCatList[0]->cat_parent_id == 0):@>
              <div class="single-widget">
                <h3>All Categories</h3>
                <ul class="list">
                  <@foreach($subCatList AS $item):@>
                  <li>
                    <a href="{{baseurl}}/shop/{{$item->cat_id}}/">{{$item->cat_name_geo}} </a>
                    <!--<span>(12)</span>-->
                  </li>
                  <@endforeach@>
                </ul>
              </div>
              <@endif@>
              <div class="single-widget range">
                <h3>Price Range</h3>
                <input type="range" id="range" class="form-range" name="range" step="1" min="5" max="5000" value="10" onchange="rangePrimary.value=value">
                <div class="range-inner">
                  <label>₾</label>
                  <input type="text" name="priceRange" id="rangePrimary" placeholder="100" />
                </div>
                <p>
                  <br>
                  <a onclick="range();" class="btn btn-light">Accept</a>

                
                </p>
              </div>
              <div class="single-widget condition">
                <h3>Filter by Color</h3>           
                  <select name="color" id="color" class="form-control">
                    <option value="x">-</option>
                    <@foreach($colors AS $item):@>
                    <option value="{{$item->color_id}}">{{$item->color_name}}</option>
                    <@endforeach@>
                  </select>
                <div class="form-check">
                </div>
                <h3>Filter by Size</h3>
                  <select name="size" id="size" class="form-control">
                    <option value="x">-</option>
                    <@foreach($sizes AS $item):@>
                    <option value="{{$item->size_id}}">{{$item->size_name}}</option>
                    <@endforeach@>
                  </select>
                <div class="form-check">
                </div>
              </div>
              <div class="single-widget condition">
                <h3>Filter by Brand</h3>
                <select name="brand" id="brand" class="form-control">
                <option value="x">-</option>
                <@foreach($brandList AS $item):@>
                  <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                <@endforeach@>
                </select>
                <div class="form-check">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-12">
            <div class="product-grids-head">
              <div class="product-grid-topbar">
                <div class="row align-items-center">
                  <div class="col-lg-7 col-md-8 col-12">
                    <div class="product-sorting">
                      <label for="sorting">Sort by:</label>
                      <select class="form-control" id="sorting">
                        <option value="1">New Production</option>
                        <option value="2">Low - High Price</option>
                        <option value="3">High - Low Price</option>
                      </select>
                      <h3 class="total-show-product">Showing: <span>1 - 9 items</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                  <div class="row">
                      <!--item-->
                      <@foreach($productList AS $item):@>
                    <div class="col-lg-4 col-md-6 col-12">
                      <div class="single-product">
                        <div class="product-image">
                          <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" alt="#">
                          <div class="button">
                            <a href="{{baseurl}}/details/{{$item->product_id}}" class="btn">
                              View Details </a>
                          </div>
                        </div>
                        <div class="product-info">
                          <span class="category">{{$item->cat_name_geo}}</span>
                          <h4 class="title">
                            <a href="{{baseurl}}/details/{{$item->product_id}}">{{$item->product_name_geo}}</a>
                          </h4>
                          <@if($item->product_sale > 0):@>
                          <div class="price">
                            <span>₾{{$item->product_price - $item->product_sale}}</span>
                            <span class="discount-price">₾{{$item->product_price}}</span>
                          </div>
                          <@else:@>
                          <div class="price">
                            <span>₾{{$item->product_price}}</span>
                          </div>
                          <@endif@>
                        </div>
                      </div>
                    </div>
                    <@endforeach@>
                    <!--/item-->             
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="pagination left">
                            {{$pagination}}
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      $( document ).ready(function() {
        $('#range').val("{{$params[0]->priceRange}}");
        $('#rangePrimary').val("{{$params[0]->priceRange}}");
        $('#color option[value="{{$params[0]->colorID}}"]').attr("selected", "selected");
        $('#size option[value="{{$params[0]->sizeID}}"]').attr("selected", "selected");
        $('#brand option[value="{{$params[0]->brandID}}"]').attr("selected", "selected");
        $('#sorting option[value="{{$params[0]->ord}}"]').attr("selected", "selected");
      });
      function range(){
          let range = $('#range').val();
          let url = "{{baseurl}}/{{$params[0]->controller}}/{{$params[0]->catID}}/{{$params[0]->colorID}}/{{$params[0]->sizeID}}/"+range+"/{{$params[0]->brandID}}/{{$params[0]->ord}}/";
          window.location.href=url;
      }
      $('#color').change(function() {
        let colorID = $("#color").val();
        let url = "{{baseurl}}/{{$params[0]->controller}}/{{$params[0]->catID}}/"+colorID+"/{{$params[0]->sizeID}}/{{$params[0]->priceRange}}/{{$params[0]->brandID}}/{{$params[0]->ord}}/";
        window.location.href=url;
      });
      $('#size').change(function() {
        let sizeID = $("#size").val();
        let url = "{{baseurl}}/{{$params[0]->controller}}/{{$params[0]->catID}}/{{$params[0]->colorID}}/"+sizeID+"/{{$params[0]->priceRange}}/{{$params[0]->brandID}}/{{$params[0]->ord}}/";
        window.location.href=url;
      });
      $('#brand').change(function() {
        let brandID = $("#brand").val();
        let url = "{{baseurl}}/{{$params[0]->controller}}/{{$params[0]->catID}}/{{$params[0]->colorID}}/{{$params[0]->sizeID}}/{{$params[0]->priceRange}}/"+brandID+"/{{$params[0]->ord}}/";
        window.location.href=url;
      });
      $('#sorting').change(function() {
        let ord = $("#sorting").val();
        let url = "{{baseurl}}/{{$params[0]->controller}}/{{$params[0]->catID}}/{{$params[0]->colorID}}/{{$params[0]->sizeID}}/{{$params[0]->priceRange}}/{{$params[0]->brandID}}/"+ord+"/";
        window.location.href=url;
      });

    </script>