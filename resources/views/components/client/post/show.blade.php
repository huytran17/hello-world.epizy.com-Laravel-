<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-8 px-md-5 py-5">
                    <div class="row">
                        <h1 class="mb-3">{{ $post->title }}</h1>
                        <p>{{ $post->description }}</p>
                        <p>
                            <img src="{{ $post->thumbnail_photo_path }}" alt="{{ $post->slug }}" class="img-fluid">
                        </p>
                        <p>{{ $post->content }}</p>
                        
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="tagcloud">
                                @foreach(explode(',', $post->meta_data->keywords) as $k)
                                <a href="#" class="tag-cloud-link">{{ $k }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="about-author d-flex p-4 bg-light">
                            <div class="bio mr-5">
                                <img src="{{ $post->user->profile_photo_path }}" alt="{{ $post->user->slug }}" class="img-fluid mb-4">
                            </div>
                            <div class="desc">
                                <h3>{{ $post->user->name }}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                                <p><small><i>Nguồn: {{ $post->meta_data->source }}</i></small></p>
                            </div>
                        </div>
                        <div class="pt-5 mt-5 w-100">
                            <h3 class="mb-5 font-weight-bold">{{ $post->comments_count }} Bình luận</h3>
                            <ul class="comment-list">
                                @foreach($post->comments as $c)
                                @if($c->isParent())
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="{{ $c->user->profile_photo_path }}" alt="{{ $c->user->slug }}">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $c->user->name }}</h3>
                                        <div class="meta">{{ $c->time_created }}</div>
                                        <p>{{ $c->content }}</p>
                                        <p><span class="reply" style="cursor: pointer;">Reply</span></p>
                                    </div>
                                    @if($c->has('children'))
                                    <ul class="children">
                                        @foreach($c->children as $ch)
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="{{ $ch->user->profile_photo_path }}" alt="{{ $ch->user->slug }}">
                                            </div>
                                            <div class="comment-body">
                                                <h3>{{ $ch->user->name }}</h3>
                                                <div class="meta">{{ $ch->time_created }}</div>
                                                <p>{{ $ch->content }}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <!-- END comment-list -->
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Để lại bình luận</h3>
                                <form action="{{ route('client.cmt.store', ['pid' => $post->id]) }}" method="post" class="p-3 p-md-4 bg-light">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="content">Bình luận <span class="text-danger">*</span></label>
                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Gửi" class="btn py-3 px-4 btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- END-->
                </div>
                <div class="col-lg-4 sidebar ftco-animate bg-light pt-5">
                    <div class="sidebar-box pt-md-4">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Chuyên mục</h3>
                        <ul class="categories">
                            @foreach($cates as $c)
                            <li><a href="{{ route('client.cate.showChildren', ['slug' => $c->slug, 'id' => $c->id]) }}">{{ $c->title }} <span>({{ $c->children_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Phổ biến</h3>
                        @foreach($popularPosts as $pp)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ $pp->thumbnail_photo_path }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="{{ route('client.post.show', ['cate_slug' => $pp->category->slug, 'pid' => $pp->id, 'post_slug' => $pp->slug]) }}">{{ $pp->title }}</a></h3>
                                <div class="meta">
                                    <div><span class="icon-calendar"></span> {{ $pp->time_created }}</div>
                                    <div><span class="icon-person"></span> {{ $pp->user->name }}</div>
                                    <div><span class="icon-chat"></span> {{ $pp->comments_count }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Tag Cloud</h3>
                        <ul class="tagcloud">
                            @foreach(explode(',', $post->meta_data->keywords) as $k)
                            <a href="#" class="tag-cloud-link">{{ $k }}</a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-box subs-wrap img px-4 py-5" style="background-image: url(images/bg_1.jpg);">
                        <div class="overlay"></div>
                        <h3 class="mb-4 sidebar-heading">Newsletter</h3>
                        <p class="mb-4">Xa xa cuối chân trời, phía sau những ngọn núi, đến những ngôi làng Viola</p>
                        <form action="{{ route('client.user.subscribe') }}" method="post" class="subscribe-form">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Địa chỉ Email" required="required">
                                <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
                            </div>
                            <div class="form-group">
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Châm ngôn</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
                    </div>
                </div><!-- END COL -->
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
