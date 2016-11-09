<?php namespace Anomaly\SlackChannelExtension\Command;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\SlackChannelExtension\SlackChannelExtension;

/**
 * Class GetSender
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetSender
{

    /**
     * The channel instance.
     *
     * @var SlackChannelExtension
     */
    protected $channel;

    /**
     * Create a new GetWebhookUrl instance.
     *
     * @param SlackChannelExtension $channel
     */
    public function __construct(SlackChannelExtension $channel)
    {
        $this->channel = $channel;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationRepositoryInterface $configuration
     */
    public function handle(ConfigurationRepositoryInterface $configuration)
    {
        return $configuration->value(
            $this->channel->getNamespace('sender'),
            $this->channel->getSubscriptionId()
        );
    }
}
