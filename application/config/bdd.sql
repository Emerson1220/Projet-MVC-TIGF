-- Table Users
CREATE TABLE user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)


-- Table recette
CREATE TABLE recette (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    dish_name VARCHAR(255) NOT NULL,
    dish_content TEXT(200000) NOT NULL,
    dish_option VARCHAR(255) NOT NULL,
    dish_price TINYINT UNSIGNED NOT NULL,
    dish_img VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

-- Table categorie
CREATE TABLE category (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_recette INT NOT NULL,
    category_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

-- Table Liaison recette --> categorie
CREATE TABLE recette_category (
    recette_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (recette_id, category_id),
    CONSTRAINT fk_recette_id
        FOREIGN KEY (recette_id)
        REFERENCES recette (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES category (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)


-- Table Newsletters
CREATE TABLE newsletters (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    date DATETIME NOT NULL CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)