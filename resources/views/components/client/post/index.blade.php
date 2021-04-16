<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
        <div class="container px-0">
            <div class="row no-gutters">
            	@foreach($posts as $p)
            	<div class="col-md-4 d-flex">
                    <div class="blog-entry ftco-animate">
                        <div class="carousel-blog owl-carousel">
                            <div class="item">
                                <a href="{{ route('client.post.show', ['cate_slug' => $p->category->slug, 'pid' => $p->id, 'post_slug' => $p->slug]) }}" class="img" style="background-image: url({{ $p->thumbnail_photo_path }});"></a>
                            </div>
                        </div>
                        <div class="text p-4">
                            <h3 class="mb-2"><a href="{{ route('client.post.show', ['cate_slug' => $p->category->slug, 'pid' => $p->id, 'post_slug' => $p->slug]) }}">{{ $p->title }}</a></h3>
                            <div class="meta-wrap">
                                <p class="meta">
                                    <span><i class="fal fa-calendar-alt mr-2"></i>{{ $p->only_time_created }}</span>
                                    <span><i class="icon-folder-o mr-2"></i>{{ $p->category->title }}</span>
                                    <span><i class="fal fa-comments mr-2"></i>{{ $p->comments_count }} bình luận</span>
                                </p>
                            </div>
                            <p class="mb-4">{{ $p->description }}</p>
                        </div>
                    </div>
                </div>
            	@endforeach
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
