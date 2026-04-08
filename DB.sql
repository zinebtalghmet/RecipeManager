CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    email varchar (100) UNIQUE,
    password varchar(100)
)


CREATE TABLE categories (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    user_id varchar(100),
    FOREIGN KEY (user_id) REFERENCES users (id)
)


CREATE TABLE recipes (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(50),
    ingredients varchar(50),
    instructions varchar(200),
    time varchar(50),
    portions varchar(200),
    user_id int,
    cat_id int,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (cat_id) REFERENCES categories(id)
)