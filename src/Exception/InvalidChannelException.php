<?php

namespace Tokimikichika\AbstractFactory\Exception;

/**
 * Исключение, возникающее при неверном канале
 */
class InvalidChannelException extends NotificationException
{
    public function __construct(string $channel)
    {
        $message = sprintf(
            'Неверный канал "%s". Канал должен быть непустой строкой.',
            $channel
        );

        parent::__construct($message, 400);
    }
}
