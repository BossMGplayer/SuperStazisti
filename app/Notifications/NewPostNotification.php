<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\JobPost;

class NewPostNotification extends Notification
{
    use Queueable;

    protected $jobPost;
    protected $sender;
    protected $follower;

    protected $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($jobPost, $sender, $follower, $type)
    {
        $this->jobPost = $jobPost;
        $this->sender = $sender;
        $this->follower = $follower;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'jobPost' => $this->jobPost,
            'sender' => $this->sender,
            'follower' => $this->follower,
            'type' => $this->type,
            'message' => $this->sender->profile->first_name . " " . $this->sender->profile->last_name . " has created a new job " . $this->type . ". Check it out."
        ];
    }
}
