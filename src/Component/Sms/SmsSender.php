<?php

namespace Tokimikichika\AbstractFactory\Component\Sms;

use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * SMS-отправитель
 */
class SmsSender implements SenderInterface
{
    private string $name = 'SMS Sender';
    /** @var array<string, mixed> */
    private array $settings = [
        'api_url' => 'https://api.sms-provider.com/send',
        'api_key' => 'your-api-key',
        'sender_name' => 'YourApp',
        'country_code' => '+7',
    ];

    /**
     * Отправить уведомление
     * @param string $recipient Получатель
     * @param string $subject Тема
     * @param string $content Содержимое
     * @return bool Результат отправки
     */
    public function send(string $recipient, string $subject, string $content): bool
    {
        echo "📱 SMS Sender ({$this->name}):\n";
        echo "   API URL: {$this->settings['api_url']}\n";
        echo "   API Key: " . substr($this->settings['api_key'], 0, 8) . "...\n";
        echo "   Отправитель: {$this->settings['sender_name']}\n";
        echo "   Отправка на: {$recipient}\n";
        echo "   Содержимое: {$content}\n";
        echo "   Длина: " . strlen($content) . " символов\n\n";

        return true; // Симуляция успешной отправки
    }

    /**
     * Получить название отправителя
     * @return string Название отправителя
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Установить название отправителя
     * @param string $name Название отправителя
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Получить настройки отправителя
     * @return array<string, mixed> Настройки отправителя
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * Установить настройки отправителя
     * @param array<string, mixed> $settings Настройки отправителя
     */
    public function setSettings(array $settings): void
    {
        $this->settings = array_merge($this->settings, $settings);
    }
}
