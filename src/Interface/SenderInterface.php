<?php

namespace Tokimikichika\AbstractFactory\Interface;

/**
 * Интерфейс для отправителя уведомлений
 */
interface SenderInterface
{
    /**
     * Отправить уведомление
     * @param string $recipient Получатель
     * @param string $subject Тема
     * @param string $content Содержимое
     * @return bool Результат отправки
     */
    public function send(string $recipient, string $subject, string $content): bool;

    /**
     * Получить название отправителя
     * @return string Название отправителя
     */
    public function getName(): string;

    /**
     * Установить название отправителя
     * @param string $name Название отправителя
     */
    public function setName(string $name): void;

    /**
     * Получить настройки отправителя
     * @return array<string, mixed> Настройки отправителя
     */
    public function getSettings(): array;

    /**
     * Установить настройки отправителя
     * @param array<string, mixed> $settings Настройки отправителя
     */
    public function setSettings(array $settings): void;
}
