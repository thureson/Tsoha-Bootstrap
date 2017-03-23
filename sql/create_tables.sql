CREATE TABLE Puolue (
  id INTEGER PRIMARY KEY,
  puolue varchar(50) NOT NULL,
  kuvaus varchar(150)
);

CREATE TABLE Kayttaja (
  id INTEGER PRIMARY KEY,
  tunnus varchar(50) NOT NULL
);

CREATE TABLE Ehdokas (
  id INTEGER PRIMARY KEY,
  nimi varchar(50) NOT NULL,
  kuvaus varchar(150) NOT NULL,
  puolue_id INTEGER REFERENCES Puolue(id)
);

CREATE TABLE Historia (
  id INTEGER PRIMARY KEY,
  ehdokas_id INTEGER REFERENCES Ehdokas(id),
  aanimaara INTEGER,
  vuosi INTEGER
);

CREATE TABLE Salasana (
  id INTEGER PRIMARY KEY,
  salasana varchar(50) NOT NULL,
  kayttaja_id INTEGER REFERENCES Kayttaja(id)
);