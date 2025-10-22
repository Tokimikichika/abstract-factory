<?php

namespace Tokimikichika\AbstractFactory\Exception;

/**
 * Базовое исключение для системы уведомлений
 */
class NotificationException extends \Exception
{
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
