<?php

namespace Tokimikichika\AbstractFactory\Component\Email;

use Tokimikichika\AbstractFactory\Interface\SenderInterface;

/**
 * Email-отправитель
 */
class EmailSender implements SenderInterface
{
    private string $name = 'Email Sender';
    /** @var array<string, mixed> */
    private array $settings = [
        'smtp_host' => 'smtp.example.com',
        'smtp_port' => 587,
        'smtp_username' => 'user@example.com',
        'smtp_password' => 'password',
        'smtp_encryption' => 'tls',
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
        echo "📧 Email Sender ({$this->name}):\n";
        echo "   SMTP Host: {$this->settings['smtp_host']}\n";
        echo "   SMTP Port: {$this->settings['smtp_port']}\n";
        echo "   Отправка на: {$recipient}\n";
        echo "   Тема: {$subject}\n";
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
