create database heraf ;

use heraf;

create table clients(
id INT AUTO_INCREMENT PRIMARY KEY ,
first_name 	VARCHAR(255),
last_name VARCHAR(225),
email VARCHAR(255),
pass_word VARCHAR(225),
country VARCHAR(225),
governorate VARCHAR(225),
photo VARCHAR(225),
phone VARCHAR(225)
);

create table employer(
id INT AUTO_INCREMENT PRIMARY KEY ,
first_name 	VARCHAR(255),
last_name VARCHAR(225),
email VARCHAR(255),
pass_word VARCHAR(225),
country VARCHAR(225),
governorate VARCHAR(225),
photo VARCHAR(225),
phone VARCHAR(225),
elherfa VARCHAR(225),
about VARCHAR(225)
);

create table review (
id INT AUTO_INCREMENT PRIMARY KEY ,
employer_id INT ,
review VARCHAR(1024),
rate INT,
client_id INT ,
FOREIGN KEY (client_id) REFERENCES clients(id),
FOREIGN KEY (employer_id) REFERENCES employer(id)
);

create table skills(
id INT AUTO_INCREMENT PRIMARY KEY,
employer_id INT ,
skill VARCHAR(255),
FOREIGN KEY (employer_id) REFERENCES employer(id)
);

create table projects(
id INT AUTO_INCREMENT PRIMARY KEY,
employer_id INT ,
project_name VARCHAR(225),
photo VARCHAR(225),
details VARCHAR(1024),
FOREIGN KEY (employer_id) REFERENCES employer(id)
);







