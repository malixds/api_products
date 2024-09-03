#!/bin/bash

set -e

docker-compose up -d --build

echo "Waiting for PostgreSQL"
sleep 10

echo "Creating iphones table"

docker exec -i postgres_container psql -U test -d test << EOF
CREATE TABLE IF NOT EXISTS iphones (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL DEFAULT '',
    description TEXT NOT NULL DEFAULT '',
    price NUMERIC(10, 2) NOT NULL DEFAULT 0.0,
    discountPercentage NUMERIC(5, 2) NOT NULL DEFAULT 0.0,
    rating NUMERIC(3, 2) NOT NULL DEFAULT 0.0,
    stock INT NOT NULL DEFAULT 0,
    brand VARCHAR(255) NOT NULL DEFAULT '',
    category VARCHAR(255) NOT NULL DEFAULT ''
);
EOF

#
#
#
##!/bin/bash
#
## Настройки для подключения к PostgreSQL
#DB_HOST="localhost"
#DB_PORT="5432"
#DB_USER="malixds"
#DB_PASS=""  # Укажите пароль, если требуется
#DB_NAME="products"
#
## Экспорт пароля для использования в psql
#export PGPASSWORD="${DB_PASS}"
#
## SQL-запрос для создания базы данных и таблицы
#SQL_QUERY="
#CREATE DATABASE ${DB_NAME};
#\c ${DB_NAME};
#
#CREATE TABLE IF NOT EXISTS iphones (
#    id SERIAL PRIMARY KEY,
#    title VARCHAR(255) NOT NULL DEFAULT '',
#    description TEXT NOT NULL DEFAULT '',
#    price NUMERIC(10, 2) NOT NULL DEFAULT 0.0,
#    discountPercentage NUMERIC(5, 2) NOT NULL DEFAULT 0.0,
#    rating NUMERIC(3, 2) NOT NULL DEFAULT 0.0,
#    stock INT NOT NULL DEFAULT 0,
#    brand VARCHAR(255) NOT NULL DEFAULT '',
#    category VARCHAR(255) NOT NULL DEFAULT ''
#);
#"
#
## Подключение и выполнение SQL-запроса
#psql -h "${DB_HOST}" -p "${DB_PORT}" -U "${DB_USER}" -c "${SQL_QUERY}"
#
## Проверка выполнения
#if [ $? -eq 0 ]; then
#  echo "База данных и таблица iphones успешно созданы!"
#else
#  echo "Ошибка при создании базы данных или таблицы."
#fi
