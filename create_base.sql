CREATE TABLE 'Films'(
    'idFilm' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    'titre'  TEXT NOT NULL,
    'auteur' TEXT NOT NULL,
    'distributeur' TEXT NOT NULL,
    'duree' TEXT NOT NULL,
    'date' TEXT,
    'affiche' TEXT NOT NULL
);

CREATE TABLE 'Users' (
    'idUser' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    'nom' TEXT NOT NULL,
    'prenom' TEXT NOT NULL,
    'password' TEXT NOT NULL,
    'age' INTEGER NOT NULL
);

CREATE TABLE 'Listes' (
    'idUser' INTEGER NOT NULL,
    'idFilm' INTEGER NOT NULL,
    'date' TEXT NOT NULL

    -- CONSTRAINT PK_Listes PRIMARY KEY ('idUser','idFilm'),

    -- CONSTRAINT FK_IDUSER FOREIGN KEY ('idUser') REFERENCES Listes('idUser'),
    -- CONSTRAINT FK_IDFILM FOREIGN KEY ('idFilm') REFERENCES Films('idFilm')
   
);



INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Le Dernier Samourai','Edward Zwick','Warner Bros','02:24:00', '2004-01-14', '/images/dernierSamourai.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Matrix','Lana Wachowski  Lilly Wachowski','Warner Bros','02:15:00', '1999-05-24', '/images/matrix.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Le Seigneur des Anneaux : La Communauté de l"anneau','Peter Jackson','Warner Bros','02:58:00', '2001-12-19', '/images/sda1.jpg');

INSERT INTO Users (nom, prenom, password, age) VALUES ("Larraufie","Tom","123",20);
INSERT INTO Users (nom, prenom, password, age) VALUES ("Amouret","Robin","1234",21);
INSERT INTO Users (nom, prenom, password, age) VALUES ("Zhou","Kevin","123",23);

INSERT INTO Listes (idUser,idFilm,date) VALUES (1,1,"01/01/01");
INSERT INTO Listes (idUser,idFilm,date) VALUES (2,1,"05/01/01");
