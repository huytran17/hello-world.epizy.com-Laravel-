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
		'uses' => 'HomeController@dashboard'
	]);

	Route::get('change-email', [
		'as' => 'auth.changeEmail',
		'uses' => 'UserController@changeEmail'
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

		Route::post('updateAvatar', [
			'as' => 'admin.user.updateAvatar',
			'uses' => 'UserController@updateAvatar',
		]);

		Route::post('updateEmail', [
			'as' => 'admin.user.updateEmail',
			'uses' => 'UserController@updateEmail',
		]);

		Route::post('updateName', [
			'as' => 'admin.user.updateName',
			'uses' => 'UserController@updateName',
		]);

		Route::post('updatePwd', [
			'as' => 'admin.user.updatePwd',
			'uses' => 'UserController@updatePassword',
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

	Route::group(['prefix' => 'comment'], function() {
		Route::post('destroy', [
			'as' => 'admin.comment.destroy',
			'uses' => 'CommentController@destroy'
		]);
	});

});