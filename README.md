## Установка и настройка

1. Настроить подключение к базе данных mysql (файл `config/config.php`)
2. Создать таблицу в базе:
```sql
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`key`)
)
```
3. Корневую директорию в настройках веб сервера изменить на `web`
