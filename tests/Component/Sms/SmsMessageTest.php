<?php

namespace Tokimikichika\AbstractFactory\Tests\Component\Sms;

use PHPUnit\Framework\TestCase;
use Tokimikichika\AbstractFactory\Component\Sms\SmsMessage;

/**
 * @тест сообщения SMS
 * @covers SmsMessage
 */
class SmsMessageTest extends TestCase
{
    private SmsMessage $message;

    protected function setUp(): void
    {
        $this->message = new SmsMessage();
    }

    /**
     * @тест отправки сообщения
     */
    public function testSend(): void
    {
        $this->message->setRecipient('+79990000000');
        $this->message->setSubject('Код');
        $this->message->setContent('Ваш код: 1234');

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
        $this->message->setContent('Привет');
        $this->assertEquals('Привет', $this->message->getContent());
    }

    /**
     * @тест установки и получения получателя
     */
    public function testSetAndGetRecipient(): void
    {
        $this->message->setRecipient('+79990000000');
        $this->assertEquals('+79990000000', $this->message->getRecipient());
    }

    /**
     * @тест установки и получения темы
     */
    public function testSetAndGetSubject(): void
    {
        $this->message->setSubject('Код');
        $this->assertEquals('Код', $this->message->getSubject());
    }

    /**
     * @тест настроек SMS: get/set
     */
    public function testGetAndSetSmsSettings(): void
    {
        $defaults = $this->message->getSmsSettings();
        $this->assertArrayHasKey('encoding', $defaults);
        $this->assertArrayHasKey('max_length', $defaults);
        $this->assertArrayHasKey('type', $defaults);

        $this->message->setSmsSettings(['encoding' => 'GSM-7', 'max_length' => 140]);
        $settings = $this->message->getSmsSettings();
        $this->assertEquals('GSM-7', $settings['encoding']);
        $this->assertEquals(140, $settings['max_length']);
    }
}
