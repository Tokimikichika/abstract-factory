<?php

namespace Tokimikichika\AbstractFactory\Interface;

/**
 * Интерфейс для системы доставки уведомлений
 */
interface DeliveryInterface
{
    /**
     * Доставить уведомление
     * @param string $recipient Получатель
     * @param string $subject Тема
     * @param string $content Содержимое
     * @return bool Результат доставки
     */
    public function deliver(string $recipient, string $subject, string $content): bool;

    /**
     * Получить статус доставки
     * @param string $messageId ID сообщения
     * @return string Статус доставки
     */
    public function getDeliveryStatus(string $messageId): string;

    /**
     * Получить статистику доставки
     * @return array<string, mixed> Статистика доставки
     */
    public function getDeliveryStats(): array;

    /**
     * Установить настройки доставки
     * @param array<string, mixed> $settings Настройки доставки
     */
    public function setDeliverySettings(array $settings): void;

    /**
     * Получить настройки доставки
     * @return array<string, mixed> Настройки доставки
     */
    public function getDeliverySettings(): array;
}
