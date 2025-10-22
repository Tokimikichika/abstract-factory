<?php

namespace Tokimikichika\AbstractFactory\Exception;

/**
 * Исключение, возникающее при ошибке отправки уведомления
 */
class NotificationSendException extends NotificationException
{
    public function __construct(string $channel, string $reason = '')
    {
        $message = sprintf(
            'Ошибка отправки уведомления через канал "%s"',
            $channel
        );

        if (! empty($reason)) {
            $message .= sprintf(': %s', $reason);
        }

        parent::__construct($message, 500);
    }
}
