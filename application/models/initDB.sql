
# DROP DATABASE PR4_banners;
CREATE DATABASE PR4_banners DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

USE PR4_banners;

CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE roles(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL
);

CREATE TABLE includes_role(
	# id INT AUTO_INCREMENT PRIMARY KEY,
	role INT NOT NULL,
	user INT NOT NULL PRIMARY KEY,

	FOREIGN KEY (role) REFERENCES roles (id) ON DELETE CASCADE,
	FOREIGN KEY (user) REFERENCES users (id) ON DELETE CASCADE
);


CREATE TABLE news(
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATETIME NOT NULL DEFAULT NOW(),
	title VARCHAR(80) NOT NULL,
	image VARCHAR(255) NOT NULL,
	description TEXT NOT NULL
);

CREATE TABLE comments(
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATETIME NOT NULL DEFAULT NOW(),
	news INT NOT NULL,
	user INT NOT NULL,
	text TEXT NOT NULL,

	FOREIGN KEY (news) REFERENCES news (id) ON DELETE CASCADE,
	FOREIGN KEY (user) REFERENCES users (id) ON DELETE CASCADE
);


CREATE TABLE banners
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	image VARCHAR(100) NULL,
	owner INT NOT NULL,
	countShow INT UNSIGNED NOT NULL DEFAULT 0,
	limitShow INT UNSIGNED NOT NULL DEFAULT 0,
	position VARCHAR(100) NULL,
	dateCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

	FOREIGN KEY (owner) REFERENCES users (id) ON DELETE CASCADE
);



INSERT INTO users (login, password) VALUES
('sudo', '75ig//eBR04HY'),
('admin', '757va0lgB4kpM'),
('user', '75bUXAuHldJ82');

INSERT INTO roles (name) VALUES
('superuser'),
('admin');

INSERT INTO includes_role (role, user) VALUES
(1, 1),
(2, 2);


INSERT INTO news (title, description, image) VALUES
(
	"Дан новый старт!",
	"С данного момента стартует сайт по размещению партфолио.",
	"/files/image/news/start.jpg"
),(
	"Кавычки?",
	"В данный момент проверяется возможность использовать двойные кавычки вместо одинарных в скриптах SQL запросов.",
	"/files/image/news/quotes2.png"
),(
	"Кавычки!",
	"Можно использовать двойные кавычки вместо одинарных в скриптах SQL запросов. Проверено.",
	"/files/image/news/quotes.jpg"
);

INSERT INTO comments (news, user, text) VALUES
(
	1,
	1,
	"Комментарии тоже стартуют"
),(
	1,
	2,
	"Ура!"
),(
	1,
	3,
	"Сайт фигня, удаляюсь."
),(
	2,
	2,
	"Наконец-то узнаю! Всегда было интересно, но всё руки недоходили."
),(
	2,
	3,
	"Лентяй!"
),(
	3,
	2,
	"Да! Я знал это!"
),(
	2,
	3,
	"Дебыла кусок, это все знали!"
);

INSERT INTO banners (image, owner, limitShow, position) VALUES
(
	"/files/image/banners/0da45f0912a9b77e254cfc4bf7d67b1d.jpg",
	1,
	10,
	"right"
),
(
	"/files/image/banners/a5c41a25a72049dfd738f1e9e0a280eb.jpg",
	1,
	10,
	"right"
),
(
	"/files/image/banners/dd40f2873f1a09ccb207d000f87243f5.jpg",
	1,
	10,
	"left"
),
(
	"/files/image/banners/dd54f6875f160681b157502058522485.jpg",
	1,
	10,
	"left"
);

