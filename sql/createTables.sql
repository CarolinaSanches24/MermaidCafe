CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    type_product VARCHAR(45) NOT NULL,
    name VARCHAR(45) NOT NULL,
    description TEXT NOT NULL,
    image TEXT NOT NULL,
    price NUMERIC(5, 2) NOT NULL
);