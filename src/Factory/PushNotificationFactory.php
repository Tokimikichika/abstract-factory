<?php

namespace Tokimikichika\AbstractFactory\Factory;

use Tokimikichika\AbstractFactory\Component\Push\PushDelivery;
use Tokimikichika\AbstractFactory\Component\Push\PushMessage;
use Tokimikichika\AbstractFactory\Component\Push\PushSender;
use Tokimikichika\AbstractFactory\Interface\DeliveryInterface;
use Tokimikichika\AbstractFactory\Interface\MessageInterface;
use Tokimikichika\AbstractFactory\Interface\NotificationFactoryInterface;
use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * Фабрика для создания Push уведомлений
 */
class PushNotificationFactory implements NotificationFactoryInterface
{
    /**
     * Создать сообщение
     * @return MessageInterface Сообщение
     */
    public function createMessage(): MessageInterface
    {
        return new PushMessage();
    }

    /**
     * Создать отправителя
     * @return SenderInterface Отправитель
     */
    public function createSender(): SenderInterface
    {
        return new PushSender();
    }

    /**
     * Создать систему доставки
     * @return DeliveryInterface Система доставки
     */
    public function createDelivery(): DeliveryInterface
    {
        return new PushDelivery();
    }

    /**
     * Получить название канала уведомлений
     * @return string Название канала
     */
    public function getChannelName(): string
    {
        return 'Push';
    }
}
