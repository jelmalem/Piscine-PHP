CREATE TABLE ft_table
(
	id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	login char(8) NOT NULL DEFAULT 'toto',
	groupe ENUM('staff','student','other') NOT NULL,
	date_de_creation DATE NOT NULL
);