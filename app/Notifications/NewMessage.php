<?php

namespace Inspirium\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Inspirium\Models\Messaging\Message;

class NewMessage extends Notification
{
    use Queueable;

    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $notifications = $notifiable->notification_settings;
        $out = ['database', 'broadcast'];
        if ( $notifications === 1 || (isset($notifications['new_message']) && $notifications['new_message'])) {
            $out[] = 'mail';
        }
        return $out;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $values = $this->toArray($notifiable);
        return (new MailMessage)
            ->line($values['title'])
            ->line($values['message'])
            ->action('View', url($values['link']));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    	$link = '/messages/';
    	if ($this->message->thread->connection) {
		    $link = $this->message->thread->connection->link;
	    }
        return [
	        'title' => __('New Message'),
	        'message' => __(':sender has sent a message to :thread', ['sender' => $this->message->sender->name, 'thread' => $this->message->thread->title]),
	        'link' => $link,
	        'tasktype' => [ 'title' => __('message'), 'className' => 'tasktype-4'],
	        'sender' => [
		        'name' => $this->message->sender->name,
		        'image' => $this->message->sender->image,
		        'link' => $this->message->sender->link
	        ]
        ];
    }

    public function toBroadcast($notifiable) {
	    return new BroadcastMessage([ 'data' => $this->toArray($notifiable)]);
    }
}
