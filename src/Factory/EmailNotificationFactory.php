<?php

namespace Tokimikichika\AbstractFactory\Factory;

use Tokimikichika\AbstractFactory\Component\Email\EmailDelivery;
use Tokimikichika\AbstractFactory\Component\Email\EmailMessage;
use Tokimikichika\AbstractFactory\Component\Email\EmailSender;
use Tokimikichika\AbstractFactory\Interface\DeliveryInterface;
use Tokimikichika\AbstractFactory\Interface\MessageInterface;
use Tokimikichika\AbstractFactory\Interface\NotificationFactoryInterface;
use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * Фабрика для создания Email уведомлений
 */
class EmailNotificationFactory implements NotificationFactoryInterface
{
    /**
     * Создать сообщение
     * @return MessageInterface Сообщение
     */
    public function createMessage(): MessageInterface
    {
        return new EmailMessage();
    }

    /**
     * Создать отправителя
     * @return SenderInterface Отправитель
     */
    public function createSender(): SenderInterface
    {
        return new EmailSender();
    }

    /**
     * Создать систему доставки
     * @return DeliveryInterface Система доставки
     */
    public function createDelivery(): DeliveryInterface
    {
        return new EmailDelivery();
    }

    /**
     * Получить название канала уведомлений
     * @return string Название канала
     */
    public function getChannelName(): string
    {
        return 'Email';
    }
}
