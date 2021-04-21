<div id="dashboard" class="container-fluid tab-pane" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="row d-flex flex-column flex-lg-row justify-content-between mb-3 d-users">
        <section class="chart user-chart col-12 col-xl-6 row p-0">
            <canvas id="userChart" height="100" width="100"></canvas>
        </section>
        <section class="stat col-12 col-xl-6 row p-0">
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-users"></i></p>
                <p><strong>{{ $users->count() }}</strong></p>
                <h5>{{ __('Tổng số người dùng') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-user-lock"></i></p>
                <p><strong>{{ $users->whereNotNull('deleted_at')->count() }}</strong></p>
                <h5>{{ __('Người dùng bị khóa') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-bells"></i></p>
                <p><strong>{{ $users->whereNotNull('email_subscribed_at')->count() }}</strong></p>
                <h5>{{ __('Đã đăng ký') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-at"></i></p>
                <p><strong>{{ $users->whereNotNull('email_verified_at')->count() }}</strong></p>
                <h5>{{ __('Đã xác thực') }}</h5>
            </div>
        </section>
    </div>
    <div class="row d-flex flex-column flex-lg-row justify-content-between d-posts">
        <section class="chart post-chart col-12 col-xl-6 row p-0">
            <canvas id="postChart" height="100" width="100"></canvas>
        </section>
        <section class="stat col-12 col-xl-6 row p-0">
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-books"></i></span></p>
                <p><strong>{{ $posts->count() }}</strong></p>
                <h5>{{ __('Tổng số bài viết') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-align-slash"></i></p>
                <p><strong>{{ $posts->whereNotNull('deleted_at')->count() }}</strong></p>
                <h5>{{ __('Bài viết đã ẩn') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-chart-line"></i></p>
                <p><strong>~ {{ round($new_post_in_month->values()->avg(), 0, PHP_ROUND_HALF_EVEN) }}</strong></p>
                <h5>{{ __('Trung bình hàng tháng') }}</h5>
            </div>
            <div class="stat-item col-12 col-sm-6 text-center d-flex flex-column justify-content-center">
                <p><i class="fal fa-chart-bar"></i></p>
                <p><strong>{{ $inCurrentMonthCount }}</strong></p>
                <h5>{{ __('Trong tháng hiện tại') }}</h5>
            </div>
        </section>
    </div>
    <div class="p-0 d-top-posts">
        <section class="row p-0">
            <h4 class="mx-auto table-title">{{ __('Bài viết mới nhất') }}</h4>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Danh mục</th>
                            <th>Từ khóa</th>
                            <th>Nguồn</th>
                            <th>Ngày tạo</th>
                            <th>Cập nhật</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts->sortByDesc('created_at')->take(5) as $p)
                        <tr class="text-center">
                            <td>{{ $p->id }}</td>
                            <td>
                                @can('post.update', $p)
                                    <a href="{{ route('admin.post.edit', ['id' => $p->id]) }}">{{ $p->title }}</a>
                                @else
                                    {{ $p->title }}
                                @endcan
                            </td>
                            <td>
                                @can('user.update', $p->user)
                                    <a href="{{ route('admin.user.edit', ['id' => $p->user->id]) }}">{{ $p->user->name }}</a>
                                @else
                                    {{ $p->title }}
                                @endcan
                            </td>
                            <td><a href="{{ route('admin.cate.show', ['id' => $p->category->id]) }}">{{ $p->category->title }}</a></td>
                            <td>{{ implode(',', $p->meta_data->keywords) }}</td>
                            <td>{{ $p->meta_data->source }}</td>
                            <td>{{ $p->dmy_created_at }}</td>
                            <td>{{ $p->dmy_updated_at }}</td>
                            <td>
                                <x-badge class="{{ $p->isDeleted ? 'success' : 'danger' }}">
                                    {{ $p->isDeleted ? __('Hiện') : __('Khóa') }}
                                </x-badge>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        Chart.defaults.scale.ticks.beginAtZero = true;

        new Chart(document.getElementById('userChart').getContext('2d'), {
            type: 'bar',

            data: {
                labels: {!! $new_user_in_month->keys() !!},
                datasets: [{
                    label: 'Thành viên mới',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderWidth: 0,
                    fillColor: "rgb(255, 99, 2)",
                    strokeColor: "rgb(255, 99, 132)",
                    barPercentage: .6,
                    data: {!! $new_user_in_month->values() !!}
                }]
            },

            options: {}
        });

        new Chart(document.getElementById('postChart').getContext('2d'), {
            type: 'line',

            data: {
                labels: {!! $new_post_in_month->keys() !!},
                datasets: [{
                    label: 'Bài viết mới',
                    backgroundColor: 'transparent',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    pointHoverBackgroundColor: 'rgb(0, 232, 150)',
                    pointBorderColor: 'rgb(0, 232, 150)',
                    data: {!! $new_post_in_month->values() !!}
                }]
            },

            options: {}
        });
    </script>
@endsection