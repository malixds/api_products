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
