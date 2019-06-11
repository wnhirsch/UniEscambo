INSERT INTO Student (name, nickname, password, mail)
VALUES ("Wellington", "well", "123", "well@inf.br");
INSERT INTO Student (name, nickname, password, mail)
VALUES ("Astelio Jose", "teo", "123", "teo@inf.br");

INSERT INTO University (id, name)
VALUES (1, "UFRGS");
INSERT INTO University (id, name)
VALUES (2, "UFSCPA");

INSERT INTO Program (id, name)
VALUES (1, "Engenharia");
INSERT INTO Program (id, name)
VALUES (2, "Computacao");

INSERT INTO Course (id, name)
VALUES (1, "Calculo 1");
INSERT INTO Course (id, name)
VALUES (2, "Calculo 2");


INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Prova 1 de Calculo 1", "Gente, vai cair limites e derivada entao estudem muito.", CURRENT_DATE(), 'well', 1, 1, 1);
INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Prova 2 de Calculo 2", "E a area mais dificil da cadeira entao se esforcem para irem bem. Vai cair Integral tripla e suas lagrimas", CURRENT_DATE(), 'well', 2, 1, 2);
INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Limites e Derivadas", "Bom, tudo bem gente, pretendo explicar sobre Limites e Derivadas e a sua relacao entre eles porque e uma materia muito importante.", CURRENT_DATE(), 'teo', 1, 2, 1);
INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Prova 2 de Calculo 1", "Dessa vez piora porque vai cair Integral que é muito mais dificil", CURRENT_DATE(), 'well', 1, 1, 1);
INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Prova 3 de Calculo 2", "Levanta as maos pro céu e agradece porque essa prova é a mais facil do mundoooo.", CURRENT_DATE(), 'well', 2, 1, 2);
INSERT INTO Material (title, info, publish, student, university, program, course)
VALUES ("Integral Tripla", "Bom, tudo bem gente, pretendo explicar sobre Integral Tripla e a sua utilidade na área da Engenharia.", CURRENT_DATE(), 'teo', 1, 2, 1);