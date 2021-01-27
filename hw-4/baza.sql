CREATE TABLE korisnici (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,
    lozinka VARCHAR(50) NOT NULL,
    je_admin BOOLEAN NOT NULL
);

INSERT INTO korisnici (ime, prezime, email, korisnicko_ime, lozinka, je_admin)
VALUES ("Admin", "Bo", "bo@gmail.com", "admin", "sifra", true);

SELECT * FROM korisnici;
DROP TABLE korisnici;

CREATE TABLE filmovi (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    naslov VARCHAR(200) NOT NULL,
	opis VARCHAR(1000) NOT NULL,
    zanr VARCHAR(100) NOT NULL,
    scenarista VARCHAR(200) NOT NULL,
    reziser VARCHAR(200) NOT NULL,
    prod_kuca VARCHAR(300) NOT NULL,
    glumci VARCHAR(1000) NOT NULL,
    godina INT NOT NULL,
    poster_path VARCHAR(300) NOT NULL,
    trajanje VARCHAR(100) NOT NULL
);

INSERT INTO filmovi (naslov, opis, zanr, scenarista, reziser, prod_kuca, glumci, godina, poster_path, trajanje)
VALUES ("Fight Club",
 "An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.",
 "Drama",
 "Jim Uhls",
 "David Fincher",
 "Fox 2000 Pictures (presents), New Regency Productions (presents), Linson Films, Atman Entertainment, Knickerbocker Films, Medusa Film (in collaboration with), Taurus Film",
 "Edward Norton, Brad Pitt, Meat Loaf, Zach Grenier, Richmond Arquette, David Andrews, George Maguire, Eugenie Bondurant, Helena Bonham Carter, Christina Cabot, Sydney Colston, Rachel Singer",
 1999,
 "slike/fightclub.jpg",
 "2h 19min");
 
INSERT INTO filmovi (naslov, opis, zanr, scenarista, reziser, prod_kuca, glumci, godina, poster_path, trajanje)
VALUES ("Inception",
 "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.",
 "Action, Adventure, Sci-Fi",
 "Christopher Nolan",
 "Christopher Nolan",
 "Warner Bros. (presentation), Legendary Entertainment (in association with), Syncopy",
 "Leonardo DiCaprio, Joseph Gordon-Levitt Elliot Page, Tom Hardy, Ken Watanabe, Dileep Rao, Cillian Murphy, Tom Berenger, Marion Cotillard, Pete Postlethwaite, Michael Caine, Lukas Haas",
 2010,
 "slike/inception.jpg",
 "2h 28min");
 
INSERT INTO filmovi (naslov, opis, zanr, scenarista, reziser, prod_kuca, glumci, godina, poster_path, trajanje)
VALUES ("Back to the Future",
 "Marty McFly, a 17-year-old high school student, is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his close friend, the eccentric scientist Doc Brown.",
 "Adventure, Comedy, Sci-Fi",
 "Robert Zemeckis, Bob Gale",
 "Robert Zemeckis",
 "Universal Pictures (A Robert Zemeckis Film), Amblin Entertainment, U-Drive Productions (uncredited)",
 "Michael J. Fox, Christopher Lloyd, Lea Thompson, Crispin Glover, Thomas F. Wilson, Claudia Wells, Marc McClure, Wendie Jo Sperber, George DiCenzo, Frances Lee McCain",
 1985,
 "slike/backToTheFuture.jpg",
 "1h 56min");

INSERT INTO filmovi (naslov, opis, zanr, scenarista, reziser, prod_kuca, glumci, godina, poster_path, trajanje)
VALUES ("Whiplash",
 "A promising young drummer enrolls at a cut-throat music conservatory where his dreams of greatness are mentored by an instructor who will stop at nothing to realize a student's potential.",
 "Drama, Music",
 "Damien Chazelle",
 "Damien Chazelle",
 "Bold Films (presents), Blumhouse Productions (as Blumhouse), Right of Way Films (as Right of Way), Sierra / Affinity",
 "Miles Teller, J.K. Simmons, Paul Reiser, Melissa Benoist, Austin Stowell, Nate Lang, Chris Mulkey, Damon Gupton, Suanne Spoke, Max Kasch",
 2014,
 "slike/whiplash.jpg",
 "1h 46min");
 
INSERT INTO filmovi (naslov, opis, zanr, scenarista, reziser, prod_kuca, glumci, godina, poster_path, trajanje)
VALUES ("The Prestige",
 "After a tragic accident, two stage magicians engage in a battle to create the ultimate illusion while sacrificing everything they have to outwit each other.",
 "Drama, Mystery, Sci-Fi",
 "Jonathan Nolan, Christopher Nolan",
 "Christopher Nolan",
 "Touchstone Pictures (presents), Warner Bros. (presents), Newmarket Productions (as Newmarket Films), Syncopy",
 "Hugh Jackman, Christian Bale, Michael Caine, Piper Perabo, Rebecca Hall, Scarlett Johansson, Samantha Mahurin, David Bowie, Andy Serkis",
 2006,
 "slike/prestige.jpg",
 "2h 10min");
 
SELECT * FROM filmovi;
DROP TABLE filmovi;
