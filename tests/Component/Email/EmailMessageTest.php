<?php

namespace Tokimikichika\AbstractFactory\Tests\Component\Email;

use Tokimikichika\AbstractFactory\Component\Email\EmailMessage;
use PHPUnit\Framework\TestCase;

/**
 * @тест сообщения Email
 * @covers EmailMessage
 */
class EmailMessageTest extends TestCase
{
    private EmailMessage $message;

    protected function setUp(): void
    {
        $this->message = new EmailMessage();
    }

    /**
     * @тест отправки сообщения
     */
    public function testSend(): void
    {
        $this->message->setRecipient('test@example.com');
        $this->message->setSubject('Test Subject');
        $this->message->setContent('Test Content');

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
        $this->message->setContent('Test Content');
        $this->assertEquals('Test Content', $this->message->getContent());
    }

    /**
     * @тест установки и получения получателя
     */
    public function testSetAndGetRecipient(): void
    {
        $this->message->setRecipient('test@example.com');
        $this->assertEquals('test@example.com', $this->message->getRecipient());
    }

    /**
     * @тест установки и получения темы
     */
    public function testSetAndGetSubject(): void
    {
        $this->message->setSubject('Test Subject');
        $this->assertEquals('Test Subject', $this->message->getSubject());
    }

    /**
     * @тест получения заголовков
     */
    public function testGetHeaders(): void
    {
        $headers = $this->message->getHeaders();

        $this->assertIsArray($headers);
        $this->assertArrayHasKey('Content-Type', $headers);
        $this->assertArrayHasKey('From', $headers);
    }

    /**
     * @тест установки заголовков
     */
    public function testSetHeaders(): void
    {
        $newHeaders = ['X-Custom-Header' => 'Custom Value'];
        $this->message->setHeaders($newHeaders);

        $headers = $this->message->getHeaders();
        $this->assertArrayHasKey('X-Custom-Header', $headers);
        $this->assertEquals('Custom Value', $headers['X-Custom-Header']);
    }
}
