<?php

namespace Tokimikichika\AbstractFactory\Interface;

/**
 * Интерфейс для сообщения уведомления
 */
interface MessageInterface
{
    /**
     * Отправить сообщение
     * @return bool Результат отправки
     */
    public function send(): bool;

    /**
     * Получить содержимое сообщения
     * @return string Содержимое сообщения
     */
    public function getContent(): string;

    /**
     * Установить содержимое сообщения
     * @param string $content Содержимое сообщения
     */
    public function setContent(string $content): void;

    /**
     * Получить получателя
     * @return string Получатель
     */
    public function getRecipient(): string;

    /**
     * Установить получателя
     * @param string $recipient Получатель
     */
    public function setRecipient(string $recipient): void;

    /**
     * Получить тему сообщения
     * @return string Тема сообщения
     */
    public function getSubject(): string;

    /**
     * Установить тему сообщения
     * @param string $subject Тема сообщения
     */
    public function setSubject(string $subject): void;
}
