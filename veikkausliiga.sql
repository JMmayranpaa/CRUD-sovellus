

DROP DATABASE IF EXISTS veikkausliiga;
CREATE DATABASE veikkausliiga DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE veikkausliiga;
DROP TABLE IF EXISTS sarjataulukko;
CREATE TABLE sarjataulukko (
    id int(10) auto_increment,
    joukkue text NOT NULL,
    ottelut int(10) unsigned NOT NULL,
    voitot int(10) unsigned NOT NULL,
    tasapelit int(10) unsigned NOT NULL,
    tappiot int(10) unsigned NOT NULL,
    pisteet int(10) unsigned NOT NULL,
    PRIMARY KEY (id)
);
USE veikkausliiga;
DROP TABLE IF EXISTS tunnukset;
CREATE TABLE tunnukset (
    id int(10) auto_increment,
    tunnus text NOT NULL,
    salasana text NOT NULL,
    PRIMARY KEY (id)
);

/*<!--Lähteet: Arto Väätäinen-->
<!--Koodit on uudelleen kirjoittetu demoista.-->*/