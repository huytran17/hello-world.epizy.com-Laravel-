<div class="container">
    <div class="cate-wrapper">
        <ul class="list list-cate">
            <li class="item cate-item">
                @can('category.update')
                <a href="{{ route('admin.cate.edit', ['id' => $cate->id]) }}">{{ $cate->title }}</a>
                @else
                {{ $cate->title }}
                @endcan
            </li>
            @foreach ($cate->children as $c)
            <li class="item cate-item">
                <ul class="list cate-children">
                    <li class="item cate-item">
                        @can('category.update')
                        <a href="{{ route('admin.cate.edit', ['id' => $c->id]) }}">{{ $c->title }}</a>
                        @else
                        {{ $c->title }}
                        @endcan
                        @if (!empty($c->posts))
                        <ul class="list list-post">
                            @foreach ($c->posts as $p)
                            <li>
                                @can('category.update')
                                <a href="{{ route('admin.post.edit', ['id' => $p->id]) }}">{{ $p->title }}</a>
                                @else
                                {{ $p->title }}
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
