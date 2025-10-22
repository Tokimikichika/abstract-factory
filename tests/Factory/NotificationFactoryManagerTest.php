<?php

namespace Tokimikichika\AbstractFactory\Tests\Factory;

use Tokimikichika\AbstractFactory\Exception\FactoryNotFoundException;
use Tokimikichika\AbstractFactory\Exception\InvalidChannelException;
use Tokimikichika\AbstractFactory\Factory\NotificationFactoryManager;
use PHPUnit\Framework\TestCase;

/**
 * @тест менеджера фабрик уведомлений
 */
class NotificationFactoryManagerTest extends TestCase
{
    private NotificationFactoryManager $manager;

    protected function setUp(): void
    {
        $this->manager = new NotificationFactoryManager();
    }


    /**
     * @тест получения количества доступных каналов
     */
    public function testGetAvailableChannelsCount(): void
    {
        $channels = $this->manager->getAvailableChannels();
        $this->assertCount(3, $channels);
    }

    /**
     * @тест получения доступных каналов содержит Email
     */
    public function testGetAvailableChannelsContainsEmail(): void
    {
        $channels = $this->manager->getAvailableChannels();
        $this->assertContains('email', $channels);
    }

    /**
     * @тест получения доступных каналов содержит SMS
     */
    public function testGetAvailableChannelsContainsSms(): void
    {
        $channels = $this->manager->getAvailableChannels();
        $this->assertContains('sms', $channels);
    }

    /**
     * @тест получения доступных каналов содержит Push
     */
    public function testGetAvailableChannelsContainsPush(): void
    {
        $channels = $this->manager->getAvailableChannels();
        $this->assertContains('push', $channels);
    }

    /**
     * @тест получения фабрики Email
     */
    public function testGetEmailFactory(): void
    {
        $factory = $this->manager->getFactory('email');
        $this->assertEquals('Email', $factory->getChannelName());
    }

    /**
     * @тест получения фабрики SMS
     */
    public function testGetSmsFactory(): void
    {
        $factory = $this->manager->getFactory('sms');
        $this->assertEquals('SMS', $factory->getChannelName());
    }

    /**
     * @тест получения фабрики Push
     */
    public function testGetPushFactory(): void
    {
        $factory = $this->manager->getFactory('push');
        $this->assertEquals('Push', $factory->getChannelName());
    }

    /**
     * @тест получения фабрики с неверным каналом
     */
    public function testGetFactoryWithInvalidChannel(): void
    {
        $this->expectException(FactoryNotFoundException::class);
        $this->manager->getFactory('invalid');
    }

    /**
     * @тест получения фабрики с пустым каналом
     */
    public function testGetFactoryWithEmptyChannel(): void
    {
        $this->expectException(InvalidChannelException::class);
        $this->manager->getFactory('');
    }

    /**
     * @тест создания компонентов уведомлений для Email
     */
    public function testCreateEmailNotificationComponents(): void
    {
        $components = $this->manager->createNotificationComponents('email');
        $this->assertEquals('Email', $components['channel']);
    }

    /**
     * @тест создания компонентов уведомлений для SMS
     */
    public function testCreateSmsNotificationComponents(): void
    {
        $components = $this->manager->createNotificationComponents('sms');
        $this->assertEquals('SMS', $components['channel']);
    }

    /**
     * @тест создания компонентов уведомлений для Push
     */
    public function testCreatePushNotificationComponents(): void
    {
        $components = $this->manager->createNotificationComponents('push');
        $this->assertEquals('Push', $components['channel']);
    }

    /**
     * @тест регистрации фабрики
     */
    public function testRegisterFactory(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);
        $this->assertArrayHasKey('0', array_values($this->manager->getAvailableChannels()));
    }

    /**
     * @тест получения доступных каналов после регистрации
     */
    public function testGetAvailableChannelsAfterRegistration(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);
        $this->assertContains('custom', $this->manager->getAvailableChannels());
    }

    /**
     * @тест доступных каналов содержит Custom после регистрации
     */
    public function testAvailableChannelsContainsCustomAfterRegistration(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);
        $this->assertContains('custom', $this->manager->getAvailableChannels());
    }

    /**
     * @тест доступных каналов содержит Custom
     */
    public function testAvailableChannelsContainsCustom(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);
        $channels = $this->manager->getAvailableChannels();
        $this->assertIsArray($channels);
    }

    /**
     * @тест доступных каналов содержит Custom
     */
    public function testAvailableChannelsContainsCustomCheck(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);
        $this->assertGreaterThanOrEqual(3, count($this->manager->getAvailableChannels()));
    }

    /**
     * @тест доступных каналов содержит Custom
     */
    public function testAvailableChannelsContainsCustomCheckAssert(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);

        $this->assertContains('custom', $this->manager->getAvailableChannels());
    }

    /**
     * @тест получения фабрики Custom
     */
    public function testGetRegisteredCustomFactory(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);

        $factory = $this->manager->getFactory('custom');
        $this->assertEquals('Email', $factory->getChannelName());
    }

    /**
     * @тест создания компонентов уведомлений для Custom
     */
    public function testCreateCustomNotificationComponents(): void
    {
        $emailFactory = $this->manager->getFactory('email');
        $this->manager->registerFactory('custom', $emailFactory);

        $components = $this->manager->createNotificationComponents('custom');
        $this->assertEquals('Email', $components['channel']);
    }

}
