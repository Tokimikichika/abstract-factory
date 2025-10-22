<?php

require_once 'vendor/autoload.php';

use Tokimikichika\AbstractFactory\Factory\NotificationFactoryManager;

echo "=== Демонстрация паттерна Абстрактная фабрика ===\n";
echo "=== Система уведомлений ===\n\n";

$manager = new NotificationFactoryManager();

// Демонстрация для разных каналов уведомлений
$channels = ['email', 'sms', 'push'];

foreach ($channels as $channel) {
    echo "--- Канал: " . strtoupper($channel) . " ---\n";
    
    try {
        $components = $manager->createNotificationComponents($channel);
        
        // Настройка компонентов
        $components['message']->setRecipient('user@example.com');
        $components['message']->setSubject('Тестовое уведомление');
        $components['message']->setContent('Это тестовое сообщение для демонстрации системы уведомлений');
        
        $components['sender']->setName('Система уведомлений');
        
        // Отправка уведомления
        echo "Отправка уведомления через {$components['channel']}:\n";
        $components['message']->send();
        
        // Отправка через отправителя
        $components['sender']->send(
            $components['message']->getRecipient(),
            $components['message']->getSubject(),
            $components['message']->getContent()
        );
        
        // Доставка через систему доставки
        $components['delivery']->deliver(
            $components['message']->getRecipient(),
            $components['message']->getSubject(),
            $components['message']->getContent()
        );
        
        // Статистика доставки
        $stats = $components['delivery']->getDeliveryStats();
        echo "Статистика доставки: " . json_encode($stats) . "\n\n";
        
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }
    
    echo str_repeat("-", 50) . "\n\n";
}

// Демонстрация доступных каналов
echo "Доступные каналы: " . implode(', ', $manager->getAvailableChannels()) . "\n";
