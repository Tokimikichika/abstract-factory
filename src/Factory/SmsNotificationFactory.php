<?php

namespace Tokimikichika\AbstractFactory\Factory;

use Tokimikichika\AbstractFactory\Component\Sms\SmsDelivery;
use Tokimikichika\AbstractFactory\Component\Sms\SmsMessage;
use Tokimikichika\AbstractFactory\Component\Sms\SmsSender;
use Tokimikichika\AbstractFactory\Interface\DeliveryInterface;
use Tokimikichika\AbstractFactory\Interface\MessageInterface;
use Tokimikichika\AbstractFactory\Interface\NotificationFactoryInterface;
use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * Фабрика для создания SMS уведомлений
 */
class SmsNotificationFactory implements NotificationFactoryInterface
{
    /**
     * Создать сообщение
     * @return MessageInterface Сообщение
     */
    public function createMessage(): MessageInterface
    {
        return new SmsMessage();
    }

    /**
     * Создать отправителя
     * @return SenderInterface Отправитель
     */
    public function createSender(): SenderInterface
    {
        return new SmsSender();
    }

    /**
     * Создать систему доставки
     * @return DeliveryInterface Система доставки
     */
    public function createDelivery(): DeliveryInterface
    {
        return new SmsDelivery();
    }

    /**
     * Получить название канала уведомлений
     * @return string Название канала
     */
    public function getChannelName(): string
    {
        return 'SMS';
    }
}
