<?php

namespace Inspirium\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Inspirium\Models\WorkOrder;

class WorkOrderSignatureRequested extends Notification
{
    use Queueable;

    private $workOrder;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(WorkOrder $workOrder)
    {
        $this->workOrder = $workOrder;
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
        if ( $notifications === 1 || (isset($notifications['work_order_signature_requested']) && $notifications['work_order_signature_requested'])) {
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
        return [
            'title' => __('Novi zahtjev za potpisom na radnom nalogu'),
            'message' => __(':assigner je zatražio potpis na radnom nalogu :task', ['assigner' => $this->workOrder->assigner->name, 'task' => $this->workOrder->title]),
            'tasktype' => 'tasktype-3',
            'link' => '/tasks/'.$this->workOrder->id,
            'sender' => [
                'name' => $this->workOrder->assigner->name,
                'image' => $this->workOrder->assigner->image,
                'link' => $this->workOrder->assigner->link
            ]
        ];
    }

    public function toBroadcast($notifiable) {
    	return new BroadcastMessage([ 'data' => $this->toArray($notifiable)]);
    }
}
