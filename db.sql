/*
use esercitazioni;
create table nazioni (
    id int primary key,
    nome VARCHAR(255)
);
create table account (
	email varchar(255) not null primary key, 
    password varchar(255) not null,
    image longblob null default null,
	nome varchar(255) not null,
    cognome varchar(255) not null,
    prefisso int not null,
    telefono varchar(255) not null,
    date date not null, 
    genere varchar(255) not null,
    comune varchar(255) not null,
    nazione int not null, 
    newsletter varchar(255) not null, 
    consenso varchar(255) not null, 
    foreign key (nazione) references nazioni(id)
);

create table eventi (
	id int auto_increment primary key,
    titolo varchar(255),
    artista varchar(255),
    image longblob
);

create table date_eventi (
	id int auto_increment primary key,
    data date,
    id_evento int,
    foreign key (id_evento) references eventi(id)
);

create table contest (
	id int auto_increment primary key,
    titolo varchar(255), 
    artista varchar(255), 
    image longblob
);

create table date_contest (
	id int auto_increment primary key,
    data date,
    id_contest int,
    foreign key (id_contest) references contest(id)
);

create table domande_contest(
	id int auto_increment primary key,
	contest int, 
    domanda varchar(255),
    foreign key (contest) references contest(id)
);

create table risposte_contest(
	id int auto_increment primary key,
    id_domanda int,
    risposta varchar(255),
    foreign key (id_domanda) references domande_contest(id)
);

create table risposte_contest_salvate(
	id int auto_increment primary key,
    email varchar(255),
    id_risposta int,
    foreign key (email) references account(email),
    foreign key (id_risposta) references risposte_contest(id)
);

create table contest_salvati (
	id int auto_increment primary key,
    email varchar(255),
    id_contest int, 
    data date,
    foreign key (email) references account(email),
    foreign key (id_contest) references contest(id)
);

create table eventi_salvati (
	id int auto_increment primary key,
    email varchar(255),
    id_evento int,
    data date,
    foreign key (email) references account(email),
    foreign key (id_evento) references eventi(id)
);

create table preferiti (
	id_preferito int auto_increment primary key,
	id varchar(255),
    email varchar(255), 
    content json,
    foreign key (email) references account(email)
);

INSERT INTO nazioni(id, nome) VALUES(1, 'Afghanistan');
INSERT INTO nazioni(id, nome) VALUES(2, 'Albania');
INSERT INTO nazioni(id, nome) VALUES(3, 'Algeria');
INSERT INTO nazioni(id, nome) VALUES(4, 'Andorra');
INSERT INTO nazioni(id, nome) VALUES(5, 'Angola');
INSERT INTO nazioni(id, nome) VALUES(6, 'Anguilla');
INSERT INTO nazioni(id, nome) VALUES(7, 'Antigua e Barbuda');
INSERT INTO nazioni(id, nome) VALUES(8, 'Antille Olandesi');
INSERT INTO nazioni(id, nome) VALUES(9, 'Arabia Saudita');
INSERT INTO nazioni(id, nome) VALUES(10, 'Argentina');
INSERT INTO nazioni(id, nome) VALUES(11, 'Armenia');
INSERT INTO nazioni(id, nome) VALUES(12, 'Aruba');
INSERT INTO nazioni(id, nome) VALUES(13, 'Australia');
INSERT INTO nazioni(id, nome) VALUES(14, 'Austria');
INSERT INTO nazioni(id, nome) VALUES(15, 'Azerbaigian');
INSERT INTO nazioni(id, nome) VALUES(16, 'Bahamas');
INSERT INTO nazioni(id, nome) VALUES(17, 'Bahrein');
INSERT INTO nazioni(id, nome) VALUES(18, 'Bangladesh');
INSERT INTO nazioni(id, nome) VALUES(19, 'Barbados');
INSERT INTO nazioni(id, nome) VALUES(20, 'Belgio');
INSERT INTO nazioni(id, nome) VALUES(21, 'Belize');
INSERT INTO nazioni(id, nome) VALUES(22, 'Benin');
INSERT INTO nazioni(id, nome) VALUES(23, 'Bermuda');
INSERT INTO nazioni(id, nome) VALUES(24, 'Bhutan');
INSERT INTO nazioni(id, nome) VALUES(25, 'Bielorussia');
INSERT INTO nazioni(id, nome) VALUES(26, 'Bolivia');
INSERT INTO nazioni(id, nome) VALUES(27, 'Bosnia-Erzegovina');
INSERT INTO nazioni(id, nome) VALUES(28, 'Botswana');
INSERT INTO nazioni(id, nome) VALUES(29, 'Bouvet, isola');
INSERT INTO nazioni(id, nome) VALUES(30, 'Brasile');
INSERT INTO nazioni(id, nome) VALUES(31, 'Brunei');
INSERT INTO nazioni(id, nome) VALUES(32, 'Bulgaria');
INSERT INTO nazioni(id, nome) VALUES(33, 'Burkina Faso');
INSERT INTO nazioni(id, nome) VALUES(34, 'Burundi');
INSERT INTO nazioni(id, nome) VALUES(35, 'Cambogia');
INSERT INTO nazioni(id, nome) VALUES(36, 'Camerun');
INSERT INTO nazioni(id, nome) VALUES(37, 'Canada');
INSERT INTO nazioni(id, nome) VALUES(38, 'Capo Verde');
INSERT INTO nazioni(id, nome) VALUES(39, 'Cayman, isole');
INSERT INTO nazioni(id, nome) VALUES(40, 'Ciad');
INSERT INTO nazioni(id, nome) VALUES(41, 'Cile');
INSERT INTO nazioni(id, nome) VALUES(42, 'Cina');
INSERT INTO nazioni(id, nome) VALUES(43, 'Cipro');
INSERT INTO nazioni(id, nome) VALUES(44, 'Cisgiordania');
INSERT INTO nazioni(id, nome) VALUES(45, 'Cocos, isole');
INSERT INTO nazioni(id, nome) VALUES(46, 'Colombia');
INSERT INTO nazioni(id, nome) VALUES(47, 'Comore');
INSERT INTO nazioni(id, nome) VALUES(48, 'Congo');
INSERT INTO nazioni(id, nome) VALUES(49, 'Congo, Repubblica Democratica del');
INSERT INTO nazioni(id, nome) VALUES(50, 'Cook, isole');
INSERT INTO nazioni(id, nome) VALUES(51, 'Corea del Nord');
INSERT INTO nazioni(id, nome) VALUES(52, 'Corea del Sud');
INSERT INTO nazioni(id, nome) VALUES(53, 'Costa d&#39;avorio');
INSERT INTO nazioni(id, nome) VALUES(54, 'Costa Rica');
INSERT INTO nazioni(id, nome) VALUES(55, 'Croazia');
INSERT INTO nazioni(id, nome) VALUES(56, 'Cuba');
INSERT INTO nazioni(id, nome) VALUES(57, 'Danimarca');
INSERT INTO nazioni(id, nome) VALUES(58, 'Dominica');
INSERT INTO nazioni(id, nome) VALUES(59, 'Ecuador');
INSERT INTO nazioni(id, nome) VALUES(60, 'Egitto');
INSERT INTO nazioni(id, nome) VALUES(61, 'El Salvador');
INSERT INTO nazioni(id, nome) VALUES(62, 'Emirati Arabi Uniti');
INSERT INTO nazioni(id, nome) VALUES(63, 'Eritrea');
INSERT INTO nazioni(id, nome) VALUES(64, 'Estonia');
INSERT INTO nazioni(id, nome) VALUES(65, 'Etiopia');
INSERT INTO nazioni(id, nome) VALUES(66, 'Faroe, isole');
INSERT INTO nazioni(id, nome) VALUES(67, 'Figi');
INSERT INTO nazioni(id, nome) VALUES(68, 'Filippine');
INSERT INTO nazioni(id, nome) VALUES(69, 'Finlandia');
INSERT INTO nazioni(id, nome) VALUES(70, 'Francia');
INSERT INTO nazioni(id, nome) VALUES(71, 'Gabon');
INSERT INTO nazioni(id, nome) VALUES(72, 'Gambia');
INSERT INTO nazioni(id, nome) VALUES(73, 'Georgia');
INSERT INTO nazioni(id, nome) VALUES(74, 'Georgia Meridionale e isole Sandwich del Sud');
INSERT INTO nazioni(id, nome) VALUES(75, 'Germania');
INSERT INTO nazioni(id, nome) VALUES(76, 'Ghana');
INSERT INTO nazioni(id, nome) VALUES(77, 'Giamaica');
INSERT INTO nazioni(id, nome) VALUES(78, 'Giappone');
INSERT INTO nazioni(id, nome) VALUES(79, 'Gibilterra');
INSERT INTO nazioni(id, nome) VALUES(80, 'Gibuti');
INSERT INTO nazioni(id, nome) VALUES(81, 'Giordania');
INSERT INTO nazioni(id, nome) VALUES(82, 'Grecia');
INSERT INTO nazioni(id, nome) VALUES(83, 'Grenada');
INSERT INTO nazioni(id, nome) VALUES(84, 'Groenlandia');
INSERT INTO nazioni(id, nome) VALUES(85, 'Guadalupa');
INSERT INTO nazioni(id, nome) VALUES(86, 'Guam');
INSERT INTO nazioni(id, nome) VALUES(87, 'Guatemala');
INSERT INTO nazioni(id, nome) VALUES(88, 'Guiana');
INSERT INTO nazioni(id, nome) VALUES(89, 'Guiana francese');
INSERT INTO nazioni(id, nome) VALUES(90, 'Guinea');
INSERT INTO nazioni(id, nome) VALUES(92, 'Guinea Equatoriale');
INSERT INTO nazioni(id, nome) VALUES(91, 'Guinea-Bissau');
INSERT INTO nazioni(id, nome) VALUES(93, 'Haiti');
INSERT INTO nazioni(id, nome) VALUES(94, 'Honduras');
INSERT INTO nazioni(id, nome) VALUES(95, 'Hong Kong');
INSERT INTO nazioni(id, nome) VALUES(96, 'India');
INSERT INTO nazioni(id, nome) VALUES(97, 'Indonesia');
INSERT INTO nazioni(id, nome) VALUES(98, 'Iran');
INSERT INTO nazioni(id, nome) VALUES(99, 'Iraq');
INSERT INTO nazioni(id, nome) VALUES(100, 'Irlanda');
INSERT INTO nazioni(id, nome) VALUES(101, 'Islanda');
INSERT INTO nazioni(id, nome) VALUES(102, 'Isole del Natale');
INSERT INTO nazioni(id, nome) VALUES(103, 'Isole Falkland (Isole Malvine)');
INSERT INTO nazioni(id, nome) VALUES(104, 'Isole Heard e McDonald');
INSERT INTO nazioni(id, nome) VALUES(105, 'Isole Pitcairn');
INSERT INTO nazioni(id, nome) VALUES(106, 'Isole Vergini britanniche');
INSERT INTO nazioni(id, nome) VALUES(107, 'Isole Vergini statunitensi');
INSERT INTO nazioni(id, nome) VALUES(108, 'Israele');
INSERT INTO nazioni(id, nome) VALUES(109, 'Italia');
INSERT INTO nazioni(id, nome) VALUES(110, 'Kazakistan');
INSERT INTO nazioni(id, nome) VALUES(111, 'Kenya');
INSERT INTO nazioni(id, nome) VALUES(112, 'Kirghizistan');
INSERT INTO nazioni(id, nome) VALUES(113, 'Kiribati');
INSERT INTO nazioni(id, nome) VALUES(114, 'Kuwait');
INSERT INTO nazioni(id, nome) VALUES(115, 'Laos');
INSERT INTO nazioni(id, nome) VALUES(116, 'Lesotho');
INSERT INTO nazioni(id, nome) VALUES(117, 'Lettonia');
INSERT INTO nazioni(id, nome) VALUES(118, 'Libano');
INSERT INTO nazioni(id, nome) VALUES(119, 'Liberia');
INSERT INTO nazioni(id, nome) VALUES(120, 'Libia');
INSERT INTO nazioni(id, nome) VALUES(121, 'Liechtenstein');
INSERT INTO nazioni(id, nome) VALUES(122, 'Lituania');
INSERT INTO nazioni(id, nome) VALUES(123, 'Lussemburgo');
INSERT INTO nazioni(id, nome) VALUES(124, 'Macao');
INSERT INTO nazioni(id, nome) VALUES(125, 'Macedonia, Ex Repubblica iugoslava di');
INSERT INTO nazioni(id, nome) VALUES(126, 'Madagascar');
INSERT INTO nazioni(id, nome) VALUES(127, 'Malawi');
INSERT INTO nazioni(id, nome) VALUES(128, 'Maldive');
INSERT INTO nazioni(id, nome) VALUES(129, 'Malesia');
INSERT INTO nazioni(id, nome) VALUES(130, 'Mali');
INSERT INTO nazioni(id, nome) VALUES(131, 'Malta');
INSERT INTO nazioni(id, nome) VALUES(132, 'Marianne Settentrionali, isole');
INSERT INTO nazioni(id, nome) VALUES(133, 'Marocco');
INSERT INTO nazioni(id, nome) VALUES(134, 'Marshall, isole');
INSERT INTO nazioni(id, nome) VALUES(135, 'Martinica');
INSERT INTO nazioni(id, nome) VALUES(136, 'Mauritania');
INSERT INTO nazioni(id, nome) VALUES(137, 'Mauritius');
INSERT INTO nazioni(id, nome) VALUES(138, 'Mayotte');
INSERT INTO nazioni(id, nome) VALUES(139, 'Messico');
INSERT INTO nazioni(id, nome) VALUES(140, 'Micronesia, Stati Federati della');
INSERT INTO nazioni(id, nome) VALUES(141, 'Moldavia');
INSERT INTO nazioni(id, nome) VALUES(142, 'Monaco');
INSERT INTO nazioni(id, nome) VALUES(143, 'Mongolia');
INSERT INTO nazioni(id, nome) VALUES(144, 'Montserrat');
INSERT INTO nazioni(id, nome) VALUES(145, 'Mozambico');
INSERT INTO nazioni(id, nome) VALUES(146, 'Myanmar');
INSERT INTO nazioni(id, nome) VALUES(147, 'Namibia');
INSERT INTO nazioni(id, nome) VALUES(148, 'Nauru');
INSERT INTO nazioni(id, nome) VALUES(149, 'Nepal');
INSERT INTO nazioni(id, nome) VALUES(150, 'Nicaragua');
INSERT INTO nazioni(id, nome) VALUES(151, 'Niger');
INSERT INTO nazioni(id, nome) VALUES(152, 'Nigeria');
INSERT INTO nazioni(id, nome) VALUES(153, 'Niue');
INSERT INTO nazioni(id, nome) VALUES(154, 'Norfolk, isola');
INSERT INTO nazioni(id, nome) VALUES(155, 'Norvegia');
INSERT INTO nazioni(id, nome) VALUES(156, 'Nuova Caledonia');
INSERT INTO nazioni(id, nome) VALUES(157, 'Nuova Zelanda');
INSERT INTO nazioni(id, nome) VALUES(158, 'Oman');
INSERT INTO nazioni(id, nome) VALUES(159, 'Paesi Bassi');
INSERT INTO nazioni(id, nome) VALUES(160, 'Pakistan');
INSERT INTO nazioni(id, nome) VALUES(161, 'Palau');
INSERT INTO nazioni(id, nome) VALUES(162, 'Panama');
INSERT INTO nazioni(id, nome) VALUES(163, 'Papua Nuova Guinea');
INSERT INTO nazioni(id, nome) VALUES(164, 'Paraguay');
INSERT INTO nazioni(id, nome) VALUES(165, 'Per&#249;');
INSERT INTO nazioni(id, nome) VALUES(166, 'Polinesia Francese');
INSERT INTO nazioni(id, nome) VALUES(167, 'Polonia');
INSERT INTO nazioni(id, nome) VALUES(168, 'Portogallo');
INSERT INTO nazioni(id, nome) VALUES(169, 'Portorico');
INSERT INTO nazioni(id, nome) VALUES(170, 'Qatar');
INSERT INTO nazioni(id, nome) VALUES(171, 'Regno Unito');
INSERT INTO nazioni(id, nome) VALUES(172, 'Repubblica Ceca');
INSERT INTO nazioni(id, nome) VALUES(173, 'Repubblica Centrafricana');
INSERT INTO nazioni(id, nome) VALUES(174, 'Repubblica Dominicana');
INSERT INTO nazioni(id, nome) VALUES(175, 'Riunione, isola di');
INSERT INTO nazioni(id, nome) VALUES(176, 'Romania');
INSERT INTO nazioni(id, nome) VALUES(177, 'Ruanda');
INSERT INTO nazioni(id, nome) VALUES(178, 'Russia');
INSERT INTO nazioni(id, nome) VALUES(179, 'Sahara occidentale');
INSERT INTO nazioni(id, nome) VALUES(180, 'Saint Kitts e Nevis');
INSERT INTO nazioni(id, nome) VALUES(182, 'Saint Vincent e Grenadine');
INSERT INTO nazioni(id, nome) VALUES(181, 'Saint-Pierre e Miquelon');
INSERT INTO nazioni(id, nome) VALUES(183, 'Salomone, isole');
INSERT INTO nazioni(id, nome) VALUES(184, 'Samoa');
INSERT INTO nazioni(id, nome) VALUES(185, 'Samoa Americane');
INSERT INTO nazioni(id, nome) VALUES(186, 'San Marino');
INSERT INTO nazioni(id, nome) VALUES(189, 'Sant&#39;Elena');
INSERT INTO nazioni(id, nome) VALUES(187, 'Santa Lucia');
INSERT INTO nazioni(id, nome) VALUES(188, 'Santa Sede (Citt&#224; del Vaticano)');
INSERT INTO nazioni(id, nome) VALUES(190, 'Sao Tom&#232; e Principe');
INSERT INTO nazioni(id, nome) VALUES(191, 'Senegal');
INSERT INTO nazioni(id, nome) VALUES(192, 'Serbia e Montenegro');
INSERT INTO nazioni(id, nome) VALUES(193, 'Seychelles');
INSERT INTO nazioni(id, nome) VALUES(194, 'Sierra Leone');
INSERT INTO nazioni(id, nome) VALUES(195, 'Singapore');
INSERT INTO nazioni(id, nome) VALUES(196, 'Siria');
INSERT INTO nazioni(id, nome) VALUES(197, 'Slovacchia');
INSERT INTO nazioni(id, nome) VALUES(198, 'Slovenia');
INSERT INTO nazioni(id, nome) VALUES(199, 'Somalia');
INSERT INTO nazioni(id, nome) VALUES(200, 'Spagna');
INSERT INTO nazioni(id, nome) VALUES(201, 'Sri Lanka');
INSERT INTO nazioni(id, nome) VALUES(202, 'Stati Uniti');
INSERT INTO nazioni(id, nome) VALUES(203, 'Striscia di Gaza');
INSERT INTO nazioni(id, nome) VALUES(204, 'Sudafrica');
INSERT INTO nazioni(id, nome) VALUES(205, 'Sudan');
INSERT INTO nazioni(id, nome) VALUES(206, 'Suriname');
INSERT INTO nazioni(id, nome) VALUES(207, 'Svalbard');
INSERT INTO nazioni(id, nome) VALUES(208, 'Svezia');
INSERT INTO nazioni(id, nome) VALUES(209, 'Svizzera');
INSERT INTO nazioni(id, nome) VALUES(210, 'Swaziland');
INSERT INTO nazioni(id, nome) VALUES(211, 'Tagikistan');
INSERT INTO nazioni(id, nome) VALUES(212, 'Tailandia');
INSERT INTO nazioni(id, nome) VALUES(213, 'Taiwan');
INSERT INTO nazioni(id, nome) VALUES(214, 'Tanzania');
INSERT INTO nazioni(id, nome) VALUES(215, 'Terre Australi e Antartiche Francesi');
INSERT INTO nazioni(id, nome) VALUES(216, 'Territori Britannici dell&#39;Oceano Indiano');
INSERT INTO nazioni(id, nome) VALUES(217, 'Timor Est');
INSERT INTO nazioni(id, nome) VALUES(218, 'Togo');
INSERT INTO nazioni(id, nome) VALUES(219, 'Tokelau');
INSERT INTO nazioni(id, nome) VALUES(220, 'Tonga');
INSERT INTO nazioni(id, nome) VALUES(221, 'Trinidad e Tobago');
INSERT INTO nazioni(id, nome) VALUES(222, 'Tunisia');
INSERT INTO nazioni(id, nome) VALUES(223, 'Turchia');
INSERT INTO nazioni(id, nome) VALUES(224, 'Turkmenistan');
INSERT INTO nazioni(id, nome) VALUES(225, 'Turks e Caicos');
INSERT INTO nazioni(id, nome) VALUES(226, 'Tuvalu');
INSERT INTO nazioni(id, nome) VALUES(227, 'Ucraina');
INSERT INTO nazioni(id, nome) VALUES(228, 'Uganda');
INSERT INTO nazioni(id, nome) VALUES(229, 'Ungheria');
INSERT INTO nazioni(id, nome) VALUES(230, 'Uruguay');
INSERT INTO nazioni(id, nome) VALUES(231, 'Uzbekistan');
INSERT INTO nazioni(id, nome) VALUES(232, 'Vanuatu');
INSERT INTO nazioni(id, nome) VALUES(233, 'Venezuela');
INSERT INTO nazioni(id, nome) VALUES(234, 'Vietnam');
INSERT INTO nazioni(id, nome) VALUES(235, 'Wallis e Futuna');
INSERT INTO nazioni(id, nome) VALUES(236, 'Yemen');
INSERT INTO nazioni(id, nome) VALUES(237, 'Zambia');
INSERT INTO nazioni(id, nome) VALUES(238, 'Zimbabwe');

INSERT INTO eventi (titolo, artista)
VALUES ('Concerto di rock', 'AC/DC'),
       ('Festival di musica classica', 'Orchestra Filarmonica'),
       ('Concorso di band emergenti', 'Varie');

INSERT INTO date_eventi (data, id_evento)
VALUES ('2024-10-25', 1),	
       ('2024-11-12', 2),
       ('2024-06-01', 3);

INSERT INTO contest (titolo, artista)
VALUES ('Concorso di canto', 'Solisti'),
       ('Gara di rap freestyle', 'Varie'),
       ('Festival musicale indie', 'Varie');

INSERT INTO date_contest (data, id_contest)
VALUES ('2024-07-30', 1),
       ('2024-09-20', 3);
INSERT INTO date_contest (data, id_contest)
VALUES ('2024-09-30', 1);

INSERT INTO domande_contest (contest, domanda)
VALUES
    (1, 'Qual è il tuo cantante preferito?'),
    (1, 'Qual è la tua canzone preferita da cantare?'),
    (1, 'Hai mai partecipato a un concorso di canto prima?'),
    
    (2, 'Chi è il tuo rapper preferito?'),
    (2, 'Qual è la tua esperienza nel rap?'),
    (2, 'Perché vuoi partecipare a questa gara?'),
    
    (3, 'Qual è il tuo artista indie preferito?'),
    (3, 'Quali strumenti suoni?'),
    (3, 'Hai mai partecipato a un festival musicale prima?');

INSERT INTO risposte_contest (id_domanda, risposta)
VALUES
    (1, 'Il mio cantante preferito è Freddie Mercury.'),
    (1, 'Adoro cantare "Bohemian Rhapsody".'),
    (1, 'Sì, ho partecipato a un concorso di canto l anno scorso.'),
    
    (2, 'Il mio cantante preferito è Adele.'),
    (2, 'La mia canzone preferita è "Someone Like You".'),
    (2, 'No, è la mia prima volta.'),
    
    (3, 'Il mio cantante preferito è Michael Jackson.'),
    (3, 'Mi piace cantare "Thriller".'),
    (3, 'Sì, ho vinto un concorso nella mia città.'),

    (4, 'Il mio rapper preferito è Eminem.'),
    (4, 'Rappo da 5 anni.'),
    (4, 'Perché amo il rap e voglio dimostrare il mio talento.'),
    
    (5, 'Il mio rapper preferito è Tupac.'),
    (5, 'Ho partecipato a diverse battaglie di freestyle.'),
    (5, 'Voglio far conoscere la mia musica.'),
    
    (6, 'Il mio rapper preferito è Jay-Z.'),
    (6, 'Ho pubblicato diverse tracce su SoundCloud.'),
    (6, 'Perché è una grande opportunità per crescere.'),
    
    (7, 'Il mio artista indie preferito è Bon Iver.'),
    (7, 'Suono la chitarra e il piano.'),
    (7, 'Sì, ho partecipato a un festival locale.'),
    
    (8, 'Il mio artista indie preferito è Tame Impala.'),
    (8, 'Suono la batteria.'),
    (8, 'No, sarà la mia prima volta.'),
    
    (9, 'Il mio artista indie preferito è Florence + The Machine.'),
    (9, 'Suono il basso.'),
    (9, 'Sì, ho partecipato a diversi festival.');
*/
/*
Nazioni (1) <---- (N) Account [nazione FK]
Account (1) <---- (N) Risposte Contest Salvate [email FK]
Account (1) <---- (N) Contest Salvati [email FK]
Account (1) <---- (N) Eventi Salvati [email FK]
Account (1) <---- (N) Preferiti [email FK]

Eventi (1) <---- (N) Date Eventi [id_evento FK]
Eventi (1) <---- (N) Eventi Salvati [id_evento FK]

Contest (1) <---- (N) Date Contest [id_contest FK]
Contest (1) <---- (N) Domande Contest [contest FK]
Contest (1) <---- (N) Contest Salvati [id_contest FK]

Domande Contest (1) <---- (N) Risposte Contest [id_domanda FK]
Risposte Contest (1) <---- (N) Risposte Contest Salvate [id_risposta FK]
*/
use esercitazioni;
select * from account;