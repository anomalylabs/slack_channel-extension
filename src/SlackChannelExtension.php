<?php namespace Anomaly\SlackChannelExtension;

use Anomaly\NotificationsModule\Channel\ChannelExtension;
use Anomaly\SlackChannelExtension\Command\GetChannel;
use Anomaly\SlackChannelExtension\Command\GetSender;
use Anomaly\SlackChannelExtension\Command\GetWebhookUrl;
use Illuminate\Notifications\Messages\SlackMessage;

/**
 * Class SlackChannelExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SlackChannelExtension extends ChannelExtension
{

    /**
     * This extension provides the slack
     * channel for the notifications module.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.notifications::channel.slack';

    /**
     * The channel driver.
     *
     * @var string
     */
    protected $driver = 'slack';

    /**
     * Return the notification
     * route information.
     *
     * @return string
     */
    public function route()
    {
        return $this->dispatch(new GetWebhookUrl($this));
    }

    /**
     * Format the notification.
     *
     * @param $notification
     * @return $this|mixed
     */
    public function format($notification)
    {
        /* @var SlackMessage $notification */
        return $notification
            ->from($this->dispatch(new GetSender($this)))
            ->to($this->dispatch(new GetChannel($this)));
    }
}
