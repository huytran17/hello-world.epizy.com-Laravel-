<div class="card user-show">
    <div class="card-body">
        <div class="card-img">
            <img src="{{ $user->profile_photo_path }}" alt="{{ $user->slug }}">
        </div>
        <h5 class="card-title panel-title">Thông tin người dùng</h5>
        <div class="card-text info">
            <p class="name">Tên tài khoản: {{ $user->name }}</p>
            <p class="email">Email: {{ $user->email }}</p>
            <p class="created_at">Ngày tham gia: {{ $user->dmy_created }}</p>
            <p class="role">Vai trò: {{ $user->isSuperAdmin() ? 'Super Admin' : ($user->isLowerAdmin() ? 'Vice Admin' : 'Client') }}</p>
        </div>
    </div>
</div>
