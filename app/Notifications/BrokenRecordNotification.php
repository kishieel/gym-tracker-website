<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class BrokenRecordNotification extends Notification
{
    use Queueable;

    /** @var string */
    private string $exercise;

    /** @var string */
    private string $champion;

    /** @var string */
    private string $record;

    /** @var string */
    private string $url;

    public function __construct(string $exercise, string $champion, string $record, $url = null)
    {
        $this->exercise = $exercise;
        $this->champion = $champion;
        $this->record = $record;
        $this->url = $url ?? config('app.url');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    /**
     * @param mixed $notifiable
     * @return \NotificationChannels\WebPush\WebPushMessage
     */
    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage())
            ->icon('/static/logo.png')
            ->data(['url' => $this->url])
            ->title(trans('Your record has been broken!'))
            ->body(trans('Your record at :exercise has been broken by :user, who set a new personal record of :record.', [
                'exercise' => $this->exercise,
                'user' => $this->champion,
                'record' => $this->record,
            ]));
    }
}
