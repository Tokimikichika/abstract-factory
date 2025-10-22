<?php

namespace Tokimikichika\AbstractFactory\Component\Email;

use Tokimikichika\AbstractFactory\Interface\MessageInterface;

/**
 * Email-сообщение
 */
class EmailMessage implements MessageInterface
{
    private string $content = '';
    private string $recipient = '';
    private string $subject = '';
    /** @var array<string, string> */
    private array $headers = [
        'Content-Type' => 'text/html; charset=UTF-8',
        'From' => 'noreply@example.com',
    ];

    /**
     * Отправить сообщение
     * @return bool Результат отправки
     */
    public function send(): bool
    {
        // Симуляция отправки email
        echo "📧 Отправка Email:\n";
        echo "   Получатель: {$this->recipient}\n";
        echo "   Тема: {$this->subject}\n";
        echo "   Содержимое: {$this->content}\n";
        echo "   Headers: " . json_encode($this->headers) . "\n\n";

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
     * Получить заголовки email
     * @return array<string, string> Заголовки email
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Установить заголовки email
     * @param array<string, string> $headers Заголовки email
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = array_merge($this->headers, $headers);
    }
}
