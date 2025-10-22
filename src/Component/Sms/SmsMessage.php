<?php

namespace Tokimikichika\AbstractFactory\Component\Sms;

use Tokimikichika\AbstractFactory\Interface\MessageInterface;

/**
 * SMS-сообщение
 */
class SmsMessage implements MessageInterface
{
    private string $content = '';
    private string $recipient = '';
    private string $subject = '';
    /** @var array<string, mixed> */
    private array $smsSettings = [
        'encoding' => 'UTF-8',
        'max_length' => 160,
        'type' => 'text',
    ];

    /**
     * Отправить сообщение
     * @return bool Результат отправки
     */
    public function send(): bool
    {
        // Симуляция отправки SMS
        echo "   Отправка SMS:\n";
        echo "   Получатель: {$this->recipient}\n";
        echo "   Содержимое: {$this->content}\n";
        echo "   Длина: " . strlen($this->content) . " символов\n";
        echo "   Настройки: " . json_encode($this->smsSettings) . "\n\n";

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
     * Получить настройки SMS
     * @return array<string, mixed> Настройки SMS
     */
    public function getSmsSettings(): array
    {
        return $this->smsSettings;
    }

    /**
     * Установить настройки SMS
     * @param array<string, mixed> $settings Настройки SMS
     */
    public function setSmsSettings(array $settings): void
    {
        $this->smsSettings = array_merge($this->smsSettings, $settings);
    }
}
