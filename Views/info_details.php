<style>
    .img-right { float: right; }

@media only screen and (max-width: 640px) {

.img-right { float: none; width: 100%; }

}
</style>
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">

                            <div class="meta-information">
                                <h2 class="post-title">
                                    <a>{{$details[0]->{title} }}</a>
                                </h2>
                            </div>
                            <div class="detail-inner">
                                <p>
                                <img src="{{baseurl}}/assets/images/blog/{{$details[0]->photo}}" alt="{{$details[0]->{title} }}">    
                                <ul class="meta-info">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-calendar"></i> {{$details[0]->post_date}} </a>
                                    </li>
                                </ul>
                                {{$details[0]->{details} }}</p>

                                <div class="post-bottom-area">
                                    <div class="post-social-media">
                                        <h5 class="share-title">Share post :</h5>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-facebook-filled"></i>
                                                    <span>facebook</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-twitter-original"></i>
                                                    <span>twitter</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-google"></i>
                                                    <span>google+</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-linkedin-original"></i>
                                                    <span>linkedin</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-pinterest"></i>
                                                    <span>pinterest</span>
                                                </a>
                                            </li>
                                        </ul>
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