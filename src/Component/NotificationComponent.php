<?php

namespace Tokimikichika\AbstractFactory\Component;

use Tokimikichika\AbstractFactory\Interface\NotificationComponentInterface;

/**
 * Компонент уведомления
 */
class NotificationComponent implements NotificationComponentInterface
{
    private string $channel;
    private object $message;
    private object $sender;
    private object $delivery;

    public function __construct(string $channel, object $message, object $sender, object $delivery)
    {
        $this->channel = $channel;
        $this->message = $message;
        $this->sender = $sender;
        $this->delivery = $delivery;
    }

    /**
     * Получить канал уведомления
     * @return string Название канала
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * Получить объект сообщения
     * @return object Объект сообщения
     */
    public function getMessage(): object
    {
        return $this->message;
    }

    /**
     * Получить объект отправителя
     * @return object Объект отправителя
     */
    public function getSender(): object
    {
        return $this->sender;
    }

    /**
     * Получить объект доставки
     * @return object Объект доставки
     */
    public function getDelivery(): object
    {
        return $this->delivery;
    }

    /**
     * Отправить уведомление
     * @return bool Результат отправки
     */
    public function send(): bool
    {
        return $this->message->send();
    }
}

