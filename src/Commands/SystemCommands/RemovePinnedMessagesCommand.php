<?php

namespace Webmasterskaya\TelegramBotCommands\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class RemovePinnedMessagesCommand extends SystemCommand
{
	/**
	 * @var string
	 */
	protected $name = 'removepinnedmessages';

	/**
	 * @var string
	 */
	protected $description = 'Handles and remove all pinned messages';

	/**
	 * @var string
	 */
	protected $version = '1.0.0';

	public function execute(): ServerResponse
	{
		$message = $this->getMessage();

		if (!!$message->getPinnedMessage())
		{
			return Request::deleteMessage([
				'chat_id'    => $message->getChat()->getId(),
				'message_id' => $message->getMessageId()
			]);
		}

		return Request::emptyResponse();
	}
}