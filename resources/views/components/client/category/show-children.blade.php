<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-0">
            <div class="row no-gutters">
                @foreach($cate->childrenActive as $c)
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img js-fullheight" style="background-image: url({{ $c->thumbnail_photo_path }});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 p-4 ftco-animate">
                                <div class="heading">
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $c->only_time_created }}</span>
                                            <span><i class="icon-folder-o mr-2"></i>{{ $cate->title }}</span>
                                            <span><i class="fal fa-pen-alt mr-2"></i>{{ $c->posts_count }} bài viết</span>
                                        </p>
                                    </div>
                                    <h2 class="mb-5"><a href="{{ route('client.cate.showPost', ['slug_parent' => $cate->slug, 'slug_child' => $c->slug]) }}">{{ $c->title }}</a></h2>
                                </div>
                                <p>{{ $c->description }}</p>
                                <div class="icon d-flex align-items-center my-5">
                                    <div class="img" style="background-image: url({{ $c->user->profile_photo_path }});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">{{ $c->user->name }}</h4>
                                        <span>admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
