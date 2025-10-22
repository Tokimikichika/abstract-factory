<?php

namespace Tokimikichika\AbstractFactory\Exception;

/**
 * Исключение, возникающее когда фабрика не найдена
 */
class FactoryNotFoundException extends NotificationException
{
    public function __construct(string $channel)
    {
        $message = sprintf(
            'Фабрика для канала "%s" не найдена. Доступные каналы: %s',
            $channel,
            implode(', ', ['email', 'sms', 'push'])
        );

        parent::__construct($message, 404);
    }
}
