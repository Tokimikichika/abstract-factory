<?php

namespace Tokimikichika\AbstractFactory\Component\Push;

use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * Push-отправитель
 */
class PushSender implements SenderInterface
{
    private string $name = 'Push Sender';
    /** @var array<string, mixed> */
    private array $settings = [
        'fcm_server_key' => 'your-fcm-server-key',
        'apns_certificate' => 'path/to/certificate.pem',
        'apns_passphrase' => 'your-passphrase',
        'sandbox_mode' => true,
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
        echo "   Push Sender ({$this->name}):\n";
        echo "   FCM Server Key: " . substr($this->settings['fcm_server_key'], 0, 8) . "...\n";
        echo "   APNS Certificate: {$this->settings['apns_certificate']}\n";
        echo "   Sandbox Mode: " . ($this->settings['sandbox_mode'] ? 'Yes' : 'No') . "\n";
        echo "   Отправка на: {$recipient}\n";
        echo "   Заголовок: {$subject}\n";
        echo "   Содержимое: {$content}\n\n";

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
