<?php

namespace Tokimikichika\AbstractFactory\Factory;

use Tokimikichika\AbstractFactory\Exception\FactoryNotFoundException;
use Tokimikichika\AbstractFactory\Exception\InvalidChannelException;
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
     * Создать компоненты уведомлений
     * @param string $channel Канал
     * @return array<string, mixed> Компоненты уведомлений
     */
    public function createNotificationComponents(string $channel): array
    {
        $factory = $this->getFactory($channel);

        return [
            'channel' => $factory->getChannelName(),
            'message' => $factory->createMessage(),
            'sender' => $factory->createSender(),
            'delivery' => $factory->createDelivery(),
        ];
    }
}
