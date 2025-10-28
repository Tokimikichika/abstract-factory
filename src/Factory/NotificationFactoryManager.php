<?php

namespace Tokimikichika\AbstractFactory\Factory;

use Tokimikichika\AbstractFactory\Component\NotificationComponent;
use Tokimikichika\AbstractFactory\Exception\FactoryNotFoundException;
use Tokimikichika\AbstractFactory\Exception\InvalidChannelException;
use Tokimikichika\AbstractFactory\Interface\NotificationComponentInterface;
use Tokimikichika\AbstractFactory\Interface\NotificationFactoryInterface;

/**
 * Менеджер фабрик уведомлений
 */
class NotificationFactoryManager
{
    /** @var array<string, NotificationFactoryInterface> */
    private array $factories = [];

    public function __construct()
    {
        $this->registerDefaultFactories();
    }

    /**
     * Регистрация фабрик по умолчанию
     */
    private function registerDefaultFactories(): void
    {
        $this->registerFactory('email', new EmailNotificationFactory());
        $this->registerFactory('sms', new SmsNotificationFactory());
        $this->registerFactory('push', new PushNotificationFactory());
    }

    /**
     * Регистрировать фабрику
     * @param string $channel Канал
     * @param NotificationFactoryInterface $factory Фабрика
     */
    public function registerFactory(string $channel, NotificationFactoryInterface $factory): void
    {
        $this->factories[$channel] = $factory;
    }

    /**
     * Получить фабрику по каналу
     * @param string $channel Канал
     * @return NotificationFactoryInterface Фабрика
     * @throws FactoryNotFoundException
     * @throws InvalidChannelException
     */
    public function getFactory(string $channel): NotificationFactoryInterface
    {
        if (empty($channel)) {
            throw new InvalidChannelException($channel);
        }

        if (! isset($this->factories[$channel])) {
            throw new FactoryNotFoundException($channel);
        }

        return $this->factories[$channel];
    }

    /**
     * Получить доступные каналы
     * @return array<string> Список каналов
     */
    public function getAvailableChannels(): array
    {
        return array_keys($this->factories);
    }

    /**
     * Создать компонент уведомления
     * @param string $channel Канал
     * @return NotificationComponentInterface Компонент уведомления
     */
    public function createNotificationComponent(string $channel): NotificationComponentInterface
    {
        $factory = $this->getFactory($channel);

        return new NotificationComponent(
            $factory->getChannelName(),
            $factory->createMessage(),
            $factory->createSender(),
            $factory->createDelivery()
        );
    }
}
