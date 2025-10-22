<?php

namespace Tokimikichika\AbstractFactory\Tests\Exception;

use PHPUnit\Framework\TestCase;
use Tokimikichika\AbstractFactory\Exception\FactoryNotFoundException;
use Tokimikichika\AbstractFactory\Exception\InvalidChannelException;
use Tokimikichika\AbstractFactory\Exception\NotificationException;
use Tokimikichika\AbstractFactory\Exception\NotificationSendException;

/**
 * Тест проверки исключений
 */
class ExceptionsTest extends TestCase
{
    /**
    * Тест проверки исключения FactoryNotFoundException
    */
    public function testFactoryNotFoundExceptionCanBeThrown(): void
    {
        $this->expectException(FactoryNotFoundException::class);
        throw new FactoryNotFoundException('Factory not found');
    }

    /**
    * Тест проверки исключения InvalidChannelException
    */
    public function testInvalidChannelExceptionCanBeThrown(): void
    {
        $this->expectException(InvalidChannelException::class);
        throw new InvalidChannelException('Invalid channel');
    }

    /**
    * Тест проверки исключения NotificationSendException
    */
    public function testNotificationSendExceptionExtendsBase(): void
    {
        $exception = new NotificationSendException('Send failed');
        $this->assertInstanceOf(NotificationException::class, $exception);
    }
}
