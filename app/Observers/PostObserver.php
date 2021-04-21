<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use Mail;
use App\Mail\NewPostEmail;

class PostObserver
{
    protected $_post, $_user;

    public function __construct(User $user, Post $post)
    {
        $this->_post = $post;

        $this->_user = $user;
    }
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $users_subed = $this->_user->subedUser()->get()->pluck('email');

        if ($users_subed->count() > 0) {
            $link = route('client.post.show', ['pid' => $post->id, 'cate_slug' => $post->category->slug, 'post_slug' => $post->slug]);

            Mail::to($users_subed->first())->bcc($users_subed)->send(new NewPostEmail($link));
        }
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
