Create Database if not exists aspergerforum;
use aspergerforum;
create table IF NOT EXISTS user(
UserID int AUTO_INCREMENT NOT NULL,
Name varchar(40) NOT NULL,
Vorname varchar(40) NOT NULL,
Username varchar(40) NOT NULL,
Passwort varchar(21) NOT NULL,
Administrator boolean DEFAULT true,
PRIMARY KEY (UserID)
)
ENGINE=InnoDB;

create table IF NOT EXISTS kommentar(
KommentarID int AUTO_INCREMENT NOT NULL,
Kommentar blob NOT NULL,
Datum timestamp NOT NULL,
UserID int,
Username varchar(40),
PRIMARY KEY (KommentarID),
FOREIGN KEY (UserID) REFERENCES user(UserID)
)
ENGINE=InnoDB;

create table IF NOT EXISTS posts(
PostID int AUTO_INCREMENT NOT NULL,
Post blob NOT NULL,
Datum timestamp NOT NULL,
UserID int,
Username varchar(40),
PRIMARY KEY (PostID),
FOREIGN KEY (UserID) REFERENCES user(UserID)
)
ENGINE=InnoDB;

create table IF NOT EXISTS postKommentare(
PKommentarID int AUTO_INCREMENT NOT NULL,
PKommentar blob NOT NULL,
KommentiertAuf varchar(40) NOT NULL,
Datum timestamp NOT NULL,
UserID int,
Username varchar(40),
PRIMARY KEY (PKommentarID),
FOREIGN KEY (UserID) REFERENCES user(UserID)
)
ENGINE=InnoDB;

create table IF NOT EXISTS musicplayer(
songID int AUTO_INCREMENT NOT NULL,
song varchar(100) NOT NULL,
album varchar(100) NOT NULL,
interpret varchar(50) NOT NULL,
url varchar(400) NOT NULL,
PRIMARY KEY (songID)
)
ENGINE=InnoDB;

create table IF NOT EXISTS Infos(
InfoID int AUTO_INCREMENT NOT NULL,
Titel varchar(50) NOT NULL,
Info blob NOT NULL,
Datum timestamp NOT NULL,
UserID int,
Username varchar(40),
PRIMARY KEY (InfoID),
FOREIGN KEY (UserID) REFERENCES user(UserID)
)
ENGINE=InnoDB;
