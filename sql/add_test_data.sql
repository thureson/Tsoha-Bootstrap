INSERT INTO Puolue (id, puolue, kuvaus) VALUES (1, 'Kokoomus', 'Suomen perinteinen oikeistopuolue.');
INSERT INTO Puolue (id, puolue, kuvaus) VALUES (2, 'SDP', 'Suomen perinteinen vasemmistopuolue.');
INSERT INTO Puolue (id, puolue, kuvaus) VALUES (3, 'Vihreät', 'Eritoten pääkaupunkiseudulla vaikuttava ympäristöpuolue.');
INSERT INTO Puolue (id, puolue, kuvaus) VALUES (4, 'Piraattipuolue', 'Hiton käpistelijät.');
INSERT INTO Kayttaja (id, tunnus) VALUES (1, 'Tom');
INSERT INTO Ehdokas (id, nimi, kuvaus, puolue_id) VALUES (1, 'Sauli Niinistö', 'Presidentti', 1);
INSERT INTO Historia (id, ehdokas_id, aanimaara, vuosi) VALUES (1, 1, 2000000, 2012);
INSERT INTO Salasana (id, salasana, kayttaja_id) VALUES (1, 'test', 1);
