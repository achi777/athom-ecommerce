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
                        <a href="blog-single-sidebar.html">
                        <img src="{{baseurl}}/assets/images/blog/{{$item->photo}}" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">Gaming</a>
                        <h4>
                        <a href="blog-single-sidebar.html">{{$item->title_geo}}</a>
                        </h4>
                        <p>{{$item->description_geo}}</p>
                        <div class="button">
                        <a href="{{baseurl}}/info_details/{{$item->id}}" class="btn">Read More</a>
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
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="blog-single-sidebar.html">
                        <img src="{{baseurl}}/assets/images/blog/blog-sidebar-1.jpg" alt="#">
                      </a>
                      <h6 class="post-title">
                        <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                      </h6>
                      <span class="time">
                        <i class="lni lni-calendar"></i> 05th Nov 2023 </span>
                    </div>
                  </div>
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="blog-single-sidebar.html">
                        <img src="{{baseurl}}/assets/images/blog/blog-sidebar-2.jpg" alt="#">
                      </a>
                      <h6 class="post-title">
                        <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                      </h6>
                      <span class="time">
                        <i class="lni lni-calendar"></i> 24th March 2023 </span>
                    </div>
                  </div>
                  <div class="single-popular-feed">
                    <div class="feed-desc">
                      <a class="feed-img" href="blog-single-sidebar.html">
                        <img src="{{baseurl}}/assets/images/blog/blog-sidebar-3.jpg" alt="#">
                      </a>
                      <h6 class="post-title">
                        <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering </a>
                      </h6>
                      <span class="time">
                        <i class="lni lni-calendar"></i> 30th Jan 2023 </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget categories-widget">
                <h5 class="widget-title">Top Categories</h5>
                <ul class="custom">
                  <li>
                    <a href="javascript:void(0)">Editor's Choice</a>
                    <span>(24)</span>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Electronics</a>
                    <span>(12)</span>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Industrial Design</a>
                    <span>(5)</span>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Secure Payments Online</a>
                    <span>(15)</span>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Online Shopping</a>
                    <span>(7)</span>
                  </li>
                </ul>
              </div>
              <div class="widget popular-tag-widget">
                <h5 class="widget-title">Popular Tags</h5>
                <div class="tags">
                  <a href="javascript:void(0)">#electronics</a>
                  <a href="javascript:void(0)">#cpu</a>
                  <a href="javascript:void(0)">#gadgets</a>
                  <a href="javascript:void(0)">#wearables</a>
                  <a href="javascript:void(0)">#smartphones</a>
                </div>
              </div>
            </div>
          </aside>

            <!-- /side panel-->
            

        </div>
    <!-- /container -->

        </div>
      </div>
    </section>
