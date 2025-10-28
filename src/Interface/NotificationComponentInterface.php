<?php

namespace Tokimikichika\AbstractFactory\Interface;

/**
 * Интерфейс компонента уведомления
 */
interface NotificationComponentInterface
{
    /**
     * Получить канал уведомления
     * @return string Название канала
     */
    public function getChannel(): string;

    /**
     * Получить объект сообщения
     * @return object Объект сообщения
     */
    public function getMessage(): object;

    /**
     * Получить объект отправителя
     * @return object Объект отправителя
     */
    public function getSender(): object;

    /**
     * Получить объект доставки
     * @return object Объект доставки
     */
    public function getDelivery(): object;

    /**
     * Отправить уведомление
     * @return bool Результат отправки
     */
    public function send(): bool;
}

