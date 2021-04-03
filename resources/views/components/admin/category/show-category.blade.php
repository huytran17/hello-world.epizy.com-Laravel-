<div class="container">
    <div class="cate-wrapper">
        <ul class="list list-cate">
            <li class="item cate-item">
                <a href="{{ route('admin.cate.edit', ['id' => $cate->encrypted_id]) }}">{{ $cate->title }}</a>
            </li>
            @if (!empty($cate->children))
            @foreach ($cate->children as $c)
            	<li class="item cate-item">
	                <ul class="list cate-children">
	                    <li class="item cate-item">
	                        <a href="{{ route('admin.cate.edit', ['id' => $c->encrypted_id]) }}">{{ $c->title }}</a>
	                        @if (!empty($c->posts))
	                        <ul class="list list-post">
	                            @foreach ($c->posts as $p)
	                            <li>
	                                <a href="{{ route('admin.post.edit', ['id' => $p->encrypted_id]) }}">{{ $p->title }}</a>
	                            </li>
	                            @endforeach
	                        </ul>
	                        @endif
	                    </li>
	                </ul>
	            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>
