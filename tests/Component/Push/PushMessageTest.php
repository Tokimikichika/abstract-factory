<?php

namespace Tokimikichika\AbstractFactory\Tests\Component\Push;

use PHPUnit\Framework\TestCase;
use Tokimikichika\AbstractFactory\Component\Push\PushMessage;

/**
 * @тест сообщения Push
 * @covers PushMessage
 */
class PushMessageTest extends TestCase
{
    private PushMessage $message;

    protected function setUp(): void
    {
        $this->message = new PushMessage();
    }

    /**
     * @тест отправки сообщения
     */
    public function testSend(): void
    {
        $this->message->setRecipient('user-123');
        $this->message->setSubject('Новость');
        $this->message->setContent('Обновление приложения доступно');

        ob_start();
        $result = $this->message->send();
        ob_end_clean();

        $this->assertTrue($result);
    }

    /**
     * @тест установки и получения содержимого
     */
    public function testSetAndGetContent(): void
    {
        $this->message->setContent('Hi');
        $this->assertEquals('Hi', $this->message->getContent());
    }

    /**
     * @тест установки и получения получателя
     */
    public function testSetAndGetRecipient(): void
    {
        $this->message->setRecipient('user-123');
        $this->assertEquals('user-123', $this->message->getRecipient());
    }

    /**
     * @тест установки и получения темы
     */
    public function testSetAndGetSubject(): void
    {
        $this->message->setSubject('Новость');
        $this->assertEquals('Новость', $this->message->getSubject());
    }

    /**
     * @тест настроек Push: get/set
     */
    public function testGetAndSetPushSettings(): void
    {
        $defaults = $this->message->getPushSettings();
        $this->assertArrayHasKey('sound', $defaults);
        $this->assertArrayHasKey('badge', $defaults);
        $this->assertArrayHasKey('priority', $defaults);
        $this->assertArrayHasKey('ttl', $defaults);

        $this->message->setPushSettings(['priority' => 'high', 'ttl' => 10]);
        $settings = $this->message->getPushSettings();
        $this->assertEquals('high', $settings['priority']);
        $this->assertEquals(10, $settings['ttl']);
    }
}
