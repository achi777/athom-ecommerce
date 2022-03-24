<section class="d-xl-none d-lg-none">
  <div class="conteiner d-flex justify-content-center" style="min-height: 130px!important;">
    <a href="#" class="scroll-topM d-flex justify-content-center">
      <i class="lni lni-chevron-up"></i>
    </a>
  </div>
</section>

<footer class="footer d-none d-sm-block">
  <div class="footer-top d-none d-sm-block">
    <div class="container">
      <div class="inner-content">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-12">
            <div class="footer-logo">
              <a href="{{baseurl}}">
                <img src="{{baseurl}}/assets/images/logo/logo.png" alt="Logo">
              </a>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-12">
            <div class="footer-newsletter">
              <h4 class="title"> Subscribe to our Newsletter <span>Get all the latest information, Sales and Offers.</span>
              </h4>
              <div class="newsletter-form-head">
                <form action="#" method="post" target="_blank" class="newsletter-form">
                  <input name="email" placeholder="Email address here..." type="email">
                  <div class="button">
                    <button class="btn">Subscribe <span class="dir-part"></span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-middle d-none d-sm-block">
    <div class="container">
      <div class="bottom-inner">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer f-contact">
              <h3>Get In Touch With Us</h3>
              <a href="tel://{{$contact[0]->phone}}">
                <p class="phone">Phone: {{$contact[0]->phone}}</p>
              </a>
              <ul>
                <li>
                  <span>Monday-Friday: </span> 9.00 am - 8.00 pm
                </li>
                <li>
                  <span>Saturday: </span> 10.00 am - 6.00 pm
                </li>
              </ul>
              <p class="mail">
                <a href="#">
                  <span class="__cf_email__">{{$contact[0]->email}}</span>
                </a>
              </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer our-app">
              <h3>Our Mobile App</h3>
              <ul class="app-btn">
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-apple"></i>
                    <span class="small-title">Download on the</span>
                    <span class="big-title">App Store</span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-play-store"></i>
                    <span class="small-title">Download on the</span>
                    <span class="big-title">Google Play</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer f-link">
              <h3>Information</h3>
              <ul>
                <@foreach($infoCats AS $item):@>
                  <li>
                    <a href="{{baseurl}}/info/{{$item->cat_id}}">{{$item->{cat_name} }}</a>
                  </li>
                  <@endforeach@>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer f-link">
              <h3>Shop Departments</h3>
              <ul>
                <@foreach ($catalog AS $item):@>
                  <li>
                    <a href="{{baseurl}}/shop/{{$item->cat_id}}">{{ $item->{cat_name} }}</a>
                  </li>
                  <@endforeach@>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom d-none d-sm-block">
    <div class="container">
      <div class="inner-content">
        <div class="row align-items-center">
          <div class="col-lg-4 col-12">
            <div class="payment-gateway">
              <span>We Accept:</span>
              <img src="{{baseurl}}/assets/images/footer/credit-cards-footer.png" alt="#">
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="copyright">
              <p>Designed and Developed by <a href="#" rel="nofollow" target="_blank">{{$copyright}}</a>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <ul class="socila">
              <li>
                <span>Follow Us On:</span>
              </li>
              <li>
                <a target="_blank" href="{{$contact[0]->fb}}">
                  <i class="lni lni-facebook-filled"></i>
                </a>
              </li>
              <li>
                <a target="_blank" href="{{$contact[0]->twitter}}">
                  <i class="lni lni-twitter-original"></i>
                </a>
              </li>
              <li>
                <a target="_blank" href="{{$contact[0]->instagram}}">
                  <i class="lni lni-instagram"></i>
                </a>
              </li>
              <li>
                <a target="_blank" href="{{$contact[0]->youtube}}">
                  <i class="lni lni-youtube"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="scroll-top d-none d-sm-block">
  <i class="lni lni-chevron-up" style="margin-left: 10px;"></i>
</a>




<nav class="navbar fixed-bottom navbar-expand-sm navbar-light bg-light d-xl-none d-lg-none d-flex justify-content-center" style="position: fixed!important; bottom:0!important; height:50px!important;">
  <div class="nav justify-content-center" id="navbarCollapse">

    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a href="{{baseurl}}"> <i class="fa-solid fa-house fa-2x fa-lg-5" style="color:darkgrey;"></i> </a>
      </li>
      <li class="nav-item">
        <a href="{{baseurl}}/wishlist"> <i class="fa-solid fa-heart fa-2x fa-lg-5" aria-hidden="true" style="color:darkgrey; margin-left:25px;"></i> </a>
      </li>
      <li class="nav-item">
        <a href="{{baseurl}}/orders"> <i class="fa-solid fa-box fa-2x fa-lg-5" style="color:darkgrey; margin-left:25px;"></i> </a>
      </li>
      <li class="nav-item">
        <a href="{{baseurl}}/cart"> <i class="fa-solid fa-cart-shopping fa-2x fa-lg-5" style="color:darkgrey; margin-left:25px;"></i> </a>
      </li>
    </ul>

  </div>

