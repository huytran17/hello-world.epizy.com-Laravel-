<div class="container">
    <div class="cate-wrapper">
        <ul class="list list-cate">
            <li class="item cate-item">
                @can('category.update')
                <a href="{{ route('admin.cate.edit', ['id' => $cate->id]) }}"><i class="fal fa-folder-open"></i> {{ $cate->title }}</a>
                @else
                <i class="fal fa-folder-open"></i> {{ $cate->title }}
                @endcan
            </li>
            @foreach ($cate->children as $c)
            <li class="item cate-item">
                <ul class="list cate-children">
                    <li class="item cate-item">
                        @can('category.update')
                        <a href="{{ route('admin.cate.edit', ['id' => $c->id]) }}"><i class="fal fa-folder"></i> {{ $c->title }}</a>
                        @else
                        <i class="fal fa-folder"></i> {{ $c->title }}
                        @endcan
                        @if (!empty($c->posts))
                        <ul class="list list-post">
                            @foreach ($c->posts as $p)
                            <li class="post-item">
                                @can('category.update')
                                <a href="{{ route('admin.post.edit', ['id' => $p->id]) }}"><i class="fal fa-sticky-note"></i> {{ $p->title }}</a>
                                @else
                                <i class="fal fa-sticky-note"></i> {{ $p->title }}
                                @endcan
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                </ul>
            </li>
            @endforeach
            {{-- @if (!empty($cate->posts))
            <li class="item cate-item">
                <ul class="list list-post">
                    @foreach ($cate->posts as $p)
                    <li>
                        <a href="{{ route('admin.post.edit', ['id' => $p->id]) }}">{{ $p->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif --}}
        </ul>
    </div>
</div>
