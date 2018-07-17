CREATE TABLE qidb.users
(
	id INTEGER UNSIGNED NULL AUTO_INCREMENT,
	display varchar (50) NULL,
	login varchar (50) NOT NULL,
	pwd varchar (100) NOT NULL,
	created_at DATETIME NULL,
	updated_at DATETIME NULL,
	displayed_image INTEGER UNSIGNED NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.users (display, login, pwd, created_at, updated_at, displayed_image)
	VALUES ('Administrator', 'admin', CONCAT('1234567890abcdef1234567890abcdef.', SHA2('1234567890abcdef1234567890abcdefadmin', 256)), NOW(), NOW(), 0);

CREATE TABLE qidb.posts
	(
		id INTEGER UNSIGNED NULL AUTO_INCREMENT,
		title varchar (400) NULL,
		body TEXT NULL,
		author INTEGER UNSIGNED NULL,
		featured_image INTEGER UNSIGNED NULL,
		created_at DATETIME NULL,
		updated_at DATETIME NULL,
		PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.posts (title, body, author, featured_image, created_at, updated_at) VALUES
	('Sample Post', 'This is a sample post.', 1, 0, NOW(), NOW()),
	('Sample Post 2', 'This is another sample.', 1, 0, NOW(), NOW()),
	('Awesome Post', 'This is an awesome post.', 1, 0, NOW(), NOW()),
	('Go for avengers', 'Ironman is missing.', 1, 0, NOW(), NOW()),
	('Spiderman is just a young boy', 'I wish he will grow up someday.', 1, 0, NOW(), NOW()),
	('Castlevana', 'Oh! you spell it wrong.', 1, 0, NOW(), NOW()),
	('Master Chef', 'I have no idea about this.', 1, 0, NOW(), NOW()),
	('Lorem ipsum', 'Rola Takizawa.', 1, 0, NOW(), NOW()),
	('BNK48', 'Cherprang is the best.', 1, 0, NOW(), NOW()),
	('Russia!', 'Soccer!', 1, 0, NOW(), NOW()),
	('Nobody is here', 'So, who are you then?', 1, 0, NOW(), NOW()),
	('Ok Google', 'Hi!! People', 1, 0, NOW(), NOW()),
	('The Siri', 'Noooo....', 1, 0, NOW(), NOW()),
	('Back to the Jurassic Park', 'Sorry, I am lost.', 1, 0, NOW(), NOW()),
	('Lost in space', 'That is the NetFlix\'s movie.', 1, 0, NOW(), NOW()),
	('Walking Dead', 'Let it go.', 1, 0, NOW(), NOW());