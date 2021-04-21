<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
	return view('client.home');
})->name('home');

Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers\auth', 'middleware' => 'guest'], function() {
	Route::get('login', function() {
		return view('auth.login');
	})->name('login');

	Route::post('login', [
		'as' => 'login',
		'uses' => 'LoginController@login'
	]);

	Route::get('register', function() {
		return view('auth.register');
	})->name('register');

	Route::post('register', [
		'as' => 'register',
		'uses' => 'RegisterController@register'
	]);

	Route::group(['prefix' => 'password'], function() {
		Route::get('forgot', [
			'as' => 'pwd.forgot',
			'uses' => 'PasswordController@forgotPassword'
		]);

		Route::get('reset-form/{token}', [
			'as' => 'pwd.resetform',
			'uses' => 'PasswordController@resetPasswordForm'
		]);

		Route::post('reset/{token}', [
			'as' => 'pwd.reset',
			'uses' => 'PasswordController@resetPassword'
		]);

		Route::post('email', [
			'as' => 'vrf.email',
			'uses' => 'VerifyController@passwordEmail'
		]);

		Route::post('resend-mail', [
			'as' => 'vrf.resend',
			'uses' => 'VerifyController@resendResetPasswordEmail'
		]);
	});
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function() {
	Route::post('logout', function() {
		auth()->logout();
		return redirect()->route('login');
	})->name('logout');
	
	Route::group(['prefix' => 'user'], function() {
		Route::get('profile', [
	    	'as' => 'client.user.profile',
	    	'uses' => 'UserController@show'
	    ]);
	});
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\admin', 'middleware' => 'auth'], function() {
	Route::get('', [
		'as' => 'admin.home',
		'uses' => 'HomeController@index',
		'middleware' => 'checkrole'
	]);

	Route::get('dashboard', [
		'as' => 'admin.view.dashboard',
		'uses' => 'HomeController@dashboard',
		'middleware' => 'can:user.viewAny'
	]);

	Route::get('verify-email', [
		'as' => 'auth.VerifyEmail',
		'uses' => 'UserController@VerifyEmail'
	]);

	Route::group(['prefix' => 'site'], function() {

		Route::get('edit', [
			'as' => 'admin.site.edit',
			'uses' => 'WebsiteController@edit',
		]);
		
		Route::post('update', [
			'as' => 'admin.site.update',
			'uses' => 'WebsiteController@update',
		]);

		Route::post('update-logo', [
			'as' => 'admin.site.updateLogo',
			'uses' => 'WebsiteController@updateLogo',
		]);

		Route::post('update-shortcut', [
			'as' => 'admin.site.updateShortcut',
			'uses' => 'WebsiteController@updateShortcut',
		]);

		Route::post('update-favicon', [
			'as' => 'admin.site.updateFavicon',
			'uses' => 'WebsiteController@updateFavicon',
		]);
	});

	Route::group(['prefix' => 'chat'], function() {
		Route::get('panel', [
			'as' => 'admin.chat.index',
			'uses' => 'MessageController@index',
			'middleware' => 'can:message.viewAny'
		]);

		Route::post('store', [
			'as' => 'admin.chat.store',
			'uses' => 'MessageController@store',
			'middleware' => 'can:message.viewAny'
		]);
	});

	Route::group(['prefix' => 'post'], function() {
		Route::get('', [
			'as' => 'admin.post.index',
			'uses' => 'PostController@index',
			'middleware' => 'can:post.viewAny'
		]);

		Route::get('edit', [
			'as' => 'admin.post.edit',
			'uses' => 'PostController@edit',
		]);

		Route::get('create', [
			'as' => 'admin.post.create',
			'uses' => 'PostController@create',
		]);

		Route::post('perform', [
			'as' => 'admin.post.perform',
			'uses' => 'PostController@perform',
			'middleware' => 'can:post.isAdministrator'
		]);

		Route::post('update', [
			'as' => 'admin.post.update',
			'uses' => 'PostController@update',
			'middleware' => 'can:post.isAdministrator'
		]);

		Route::post('update-thumbnail', [
			'as' => 'admin.post.updateThumbnail',
			'uses' => 'PostController@updateThumbnail',
			'middleware' => 'can:post.isAdministrator'
		]);

		Route::post('store', [
			'as' => 'admin.post.store',
			'uses' => 'PostController@store',
			'middleware' => 'can:post.create'
		]);
	});

	Route::group(['prefix' => 'user'], function() {
		Route::get('', [
			'as' => 'admin.user.index',
			'uses' => 'UserController@index',
			'middleware' => 'can:user.viewAny'
		]);

		Route::get('edit', [
			'as' => 'admin.user.edit',
			'uses' => 'UserController@edit',
		]);

		Route::get('create', [
			'as' => 'admin.user.create',
			'uses' => 'UserController@create',
			'middleware' => 'can:user.create'
		]);

		Route::get('show', [
			'as' => 'admin.user.show',
			'uses' => 'UserController@show',
			'middleware' => 'can:user.view'
		]);

		Route::post('store', [
			'as' => 'admin.user.store',
			'uses' => 'UserController@store',
			'middleware' => 'can:user.create'
		]);

		Route::post('perform', [
			'as' => 'admin.user.perform',
			'uses' => 'UserController@perform',
			'middleware' => 'can:user.superAdmin'
		]);
	});

	Route::group(['prefix' => 'category'], function() {
		Route::get('', [
			'as' => 'admin.cate.index',
			'uses' => 'CategoryController@index',
			'middleware' => 'can:category.viewAny'
		]);

		Route::get('show', [
			'as' => 'admin.cate.show',
			'uses' => 'CategoryController@show',
			'middleware' => 'can:category.view'
		]);

		Route::get('edit', [
			'as' => 'admin.cate.edit',
			'uses' => 'CategoryController@edit',
			'middleware' => 'can:category.update'
		]);

		Route::get('create', [
			'as' => 'admin.cate.create',
			'uses' => 'CategoryController@create',
			'middleware' => 'can:category.create'
		]);

		Route::post('store', [
			'as' => 'admin.cate.store',
			'uses' => 'CategoryController@store',
			'middleware' => 'can:category.create'
		]);

		Route::post('update-thumbnail', [
			'as' => 'admin.cate.updateThumbnail',
			'uses' => 'CategoryController@updateThumbnail',
			'middleware' => 'can:category.update'
		]);

		Route::post('get-child', [
			'as' => 'admin.cate.getChildCate',
			'uses' => 'CategoryController@getChildCate',
		]);

		Route::post('update', [
			'as' => 'admin.cate.update',
			'uses' => 'CategoryController@update',
			'middleware' => 'can:category.update'
		]);

		Route::post('perform', [
			'as' => 'admin.cate.perform',
			'uses' => 'CategoryController@perform',
			'middleware' => 'can:category.superAdmin'
		]);
	});

});

Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers'], function() {
	Route::get('change-email', [
		'as' => 'auth.changeEmail',
		'uses' => 'UserController@changeEmail'
	]);

	Route::get('newest-posts', [
		'as' => 'client.post.newestPosts',
		'uses' => 'PostController@newest'
	]);

	Route::get('forgot-password', [
		'as' => 'forgot-password',
		'uses' => 'auth\PasswordController@forgotPassword'
	]);

	Route::get('search-tag', [
		'as' => 'post.search.tag',
		'uses' => 'PostController@searchTag'
	]);

	Route::post('password-email', [
		'as' => 'password.email',
		'uses' => 'auth\PasswordController@passwordEmail'
	]);

	Route::get('password-reset-form/{token}', [
		'as' => 'password.resetform',
		'uses' => 'auth\PasswordController@resetPasswordForm'
	]);

	Route::get('destroy-avatar', [
	    'as' => 'client.user.delavt',
	   	'uses' => 'UserController@destroyAvatar'
    ]);

	Route::post('password-reset/{token}', [
		'as' => 'password.reset',
		'uses' => 'auth\PasswordController@resetPassword'
	]);

	Route::post('verification-resend-mail', [
		'as' => 'verification.resend',
		'uses' => 'auth\PasswordController@resendResetPasswordEmail'
	]);

	Route::get('about-us', function() {
		return view('client.about');
	})->name('client.about');

	Route::get('contact', function() {
		return view('client.contact');
	})->name('client.contact');

	Route::get('profile', function() {
		return view('client.user.profile');
	})->name('client.user.profile')->middleware('auth');
	
	Route::get('{pid}/{cate_slug}/{post_slug}.html', [
		'as' => 'client.post.show',
		'uses' => 'PostController@show'
	]);

	Route::get('{slug}', [
		'as' => 'client.cate.showChildren',
		'uses' => 'CategoryController@showChildren'
	]);

	Route::get('categories/browse', [
		'as' => 'client.cate.index',
		'uses' => 'CategoryController@index'
	]);

	Route::get('{slug_parent}/{slug_child}', [
		'as' => 'client.cate.showPost',
		'uses' => 'CategoryController@showPost'
	]);

	Route::post('subscribe', [
		'as' => 'client.user.subscribe',
		'uses' => 'UserController@subscribe'
	]);

	Route::post('store', [
		'as' => 'client.cmt.store',
		'uses' => 'CommentController@store'
	]);

	Route::post('reply', [
		'as' => 'client.cmt.reply',
		'uses' => 'CommentController@reply'
	]);

	Route::post('updateAvatar', [
		'as' => 'user.updateAvatar',
		'uses' => 'UserController@updateAvatar',
	]);
	
	Route::post('updateEmail', [
		'as' => 'user.updateEmail',
		'uses' => 'UserController@updateEmail',
	]);

	Route::post('updateName', [
		'as' => 'user.updateName',
		'uses' => 'UserController@updateName',
	]);

	Route::post('updatePwd', [
		'as' => 'user.updatePwd',
		'uses' => 'UserController@updatePassword',
	]);

	Route::post('password-email', [
		'as' => 'password.email',
		'uses' => 'auth\PasswordController@passwordEmail'
	]);

	Route::post('message-feedback', [
		'as' => 'message.feedback',
		'uses' => 'UserController@feedback'
	]);

	Route::post('search-post', [
		'as' => 'post.search',
		'uses' => 'PostController@search'
	]);

	Route::post('comment-reply', [
		'as' => 'client.cmt.reply',
		'uses' => 'CommentController@reply'
	]);
});