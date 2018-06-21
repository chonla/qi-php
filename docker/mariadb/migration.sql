CREATE TABLE qidb.authors
(
	id INTEGER UNSIGNED NULL AUTO_INCREMENT,
	display varchar (50) NULL,
	created_datetime INTEGER UNSIGNED NULL,
	modified_datetime INTEGER UNSIGNED NULL,
	displayed_image INTEGER UNSIGNED NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.authors (display) VALUES ('admin');

CREATE TABLE qidb.posts
	(
		id INTEGER UNSIGNED NULL AUTO_INCREMENT,
		title varchar (400) NULL,
		body TEXT NULL,
		author INTEGER UNSIGNED NULL,
		created_datetime INTEGER UNSIGNED NULL,
		modified_datetime INTEGER UNSIGNED NULL,
		featured_image INTEGER UNSIGNED NULL,
		PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO qidb.posts (title, body, author, featured_image) VALUES
	('Sample Post', 'This is a sample post.', 1, 0),
	('Sample Post 2', 'This is another sample.', 2, 0);