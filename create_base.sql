CREATE TABLE 'Films'(
    'idFilm' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    'titre'  TEXT NOT NULL,
    'auteur' TEXT NOT NULL,
    'distributeur' TEXT,
    'duree' TEXT NOT NULL,
    'date' TEXT,
    'affiche' TEXT NOT NULL
);

CREATE TABLE 'Users' (
    'idUser' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    'nom' TEXT NOT NULL,
    'prenom' TEXT NOT NULL,
    'username' TEXT NOT NULL,
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
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Forrest Gump','Robert Zemeckis',null,'02:20:00', '1994-10-05', '/images/forrest.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('La ligne verte','Frank Darabont',null,'03:09:00', '2000-03-1', '/images/la_ligne_verte.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Les Evadés','Frank Darabont',null,'02:20:00', '1995-03-1', '/images/les_evades.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Your name','Makoto Shinkai',null,'01:50:00', '2016-12-28', '/images/your_name.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Tenet','Christopher Nolan',null,'02:30:00', '2020-08-26', '/images/tenet.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Gladiator','Ridley Scott',null,'02:35:00', '2000-08-20', '/images/gladiator.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Le Seigneur des Anneaux : Les Deux Tours','Peter Jackson','Warner Bros','02:59:00', '2002-12-18', '/images/LOTR2.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Le Seigneur des Anneaux : Le Retour du Roi','Peter Jackson','Warner Bros','03:21:00', '2003-12-17', '/images/LOTR3.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Matrix Reloaded','Lana Wachowski  Lilly Wachowski','Warner Bros','02:18:00', '2003-05-16', '/images/matrix2.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Matrix Revolutions','Lana Wachowski  Lilly Wachowski','Warner Bros','02:08:00', '2003-11-05', '/images/matrix3.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Pirates Des Caraïbes : La Malédiction du Black Pearl', 'Gore Verbinski', 'Buena Vista International','02:23:00', '2003-08-13', '/images/PDC1.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Pirates Des Caraïbes : Le Secret du Coffre Maudit', 'Gore Verbinski', 'Buena Vista International','02:31:00', '2006-08-02', '/images/PDC2.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Pirates Des Caraïbes : Jusqu'au bout du Monde', 'Gore Verbinski', 'Buena Vista International', '02:49:00', '2007-05-23', '/images/PDC3.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Pirates Des Caraïbes : La Fontaine de Jouvence', 'Rob Marshall', 'The Walt Disney Company France', '02:16:00', '2011-05-18', '/images/PDC4.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Pirates Des Caraïbes : La Vengeance de Salazar', 'Joachim Rønning  Espen Sandberg', 'The Walt Disney Company France', '02:09:00', '2017-05-24', '/images/PDC5.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode I - La Menace Fantôme', 'George Lucas', 'UFD', '02:13:00', '1999-10-13', '/images/SW1.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode II - L'attaque des Clones', 'George Lucas', 'UFD', '02:22:00', '2002-05-17', '/images/SW2.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode III - La Revanche des Sith', 'George Lucas', '20th Century Fox', '02:20:00', '2005-05-18', '/images/SW3.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode IV - Un Nouvel Espoir', 'George Lucas', null, '02:01:00', '1997-03-12', '/images/SW4.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode V - L'Empire contre attaque', 'George Lucas', null, '02:22:00', '1980-08-20', '/images/SW5.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars : Episode VI - Le Retour du Jedi', 'George Lucas', null, '02:13:00', '1997-04-23', '/images/SW6.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars - Le Réveil de la Force', 'J.J Abrams', 'The Walt Disney Company France', '02:15:00', '2015-12-16', '/images/SW7.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars - Les Derniers Jedi', 'Rian Johnson', 'The Walt Disney Company France', '02:32:00', '2017-12-13', '/images/SW8.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Star Wars - Le Réveil de la Force', 'J.J Abrams', 'The Walt Disney Company France', '02:22:00', '2019-12-18', '/images/SW9.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Blade Runner', 'Ridley Scott', 'Warner Bros', '01:57:00', '1982-09-15', '/images/BladeRunner.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Blade Runner 2049', 'Denis Villeneuve', 'Sony Pictures', '02:44:00', '2017-10-04', '/images/BladeRunner2049.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Fight Club', 'David Fincher', 'Splendor Films', '02:19:00', '1999-11-10', '/images/FightClub.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Tron L'héritage', 'Joseph Kosinski', 'Walt Disney', '02:06:00', '2011-02-09', '/images/Tron.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Zodiac', 'David Fincher', 'Warner Bros', '02:36:00', '2007-05-17', '/images/Zodiac.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Titanic', 'James Cameron', 'UFD', '03:14:00', '1998-01-07', '/images/Titanic.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('Inglorious Basterds', 'Quentin Tarantino', 'Universal Pictures', '02:33:00', '2009-08-19', '/images/IngloriousBasterds.jpg');
INSERT INTO Films (titre, auteur, distributeur, duree, date, affiche) VALUES ('2001 : L'Odyssée de L'Espace', 'Stanley Kubrick', 'Warner Bros', '02:21:00', '1968-09-27', '/images/2001.jpg');


INSERT INTO Users (nom, prenom, password, age) VALUES ("Larraufie","Tom","Tomy","123",20);
INSERT INTO Users (nom, prenom, password, age) VALUES ("Amouret","Robin","Rob","1234",21);
INSERT INTO Users (nom, prenom, password, age) VALUES ("Zhou","Kevin","Xx_Jean-KevinDarkLolMaster_xX","123",23);

INSERT INTO Listes (idUser,idFilm,date) VALUES (1,1,"01/01/01");
INSERT INTO Listes (idUser,idFilm,date) VALUES (2,1,"05/01/01");
