<?php

namespace App\Observers;

use App\Events\PostAction;
use App\Jobs\SendPostEmail;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $subject = $post->title . ' - Post Created';

        $msg = "A new post has been created successfully.\n\n"
            . "Title: {$post->title}\n"
            . "Content: {$post->content}";

        event(new PostAction($post, $subject, $msg));
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
        $subject = $post->title . ' - Post Deleted';
        $msg = "A new post has been created successfully.\n\n"
            . "Title: {$post->title}\n"
            . "Content: {$post->content}\n";

        event(new PostAction($post, $subject, $msg));
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
