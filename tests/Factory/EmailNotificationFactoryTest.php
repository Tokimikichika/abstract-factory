<?php

namespace Tokimikichika\AbstractFactory\Tests\Factory;

use Tokimikichika\AbstractFactory\Factory\EmailNotificationFactory;
use Tokimikichika\AbstractFactory\Interface\DeliveryInterface;
use Tokimikichika\AbstractFactory\Interface\MessageInterface;
use Tokimikichika\AbstractFactory\Interface\SenderInterface;
use PHPUnit\Framework\TestCase;

 /**
 * Тест проверки фабрики EmailNotificationFactory
 */
class EmailNotificationFactoryTest extends TestCase
{
    private EmailNotificationFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new EmailNotificationFactory();
    }

    /**
     * @тест создания сообщения
     */
    public function testCreateMessage(): void
    {
        $message = $this->factory->createMessage();

        $this->assertInstanceOf(MessageInterface::class, $message);
        ob_start();
        $result = $message->send();
        ob_end_clean();
        $this->assertTrue($result);
    }

    /**
     * @тест создания отправителя
     */
    public function testCreateSender(): void
    {
        $sender = $this->factory->createSender();

        $this->assertInstanceOf(SenderInterface::class, $sender);
        $this->assertStringContainsString('Email', $sender->getName());
    }

    /**
     * @тест создания системы доставки
     */
    public function testCreateDelivery(): void
    {
        $delivery = $this->factory->createDelivery();

        $this->assertInstanceOf(DeliveryInterface::class, $delivery);
        $this->assertIsArray($delivery->getDeliveryStats());
    }

    /**
     * @тест получения названия канала
     */
    public function testGetChannelName(): void
    {
        $this->assertEquals('Email', $this->factory->getChannelName());
    }
}
