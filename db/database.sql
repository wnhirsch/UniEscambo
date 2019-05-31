CREATE DATABASE UNIESCAMBO;

CREATE TABLE University(
	id VARCHAR(8) NOT NULL,
	name VARCHAR(100) NOT NULL,
	link VARCHAR(100), # Can be a link to the website of this University  
	about VARCHAR(500), # Little text with a description of this University
	address VARCHAR(200),
	photo BINARY,

	PRIMARY KEY (id)
);

CREATE TABLE Program(
	id VARCHAR(8) NOT NULL,
	name VARCHAR(100) NOT NULL,
	about VARCHAR(500), # Little text with a description of this Program

	PRIMARY KEY (id)
);

CREATE TABLE Course(
	id VARCHAR(8) NOT NULL,
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
	university VARCHAR(8), # This Student studies in an University
	program VARCHAR(8),  # This Student belongs to a Program
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
	course VARCHAR(8) NOT NULL,

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
	id VARCHAR(16) NOT NULL,
	title VARCHAR(100) NOT NULL,
	info TEXT NOT NULL,
	university VARCHAR(8),
	program VARCHAR(8),
	course VARCHAR(8),

	PRIMARY KEY (id),
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
	material VARCHAR(16) NOT NULL,
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
	id VARCHAR(4) NOT NULL,
	material VARCHAR(16) NOT NULL,
	file BINARY NOT NULL,
	
	PRIMARY KEY (id, material),
	FOREIGN KEY (material) REFERENCES Material (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);