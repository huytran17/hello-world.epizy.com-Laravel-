<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Quote;
use App\Models\Comment;
use App\Models\Website;
use App\Models\Feedback;
use App\Policies\UserPolicy;
use App\Policies\PostPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\QuotePolicy;
use App\Policies\CommentPolicy;
use App\Policies\WebsitePolicy;
use App\Policies\MessagePolicy;
use App\Policies\FeedbackPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        Category::class => CategoryPolicy::class,
        Quote::class => QuotePolicy::class,
        Comment::class => CommentPolicy::class,
        Website::class => WebsitePolicy::class,
        Message::class => MessagePolicy::class,
        Feedback::class => FeedbackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //user
        Gate::resource('user', UserPolicy::class);
        Gate::define('superAdmin', 'UserPolicy@superAdmin');
        //post
        Gate::resource('post', PostPolicy::class);
        //category
        Gate::resource('category', CategoryPolicy::class);
        Gate::define('superAdmin', 'CategoryPolicy@superAdmin');
        //quote
        Gate::resource('quote', QuotePolicy::class);
        //comment
        Gate::resource('comment', CommentPolicy::class);
        //message
        Gate::resource('message', MessagePolicy::class);
        //website
        Gate::resource('website', WebsitePolicy::class);
        //feedback
        Gate::resource('feedback', FeedbackPolicy::class);
    }
}
