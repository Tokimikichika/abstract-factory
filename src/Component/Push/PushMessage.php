<?php

namespace Tokimikichika\AbstractFactory\Component\Push;

use Tokimikichika\AbstractFactory\Interface\MessageInterface;

/**
 * Push-сообщение
 */
class PushMessage implements MessageInterface
{
    private string $content = '';
    private string $recipient = '';
    private string $subject = '';
    /** @var array<string, mixed> */
    private array $pushSettings = [
        'sound' => 'default',
        'badge' => 1,
        'priority' => 'normal',
        'ttl' => 3600,
    ];

    /**
     * Отправить сообщение
     * @return bool Результат отправки
     */
    public function send(): bool
    {
        // Симуляция отправки Push-уведомления
        echo "🔔 Отправка Push-уведомления:\n";
        echo "   Получатель: {$this->recipient}\n";
        echo "   Заголовок: {$this->subject}\n";
        echo "   Содержимое: {$this->content}\n";
        echo "   Настройки: " . json_encode($this->pushSettings) . "\n\n";

        return true; // Симуляция успешной отправки
    }

    /**
     * Получить содержимое сообщения
     * @return string Содержимое сообщения
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Установить содержимое сообщения
     * @param string $content Содержимое сообщения
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Получить получателя
     * @return string Получатель
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * Установить получателя
     * @param string $recipient Получатель
     */
    public function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * Получить тему сообщения
     * @return string Тема сообщения
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Установить тему сообщения
     * @param string $subject Тема сообщения
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * Получить настройки Push-уведомления
     * @return array<string, mixed> Настройки Push-уведомления
     */
    public function getPushSettings(): array
    {
        return $this->pushSettings;
    }

    /**
     * Установить настройки Push-уведомления
     * @param array<string, mixed> $settings Настройки Push-уведомления
     */
    public function setPushSettings(array $settings): void
    {
        $this->pushSettings = array_merge($this->pushSettings, $settings);
    }
}
