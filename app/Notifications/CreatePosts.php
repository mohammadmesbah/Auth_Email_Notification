<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePosts extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $post_id;
    private $created_by;
    private $title;
    public function __construct($post_id,$created_by,$title)
    {
        $this->post_id= $post_id;
        $this->created_by= $created_by;
        $this->title= $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    /* public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    } */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_id'=>$this->post_id,
            'created_by'=>$this->created_by,
            'title'=>$this->title
        ];
    }
}
