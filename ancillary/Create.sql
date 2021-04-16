
DROP DATABASE PR4_banners;

CREATE DATABASE PR4_banners;
USE PR4_banners;

CREATE TABLE Roles
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	role VARCHAR(50) NOT NULL UNIQUE
);

/*
GO;
*/

INSERT INTO Roles (role) VALUES
('admin');

CREATE TABLE Users
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(50) NOT NULL,
	role INT UNSIGNED NULL,

	FOREIGN KEY (role) REFERENCES Roles (id) ON DELETE CASCADE
);

/*
GO;
*/

INSERT INTO Users (username, password, role) VALUES
('admin', 'admin', 1),
('user', 'user', NULL);

CREATE TABLE Pages
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	author INT UNSIGNED NOT NULL,
	title VARCHAR(300) NOT NULL,
	content TEXT NOT NULL,
	dateCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

	FOREIGN KEY (author) REFERENCES Users (id) ON DELETE CASCADE
);

CREATE TABLE Banners
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	image VARCHAR(100) NULL,
	owner INT UNSIGNED NOT NULL,
	countShow INT UNSIGNED NOT NULL DEFAULT 0,
	limitShow INT UNSIGNED NOT NULL DEFAULT 0,
	position VARCHAR(100) NULL,
	dateCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

	FOREIGN KEY (owner) REFERENCES Users (id) ON DELETE CASCADE
);

/*
GO;
*/

INSERT INTO Pages (author, title, content) VALUES
(1, 'Заголовок первой статьи', "Текст первой статьи"),
(1, 'Заголовок второй статьи', "Текст второй статьи");


INSERT INTO Banners (image, owner, limitShow, position) VALUES
(
	"0da45f0912a9b77e254cfc4bf7d67b1d.jpg",
	1,
	10,
	"right"
),
(
	"a5c41a25a72049dfd738f1e9e0a280eb.jpg",
	1,
	10,
	"right"
),
(
	"dd40f2873f1a09ccb207d000f87243f5.jpg",
	1,
	10,
	"left"
),
(
	"dd54f6875f160681b157502058522485.jpg",
	1,
	10,
	"left"
);










