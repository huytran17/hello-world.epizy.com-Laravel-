<div class="card bg-light">
  <img src="{{ $user->profile_photo_path }}" alt="{{ $user->slug }}" width="80" height="80">
  <div class="card-body">
    <h5 class="card-title">Thông tin người dùng</h5>
    <p class="card-text info">
    	<p class="name">Tên tài khoản: {{ $user->name }}</p>
    	<p class="email">Email: {{ $user->email }}</p>
    	<p class="created_at">Ngày tham gia: {{ $user->dmy_created }}</p>
    	<p class="role">Vai trò: {{ $user->isSuperAdmin() ? 'Super Admin' : ($user->isLowerAdmin() ? 'Vice Admin' : 'Client') }}</p>
    </p>
  </div>
</div>