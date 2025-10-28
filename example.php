<?php

require_once 'vendor/autoload.php';

use Tokimikichika\AbstractFactory\Factory\NotificationFactoryManager;

echo "=== Демонстрация паттерна Абстрактная фабрика ===\n";
echo "=== Система уведомлений ===\n\n";

$manager = new NotificationFactoryManager();

$channels = ['email', 'sms', 'push'];

foreach ($channels as $channel) {
    echo "--- Канал: " . strtoupper($channel) . " ---\n";
    
    try {
        $component = $manager->createNotificationComponent($channel);

        $component->getMessage()->setRecipient('user@example.com');
        $component->getMessage()->setSubject('Тестовое уведомление');
        $component->getMessage()->setContent('Это тестовое сообщение для демонстрации системы уведомлений');

        $component->getSender()->setName('Система уведомлений');

        echo "Отправка уведомления через {$component->getChannel()}:\n";
        $component->send();

        $component->getSender()->send(
            $component->getMessage()->getRecipient(),
            $component->getMessage()->getSubject(),
            $component->getMessage()->getContent()
        );

        $component->getDelivery()->deliver(
            $component->getMessage()->getRecipient(),
            $component->getMessage()->getSubject(),
            $component->getMessage()->getContent()
        );

        $stats = $component->getDelivery()->getDeliveryStats();
        echo "Статистика доставки: " . json_encode($stats) . "\n\n";

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }
    
    echo str_repeat("-", 50) . "\n\n";
}

echo "Доступные каналы: " . implode(', ', $manager->getAvailableChannels()) . "\n";
