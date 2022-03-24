<!--conteiner-->
    <section class="section blog-section blog-list">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 col-12">
            <div class="row">
            <!-- Example row of columns -->
                <@foreach ($postList AS $item):@>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-blog">
                    <div class="blog-img">
                        <a href="{{baseurl}}/info_details/{{$item->id}}">
                        <img src="{{baseurl}}/assets/images/blog/{{$item->photo}}" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">{{$item->{cat_name} }}</a>
                        <h4>
                        <a href="{{baseurl}}/info_details/{{$item->id}}">{{$item->{title} }}</a>
                        </h4>
                        <p>{{$item->{description} }}</p>
                        <div class="button">
                        <a href="{{baseurl}}/info_details/{{$item->id}}" class="btn">{{fullView}}</a>
                        </div>
                    </div>
                    </div>
                </div>
                <@endforeach@>
            </div>

            <div class="pagination left blog-grid-page">
                {{$pagination}}
            </div>

          </div>

            <!--side panel-->

            <aside class="col-lg-4 col-md-12 col-12">
            <div class="sidebar blog-grid-page">
              <div class="widget search-widget">
                <h5 class="widget-title">Search This Site</h5>
                <form action="#">
                  <input type="text" placeholder="Search Here...">
                  <button type="submit">
                    <i class="lni lni-search-alt"></i>
                  </button>
                </form>
              </div>
              <div class="widget popular-feeds">
                <h5 class="widget-title">Featured Posts</h5>
                <div class="popular-feed-loop">
                  <@foreach($lastPosts AS $item):@>
                  <!--post-->
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="{{baseurl}}/info_details/{{$item->id}}">
                        <img src="{{baseurl}}/assets/images/blog/{{$item->photo}}" alt="#">
                      </a>
                      <h6 class="post-title">
                        <a>{{$item->{title} }}</a>
                      </h6>
                      <span class="time">
                        <i class="lni lni-calendar"></i> {{$item->post_date}} </span>
                    </div>
                  </div>
                  <!--/post-->
                  <@endforeach@>
                </div>
              </div>
              <div class="widget categories-widget">
                <h5 class="widget-title">Top Categories</h5>
                <ul class="custom">
                <@foreach($infoCats AS $item):@>
                  <li>
                    <a href="{{baseurl}}/info/{{$item->cat_id}}">{{$item->{cat_name} }}</a>
                  </li>
                <@endforeach@>
                  
                </ul>
              </div>
              
            </div>
          </aside>

            <!-- /side panel-->
            

        </div>
    <!-- /container -->

        </div>
      </div>
    </section>
