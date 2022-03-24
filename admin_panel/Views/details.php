<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    .col img {
        height: 100%;
        width: 100%;
        cursor: pointer;
        transition: transform 1s;
        object-fit: cover;
    }

    .col label {
        overflow: hidden;
        position: relative;
    }

    .imgbgchk:checked+label>.tick_container {
        opacity: 1;
    }

    /*         aNIMATION */
    .imgbgchk:checked+label>img {
        transform: scale(1.25);
        opacity: 0.3;
    }

    .tick_container {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        cursor: pointer;
        text-align: center;
    }

    .tick {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        padding: 10px 12px;
        height: 40px;
        width: 40px;
        border-radius: 100%;
    }

    .image_space {
        max-width: 100px;
    }
</style>
<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images" id="product-images">
                        <main id="gallery">
                            <div class="main-img" id="mainImage">
                                
                            </div>
                            <div class="images" id="imageList">
  
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{$productDetails[0]->product_name_geo}}</h2>
                        <p class="category"><i class="lni lni-tag"></i> Brand:<a href="javascript:void(0)">{{$productDetails[0]->brand_name}}</a></p>
                        <h3 class="price">₾ {{$productDetails[0]->product_price - $productDetails[0]->product_sale}}<span>₾ {{$productDetails[0]->product_price}} </span></h3>
                        <p class="info-text">{{$productDetails[0]->product_desc_geo}}</p>
                        <!--size buttons-->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12" id="sizeList">
                                <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                                <label class="btn btn-light" for="option1" style="margin:10px; min-width:50px; max-width:50px!important;">NB</label>

                                <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                <label class="btn btn-light" for="option2" style="margin:10px; min-width:50px; max-width:50px!important;">3M</label>

                            </div>
                        </div>
                        <!--/size buttons-->
                        <!--color Images-->
                        <div class="row">
                            <@ $i=0; $checked="" ; $firstColorID="" ; foreach($colorPhotos AS $item): $i++; if($i==1){ $checked="checked" ; $firstColorID=$item->color_id;
                                }else{
                                $checked = "";
                                }
                                @>
                                <div class='col text-center image_space' onclick="selectColor('{{$item->color_id}}');">
                                    <input type="radio" name="imgbackground" id="{{$item->color_id}}" class="d-none imgbgchk" value="{{$item->color_id}}" {{$checked}}>
                                    <label for="{{$item->color_id}}">
                                        <img src="{{baseurl}}/assets/images/products/{{$item->photo_url}}" alt="{{$item->color_name}}">
                                        <div class="tick_container">
                                            <div class="tick"><i class="fa fa-check"></i></div>
                                        </div>
                                    </label>
                                </div>
                                <@endforeach@>
                                    <input type="hidden" name="colorIn" value="{{$firstColorID}}" id="colorIn">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control" id="sku">
                                        <option>SELECT QUANTITY</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/color images-->
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn" id="addToCart" disabled style="width: 100%;">Add to Cart</button>
                                    </div>
                                </div>
                                <!--
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn" id="compare"><i class="lni lni-reload"></i> Compare</button>
                                    </div>
                                </div>-->
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn" id="wishlistBTN"><i class="lni lni-heart"></i> To Wishlist</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>Details</h4>
                            <p>{{$productDetails[0]->product_full_geo}}</p>
                            <h4>Features</h4>
                            <ul class="features">
                                <li>Capture 4K30 Video and 12MP Photos</li>
                                <li>Game-Style Controller with Touchscreen</li>
                                <li>View Live Camera Feed</li>
                                <li>Full Control of HERO6 Black</li>
                                <li>Use App for Dedicated Camera Operation</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="info-body">
                            <h4>Specifications</h4>
                            <ul class="normal-list">
                                <li><span>Weight:</span> 35.5oz (1006g)</li>
                                <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                <li><span>Operating Frequency:</span> 2.4GHz</li>
                                <li><span>Manufacturer:</span> GoPro, USA</li>
                            </ul>
                            <h4>Shipping Options:</h4>
                            <ul class="normal-list">
                                <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var variationID;

    $(document).ready(function() {
        //wishlist

        $.get("{{baseurl}}/wishlist_ajax/", function(data, status){
                console.log("data : " + JSON.stringify(data));
                console.log("Length : " + Object.keys(data).length);
                let quantity = Object.keys(data).length;                      
                if(quantity > 0) {
                    $("#wishlist_count").text(quantity);
                }
                $.each(data,function(key, value){
                    //console.log(value.product_price);
                    //console.log("key : " + key);
                    if(value.product_id === "{{$productID}}"){
                        $("#wishlistBTN").prop("disabled", true);
                       console.log("is exist : " + value.product_id);
                    }
                        
                });
                    
            });
    

        // end wishlist
        let colorID = "{{$firstColorID}}";
        console.log("colorID : " + colorID);
        console.log("{{baseurl}}/product_size_ajax/{{$productID}}/" + colorID);
        $.get("{{baseurl}}/product_size_ajax/{{$productID}}/" + colorID, function(data, status) {
            $("#addToCart").prop("disabled", true);
            $("#colorIn").val(colorID);
            let $selectSKU = $('#sku');
            //$selectSKU.find('option').remove();
            let $select = $('#sizeList');
            $select.find('input').remove();
            $select.find('label').remove();
            $.each(data, function(key, value) {

                $select.append(`<input type="radio" class="btn-check" name="size" id="size_` + value.size_id + `" autocomplete="off" checked>
                                    <label onClick="qtyList(` + colorID + `,` + value.size_id + `);" class="btn btn-light" for="size_` + value.size_id + `" style="margin:10px; min-width:50px; max-width:50px!important;">` + value.size_name + `</label>`);

            });
            console.log(data);
            $.get("{{baseurl}}/photo_list_ajax/{{$productID}}/" + colorID, function(data, status) {

            let $select = $('#imageList');
            let $selectMain = $("#mainImage");
            $select.find('img').remove();
            $selectMain.find('img').remove();
            let i = 0;
            $.each(data, function(key, value) {
                i++;
                if (i == 1) {
                    $selectMain.append(`<img src="{{baseurl}}/assets/images/products/` + value.photo_url + `" id="current" alt="#">`);
                }
                $select.append(`<img src="{{baseurl}}/assets/images/products/` + value.photo_url + `" class="img" alt="#">`);


            });
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class 
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });

            console.log(data);
            });
        });
    });

    function selectColor(colorID) {
        //let colorID = $("#color").val();
        console.log("{{baseurl}}/product_size_ajax/{{$productID}}/" + colorID);
        $.get("{{baseurl}}/product_size_ajax/{{$productID}}/" + colorID, function(data, status) {
            $("#addToCart").prop("disabled", true);
            $("#colorIn").val(colorID);
            let $selectSKU = $('#sku');
            $selectSKU.find('option').remove();
            let $select = $('#sizeList');
            $select.find('input').remove();
            $select.find('label').remove();
            $.each(data, function(key, value) {
                $select.append(`<input type="radio" class="btn-check" name="size" id="size_` + value.size_id + `" autocomplete="off">
                                    <label onClick="qtyList(` + colorID + `,` + value.size_id + `);" class="btn btn-light" for="size_` + value.size_id + `" style="margin:10px; min-width:50px; max-width:50px!important;">` + value.size_name + `</label>`);

            });

            console.log(data);
        });
        console.log("{{baseurl}}/photo_list_ajax/{{$productID}}/" + colorID);
        $.get("{{baseurl}}/photo_list_ajax/{{$productID}}/" + colorID, function(data, status) {

            let $select = $('#imageList');
            let $selectMain = $("#mainImage");
            $select.find('img').remove();
            $selectMain.find('img').remove();
            let i = 0;
            $.each(data, function(key, value) {
                i++;
                if (i == 1) {
                    $selectMain.append(`<img src="{{baseurl}}/assets/images/products/` + value.photo_url + `" id="current" alt="#">`);
                }
                $select.append(`<img src="{{baseurl}}/assets/images/products/` + value.photo_url + `" class="img" alt="#">`);


            });
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class 
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });

            console.log(data);
        });

    }

    function qtyList(colorID, sizeID) {
        //let colorID = $("#colorIn").val();
        //let sizeID = $("#size").val();
        console.log(sizeID);
        if (sizeID === 0) {
            $("#addToCart").prop("disabled", true);
            var $select = $('#sku');
            $select.find('option').remove();
        } else {
            $("#addToCart").prop("disabled", false);
        }
        $.get("{{baseurl}}/product_sku_ajax/{{$productID}}/" + colorID + "/" + sizeID, function(data, status) {

            if (data[0].sku === null || data[0].sku === 0 || sizeID === 0) {
                $("#addToCart").prop("disabled", true);
            } else {
                $("#addToCart").prop("disabled", false);
            }
            //console.log(data[0].sku);
            variationID = data[0].variation_id;
            let $select = $('#sku');
            $select.find('option').remove();
            for (let i = 1; i <= data[0].sku; i++) {
                $select.append('<option value=' + i + '>' + i + '</option>');
            }
            console.log(data);
        });

    }

    $('#addToCart').click(function() {
        let qty = $("#sku").val();

        $.get("{{baseurl}}/shopping_cart_ajax/1/" + variationID + "/" + qty, function(data, status) {
            /*
            if(data[0].sku === null || data[0].sku === 0){
                $("#addToCart").prop("disabled",true);
            }else{
                $("#addToCart").prop("disabled",false);
            }
            */
            //console.log(data[0].sku);
            let quantity = 0;
            let sum = 0;
            $("#cart_items").html("");
            //for(i = 0; i <= data.length -1 ; i++){
            $.each(data, function(key, value) {

                quantity += value.quantity;
                sum += parseFloat(value.product_price) * value.quantity;
                console.log(value.product_price);
                console.log(sum);

                if (value.quantity > 0) {
                    $("#cart_items").append(`<li>
                                <a href="" onClick="removeCard(` + value.vriation_id + `);" class="remove" title="Remove this item">
                                    <i class="lni lni-close"></i>
                                </a>
                                <div class="cart-img-head">
                                    <a class="cart-img" href="{{baseurl}}/details/`+value.product_id+`">
                                    <img src="{{baseurl}}/assets/images/products/` + value.image + `" alt="#">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>
                                    <a href="{{baseurl}}/details/` + value.product_id + `"> ` + value.product_name_geo + `</a>
                                    </h4>
                                    <p class="quantity">` + value.quantity + `x - <span class="amount"> ₾ ` + parseFloat(value.product_price) * parseFloat(value.quantity) + `</span>
                                    </p>
                                </div>
                                </li>`);
                }

                if (quantity > 0) {
                    $("#cart_count").text(quantity);
                    $("#cart_count_in").text(quantity + " Items");
                    $("#total_amount").text("₾ " + sum);
                } else {
                    $("#cart_count").text(0);
                    $("#cart_count_in").text(0 + " Items");
                    $("#total_amount").text("₾ " + 0);
                }
            });

        });

    });


    $('#wishlistBTN').click(function() {
        $.get("{{baseurl}}/wishlist_ajax/1/{{$productID}}/", function(data, status) {
            /*
            if(data[0].sku === null || data[0].sku === 0){
                $("#addToCart").prop("disabled",true);
            }else{
                $("#addToCart").prop("disabled",false);
            }
            */
            //console.log(data[0].sku);
            let quantity = Object.keys(data).length;                      
            if(quantity > 0) {
                $("#wishlist_count").text(quantity);
            }
            $.each(data,function(key, value){
                //console.log(value.product_price);
                //console.log("key : " + key);
                if(value.product_id === "{{$productID}}"){
                    $("#wishlistBTN").prop("disabled", true);
                    console.log("is exist : " + value.product_id);
                }
                    
            });

        });

    });
</script>

<!-- End Item Details -->