CREATE DATABASE UNIESCAMBO CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE University(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	link VARCHAR(100), # Can be a link to the website of this University  
	about VARCHAR(500), # Little text with a description of this University
	address VARCHAR(200),
	photo BINARY,

	PRIMARY KEY (id)
);

CREATE TABLE Program(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	about VARCHAR(500), # Little text with a description of this Program

	PRIMARY KEY (id)
);

CREATE TABLE Course(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	about VARCHAR(500), # Little text with a description of this Course

	PRIMARY KEY (id)
);

CREATE TABLE Student(
	name VARCHAR(100) NOT NULL,
	nickname VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	mail VARCHAR(50) NOT NULL,
	link VARCHAR(100), # Can be a link to the website of this Student  
	about VARCHAR(500), # Little text with a description of this Student
	university INT, # This Student studies in an University
	program INT,  # This Student belongs to a Program
	photo BINARY,

	PRIMARY KEY (nickname, mail),
	FOREIGN KEY (university) REFERENCES University (id)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY (program) REFERENCES Program (id)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
);

# It's a relationship between a Student and a Course
CREATE TABLE Student_Course(
	student VARCHAR(20) NOT NULL,
	course INT NOT NULL,

	PRIMARY KEY (student, course),
	FOREIGN KEY (student) REFERENCES Student (nickname)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (course) REFERENCES Course (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

# User who takes care of this database
CREATE TABLE Admin(
	name VARCHAR(100) NOT NULL,
	nickname VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	mail VARCHAR(50) NOT NULL,
	photo BINARY,

	PRIMARY KEY (nickname)
);

# Material with Text and/or Files containing information about a Course
CREATE TABLE Material(
	id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(100) NOT NULL,
	info TEXT NOT NULL,
	publish DATETIME NOT NULL,
	student VARCHAR(20),
	university INT,
	program INT,
	course INT,
	
	PRIMARY KEY (id),
	FOREIGN KEY (student) REFERENCES Student (nickname)
	ON DELETE SET NULL
	ON UPDATE CASCADE,
	FOREIGN KEY (university) REFERENCES University (id)
	ON DELETE SET NULL
	ON UPDATE CASCADE,
	FOREIGN KEY (program) REFERENCES Program (id)
	ON DELETE SET NULL
	ON UPDATE CASCADE,
	FOREIGN KEY (course) REFERENCES Course (id)
	ON DELETE SET NULL
	ON UPDATE CASCADE
);

# It's a relationship between a Student and a Material
CREATE TABLE Material_Student(
	material INT NOT NULL,
	student VARCHAR(20) NOT NULL,
	feedback BOOLEAN,
	comment TEXT,

	PRIMARY KEY (material, student),
	FOREIGN KEY (material) REFERENCES Material (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (student) REFERENCES Student (nickname)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

# A File that belongs to a Material
CREATE TABLE File(
	id INT NOT NULL AUTO_INCREMENT,
	material INT NOT NULL,
	file BINARY NOT NULL,
	
	PRIMARY KEY (id, material),
	FOREIGN KEY (material) REFERENCES Material (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);