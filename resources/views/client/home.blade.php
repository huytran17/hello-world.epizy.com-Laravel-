<x-client.home>
    <x-slot name="title">
        Trang chủ
    </x-slot>
    <x-slot name="content">
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
                <div class="container px-0">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <div class="carousel-blog owl-carousel">
                                    <div class="item">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[0]->id, 'cate_slug' => $posts[0]->category->slug, 'post_slug' => $posts[0]->slug]) }}" class="img" style="background-image: url({{ $posts[0]->thumbnail_photo_path }});"></a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[0]->id, 'cate_slug' => $posts[0]->category->slug, 'post_slug' => $posts[0]->slug]) }}" class="img" style="background-image: url({{ $posts[0]->thumbnail_photo_path }});"></a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[0]->id, 'cate_slug' => $posts[0]->category->slug, 'post_slug' => $posts[0]->slug]) }}" class="img" style="background-image: url({{ $posts[0]->thumbnail_photo_path }});"></a>
                                    </div>
                                </div>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[0]->id, 'cate_slug' => $posts[0]->category->slug, 'post_slug' => $posts[0]->slug]) }}">{{ $posts[0]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[0]->only_time_created }}</span>
                                            <span><a href="{{ route('client.cate.showPost', ['slug_parent' => $posts[0]->category->parent->slug, 'slug_child' => $posts[0]->category->slug]) }}"><i class="icon-folder-o mr-2"></i>{{ $posts[0]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[0]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[0]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[1]->id, 'cate_slug' => $posts[1]->category->slug, 'post_slug' => $posts[1]->slug]) }}" class="img img-2 d-flex align-items-center justify-content-center" style="background-image: url({{ $posts[1]->thumbnail_photo_path }});">
                                        </a>
                                        <div class="text text-2 p-4">
                                            <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[1]->id, 'cate_slug' => $posts[1]->category->slug, 'post_slug' => $posts[1]->slug]) }}">{{ $posts[1]->title }}</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[1]->only_time_created }}</span>
                                                    <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[1]->category->title }}</a></span>
                                                    <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[1]->comments_count }} bình luận</span>
                                                </p>
                                            </div>
                                            <p class="mb-4 text-collapse">{{ $posts[1]->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[2]->id, 'cate_slug' => $posts[2]->category->slug, 'post_slug' => $posts[2]->slug]) }}" class="img img-2 order-md-last" style="background-image: url({{ $posts[2]->thumbnail_photo_path }});"></a>
                                        <div class="text text-2 text-md-right p-4">
                                            <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[2]->id, 'cate_slug' => $posts[2]->category->slug, 'post_slug' => $posts[2]->slug]) }}">{{ $posts[2]->title }}</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[2]->only_time_created }}</span>
                                                    <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[2]->category->title }}</a></span>
                                                    <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[2]->comments_count }} bình luận</span>
                                                </p>
                                            </div>
                                            <p class="mb-4 text-collapse">{{ $posts[2]->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[3]->id, 'cate_slug' => $posts[3]->category->slug, 'post_slug' => $posts[3]->slug]) }}" class="img" style="background-image: url({{ $posts[3]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[3]->id, 'cate_slug' => $posts[3]->category->slug, 'post_slug' => $posts[3]->slug]) }}">{{ $posts[3]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[3]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[3]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[3]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[3]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[4]->id, 'cate_slug' => $posts[4]->category->slug, 'post_slug' => $posts[4]->slug]) }}" class="img" style="background-image: url({{ $posts[4]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[4]->id, 'cate_slug' => $posts[4]->category->slug, 'post_slug' => $posts[4]->slug]) }}">{{ $posts[4]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[4]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[4]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[4]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[4]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[5]->id, 'cate_slug' => $posts[5]->category->slug, 'post_slug' => $posts[5]->slug]) }}" class="img" style="background-image: url({{ $posts[5]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[5]->id, 'cate_slug' => $posts[5]->category->slug, 'post_slug' => $posts[5]->slug]) }}">{{ $posts[5]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[5]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[5]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[5]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[5]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[6]->id, 'cate_slug' => $posts[6]->category->slug, 'post_slug' => $posts[6]->slug]) }}" class="img img-2" style="background-image: url({{ $posts[6]->thumbnail_photo_path }});"></a>
                                        <div class="text text-2 p-4">
                                            <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[6]->id, 'cate_slug' => $posts[6]->category->slug, 'post_slug' => $posts[6]->slug]) }}">{{ $posts[6]->title }}</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[6]->only_time_created }}</span>
                                                    <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[6]->category->title }}</a></span>
                                                    <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[6]->comments_count }} bình luận</span>
                                                </p>
                                            </div>
                                            <p class="mb-4 text-collapse">{{ $posts[6]->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="{{ route('client.post.show', ['pid' => $posts[7]->id, 'cate_slug' => $posts[7]->category->slug, 'post_slug' => $posts[7]->slug]) }}" class="img img-2 order-md-last" style="background-image: url({{ $posts[7]->thumbnail_photo_path }});"></a>
                                        <div class="text text-2 p-4 text-md-right">
                                            <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[7]->id, 'cate_slug' => $posts[7]->category->slug, 'post_slug' => $posts[7]->slug]) }}">{{ $posts[7]->title }}</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[7]->only_time_created }}</span>
                                                    <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[7]->category->title }}</a></span>
                                                    <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[7]->comments_count }} bình luận</span>
                                                </p>
                                            </div>
                                            <p class="mb-4 text-collapse">{{ $posts[7]->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[8]->id, 'cate_slug' => $posts[8]->category->slug, 'post_slug' => $posts[8]->slug]) }}" class="img" style="background-image: url({{ $posts[8]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[8]->id, 'cate_slug' => $posts[8]->category->slug, 'post_slug' => $posts[8]->slug]) }}">{{ $posts[8]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[8]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[8]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[8]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[8]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[9]->id, 'cate_slug' => $posts[9]->category->slug, 'post_slug' => $posts[9]->slug]) }}" class="img" style="background-image: url({{ $posts[9]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[9]->id, 'cate_slug' => $posts[9]->category->slug, 'post_slug' => $posts[9]->slug]) }}">{{ $posts[9]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[9]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[9]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[9]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[9]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate d-flex flex-column-reverse">
                                <a href="{{ route('client.post.show', ['pid' => $posts[10]->id, 'cate_slug' => $posts[10]->category->slug, 'post_slug' => $posts[10]->slug]) }}" class="img" style="background-image: url({{ $posts[10]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[10]->id, 'cate_slug' => $posts[10]->category->slug, 'post_slug' => $posts[10]->slug]) }}">{{ $posts[10]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[10]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[10]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[10]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[10]->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="{{ route('client.post.show', ['pid' => $posts[11]->id, 'cate_slug' => $posts[11]->category->slug, 'post_slug' => $posts[11]->slug]) }}" class="img" style="background-image: url({{ $posts[11]->thumbnail_photo_path }});"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="{{ route('client.post.show', ['pid' => $posts[11]->id, 'cate_slug' => $posts[11]->category->slug, 'post_slug' => $posts[11]->slug]) }}">{{ $posts[11]->title }}</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="fal fa-calendar-alt mr-2"></i>{{ $posts[11]->only_time_created }}</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $posts[11]->category->title }}</a></span>
                                            <span><i class="fal fa-folder-tree mr-2"></i>{{ $posts[11]->comments_count }} bình luận</span>
                                        </p>
                                    </div>
                                    <p class="mb-4 text-collapse">{{ $posts[11]->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- END COLORLIB-MAIN -->
    </x-slot>
</x-client.home>
