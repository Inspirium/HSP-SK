<?php

namespace Inspirium\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Inspirium\Models\Messaging\Thread;

class NewThread extends Notification
{
    use Queueable;

    private $thread;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
	        'title' => __('New Thread'),
	        'message' => __('New Thread has been created: :name', ['name' => $this->thread->title]),
	        'link' => '/messages/',
	        'tasktype' => [ 'title' => __('thread'), 'className' => 'tasktype-4'],
	        'sender' => [
		        'name' => '',
		        'image' => '',
		        'link' => ''
	        ]
        ];
    }
}
