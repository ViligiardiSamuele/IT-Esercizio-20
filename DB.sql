DROP database if exists esercizio20;
CREATE database esercizio20;
use esercizio20;

CREATE table Squadra (
	ID int auto_increment,
	nome varchar(20) not null,
	punti int default 0,
	primary key(ID)
);

CREATE table Partita (
	ID_squadraDiCasa int not null,
	ID_squadraOspite int not null,
	gool_squadraDiCasa int default 0,
	gool_squadraOspite int default 0,
	
	foreign key (ID_squadraDiCasa) references Squadra(ID),
	foreign key (ID_squadraOspite) references Squadra(ID),
	
	unique (ID_squadraDiCasa, ID_squadraOspite)
);

INSERT INTO Squadra (nome) values
("Squadra 1"), ("Squadra 2"), ("Squadra 3"), ("Squadra 4");

INSERT INTO Partita (ID_squadraDiCasa,ID_squadraOspite, gool_squadraDiCasa, gool_squadraOspite) values
(1,2,1,1), (2,1,2,3), (2,3,10,5), (1,3,4,6);