</nav>


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="main-menu-search" style="min-width:100%!important;">
              <div class="navbar-search search-style-4">
        
                <div class="search-input d-xl-none d-lg-none">
                  <input type="text" name="search" id="search" list="names" placeholder="{{search}}">
                  <datalist id="names">
                    <@foreach($searchData AS $item):@>
                      <option value="{{$item->{product_name} }}" data-id="{{$item->{product_name} }}" />
                    <@endforeach@>
                  </datalist>
                </div>           

              </div>
            </div>
      </div>



    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{baseurl}}/assets/js/tiny-slider.js"></script>
<script src="{{baseurl}}/assets/js/glightbox.min.js"></script>
<script src="{{baseurl}}/assets/js/main.js"></script>
<script src='https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js'></script>

<script src="https://kit.fontawesome.com/b11293661a.js" crossorigin="anonymous"></script>
<script>
  function is_valid_datalist_value(idDataList, inputValue) {
  var option = document.querySelector("#" + idDataList + " option[value='" + inputValue + "']");
  if (option != null) {
    return option.value.length > 0;
  }
  return false;
}


$(document).on('change', '#search', function(){
    let word = $("#search").val();
    window.location.href = "http://192.168.64.2/shop/1/x/x/x/x/x/" + word + "/";
});
</script>
<@if($controller=="main" ):@>
  <script type="text/javascript">
    //========= Hero Slider 
    tns({
      container: '.hero-slider',
      slideBy: 'page',
      autoplay: true,
      autoplayButtonOutput: false,
      mouseDrag: true,
      gutter: 0,
      items: 1,
      nav: false,
      controls: true,
      controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });
    //======== Brand Slider
    tns({
      container: '.brands-logo-carousel',
      autoplay: true,
      autoplayButtonOutput: false,
      mouseDrag: true,
      gutter: 15,
      nav: false,
      controls: false,
      responsive: {
        0: {
          items: 1,
        },
        540: {
          items: 3,
        },
        768: {
          items: 5,
        },
        992: {
          items: 6,
        }
      }
    });
  </script>
  <@endif@>
    <script type="text/javascript">
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
    </script>
    <script>
      $(document).ready(function() {
        $.get("{{baseurl}}/shopping_cart_ajax/", function(data, status) {
          //console.log("data : " + JSON.stringify(data));
          //console.log("Length : " + data.length);
          let i;
          var quantity = 0;
          let sum = 0;
          $("#cart_items").html("");
          //for(i = 0; i <= data.length -1 ; i++){
          $.each(data, function(key, value) {
            quantity += value.quantity;
            sum += parseFloat(value.product_price) * value.quantity;
            //console.log(value.product_price);
            //console.log("key : " + key);
            if (value.quantity > 0) {
              $("#cart_items").append(`<li>
                                <a onClick="removeCard(` + value.vriation_id + `);" class="remove" title="Remove this item">
                                    <i class="lni lni-close"></i>
                                </a>
                                <div class="cart-img-head">
                                    <a class="cart-img" href="{{baseurl}}/details/` + value.product_id + `">
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

          });
          if (quantity > 0) {
            $("#cart_count").text(quantity);
            $("#cart_count_in").text(quantity + " Items");
            $("#total_amount").text("₾ " + sum);
          }

        });

        $.get("{{baseurl}}/wishlist_ajax/", function(data, status) {
          console.log("data : " + JSON.stringify(data));
          console.log("Length : " + Object.keys(data).length);
          let quantity = Object.keys(data).length;
          if (quantity > 0) {
            $("#wishlist_count").text(quantity);
          }

        });
        //console.error(this.props.url, status, err.toString());
      });

      function removeCard(variationID) {
        console.log("{{baseurl}}/shopping_cart_ajax/3/" + variationID);
        $.get("{{baseurl}}/shopping_cart_ajax/3/" + variationID, function(data, status) {
          console.log(data);

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
                                    <a class="cart-img" href="{{baseurl}}/details/` + value.product_id + `">
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
      }

      $('#lang').change(function() {
        let lang = $("#lang").val();
        let url = "{{baseurl}}/lang_switcher/" + lang;
        window.location.href = url;
      });

      function search() {
        var word = $("#search").val();
        window.location.href = "http://192.168.64.2/shop/x/x/x/x/x/x/" + word + "/";
      }

      $("#search").keyup(function(event) {
        if (event.keyCode === 13) {
          var word = $("#search").val();
          window.location.href = "http://192.168.64.2/shop/x/x/x/x/x/x/" + word + "/";
        }
      });
    </script>


