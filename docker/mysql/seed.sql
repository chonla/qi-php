CREATE TABLE qidb.users
(
	id INTEGER UNSIGNED UNIQUE AUTO_INCREMENT,
	display varchar (50) NULL,
	login varchar (50) NOT NULL,
	pwd varchar (100) NOT NULL,
	created_at DATETIME NULL,
	updated_at DATETIME NULL,
	displayed_image INTEGER UNSIGNED NULL,
	level INTEGER NOT NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.users (display, login, pwd, created_at, updated_at, displayed_image, level)
	VALUES ('Administrator', 'admin', CONCAT('1234567890abcdef1234567890abcdef.', SHA2('1234567890abcdef1234567890abcdefadmin', 256)), NOW(), NOW(), 0, 99);
INSERT INTO qidb.users (display, login, pwd, created_at, updated_at, displayed_image, level)
	VALUES ('User 1', 'user1', CONCAT('1234567890abcdef1234567890abcdef.', SHA2('1234567890abcdef1234567890abcdefuser1', 256)), NOW(), NOW(), 0, 0);
INSERT INTO qidb.users (display, login, pwd, created_at, updated_at, displayed_image, level)
	VALUES ('User 2', 'user2', CONCAT('1234567890abcdef1234567890abcdef.', SHA2('1234567890abcdef1234567890abcdefuser2', 256)), NOW(), NOW(), 0, 0);

CREATE TABLE qidb.posts
(
	id INTEGER UNSIGNED UNIQUE AUTO_INCREMENT,
	title varchar (400) NULL,
	body TEXT NULL,
	slug char (12) NOT NULL,
	author INTEGER UNSIGNED NULL,
	status varchar (10) DEFAULT 'draft',
	published_at DATETIME NULL,
	created_at DATETIME NULL,
	updated_at DATETIME NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.posts (title, body, slug, author, status, published_at, created_at, updated_at) VALUES
	('Sample Post', 'This is a sample post by user 1.', 'sample1', 2, 'published', NOW(), NOW(), NOW()),
	('Sample Post 2', 'This is another sample.', 'sample2', 1, 'published', NOW(), NOW(), NOW()),
	('Awesome Post', 'This is an awesome post.', 'sample3', 1, 'published', NOW(), NOW(), NOW()),
	('Go for avengers', 'Ironman is missing posted by user 1.', 'sample4', 2, 'published', NOW(), NOW(), NOW()),
	('Spiderman is just a young boy', 'I wish he will grow up someday.', 'sample5', 1, 'published', NOW(), NOW(), NOW()),
	('Castlevana', 'Oh! you spell it wrong. Posted by user 2.', 'sample6', 3, 'published', NOW(), NOW(), NOW()),
	('Master Chef', 'I have no idea about this.', 'sample7', 1, 'published', NOW(), NOW(), NOW()),
	('Lorem ipsum', 'Rola Takizawa.', 'sample8', 1, 'published', NOW(), NOW(), NOW()),
	('BNK48', 'Cherprang is the best.', 'sample9', 1, 'published', NOW(), NOW(), NOW()),
	('Russia!', 'Soccer!', 'sample10', 3, 'published', NOW(), NOW(), NOW()),
	('Nobody is here', 'So, who are you then?', 'sample11', 1, 'published', NOW(), NOW(), NOW()),
	('Ok Google', 'Hi!! People', 'sample12', 1, 'published', NOW(), NOW(), NOW()),
	('The Siri', 'Noooo....', 'sample13', 1, 'published', NOW(), NOW(), NOW()),
	('Back to the Jurassic Park', 'Sorry, I am lost.', 'sample14', 1, 'published', NOW(), NOW(), NOW()),
	('Lost in space', 'That is the NetFlix\'s movie.', 'sample15', 1, 'published', NOW(), NOW(), NOW()),
	('Walking Dead', 'Let it go.', 'sample16', 1, 'published', NOW(), NOW(), NOW());

CREATE TABLE qidb.media
(
	id INTEGER UNSIGNED UNIQUE AUTO_INCREMENT,
	filename varchar (400) NULL,
	mimetype varchar (50) NULL,
	author INTEGER UNSIGNED NULL,
	created_at DATETIME NULL,
	updated_at DATETIME NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

CREATE TABLE qidb.slugs
(
	slug char (12) UNIQUE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;