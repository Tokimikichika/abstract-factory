<?php

namespace Tokimikichika\AbstractFactory\Interface;

/**
 * Интерфейс для фабрики уведомлений
 */
interface NotificationFactoryInterface
{
    /**
     * Создать сообщение
     * @return MessageInterface Сообщение
     */
    public function createMessage(): MessageInterface;

    /**
     * Создать отправителя
     * @return SenderInterface Отправитель
     */
    public function createSender(): SenderInterface;

    /**
     * Создать систему доставки
     * @return DeliveryInterface Система доставки
     */
    public function createDelivery(): DeliveryInterface;

    /**
     * Получить название канала уведомлений
     * @return string Название канала
     */
    public function getChannelName(): string;
}
