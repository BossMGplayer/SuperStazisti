<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\JobPost;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $jobPost;
    public $user;
    public $follower;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobPost, $user, $follower)
    {
        $this->jobPost = $jobPost;
        $this->user = $user;
        $this->follower = $follower;

        $this->from($user->email);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-post')
            ->subject('New Job Post Created')
            ->with([
                'jobPost' => $this->jobPost,
                'user' => $this->user,
                'follower' => $this->follower,
            ]);
    }
}
