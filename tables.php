CREATE TABLE weddings (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  date VARCHAR(255),
  location VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE guests (
  id INT(11) NOT NULL AUTO_INCREMENT,
  wedding_id INT(11),
  name VARCHAR(255),
  attending TINYINT(1),
  adults VARCHAR(255),
  children VARCHAR (255),
  adults_count INT(3),
  children_count INT(3),
  PRIMARY KEY (id)
);

CREATE TABLE admins (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  wedding_id INT(11),
  username VARCHAR(255),
  password VARCHAR(255),
  admin TINYINT(1),
  PRIMARY KEY (id)
);
