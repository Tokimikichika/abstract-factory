# Абстрактная фабрика (Abstract Factory Pattern)

## Описание

Реализация паттерна "Абстрактная фабрика" на примере создания системы уведомлений для разных каналов связи.

### Базовое использование

```php
use AbstractFactory\Factory\NotificationFactoryManager;

$manager = new NotificationFactoryManager();

// Создание компонентов для Email
$emailComponents = $manager->createNotificationComponents('email');
$emailComponents['message']->setRecipient('user@example.com');
$emailComponents['message']->setSubject('Важное уведомление');
$emailComponents['message']->setContent('Это важное сообщение');
$emailComponents['message']->send();

// Создание компонентов для SMS
$smsComponents = $manager->createNotificationComponents('sms');
$smsComponents['message']->setRecipient('+79001234567');
$smsComponents['message']->setContent('Код подтверждения: 1234');
$smsComponents['message']->send();
```

### Прямое использование фабрик

```php
use AbstractFactory\Factory\EmailNotificationFactory;

$factory = new EmailNotificationFactory();
$message = $factory->createMessage();
$sender = $factory->createSender();
$delivery = $factory->createDelivery();
```

## Поддерживаемые каналы уведомлений

- **Email** - электронная почта с HTML-поддержкой
- **SMS** - текстовые сообщения с ограничением длины
- **Push** - push-уведомления для мобильных устройств

## Установка и запуск

1. Установка зависимостей:
```bash
composer install
```

2. Запуск примера:
```bash
php example.php
```

3. Запуск тестов:
```bash
composer test
```

4. Анализ кода:
```bash
composer analyse
```

## Тестирование

Проект включает полное покрытие тестами:
- Unit-тесты для всех компонентов
- Тесты фабрик
- Тесты менеджера фабрик

## Расширение

Для добавления нового канала уведомлений:

1. Создайте компоненты в `src/Component/NewChannel/`
2. Создайте фабрику `src/Factory/NewChannelNotificationFactory.php`
3. Зарегистрируйте фабрику в `NotificationFactoryManager`


