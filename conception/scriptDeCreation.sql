#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: p7urG_roles
#------------------------------------------------------------

CREATE TABLE p7urG_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_articles
#------------------------------------------------------------

CREATE TABLE p7urG_articles(
        id              Int  Auto_increment  NOT NULL ,
        content         Text NOT NULL ,
        pictures        Varchar (20) NOT NULL ,
        title           Varchar (20) NOT NULL ,
        publicationDate Datetime NOT NULL
	,CONSTRAINT articles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_users
#------------------------------------------------------------

CREATE TABLE p7urG_users(
        id             Int  Auto_increment  NOT NULL ,
        username       Varchar (15) NOT NULL ,
        mail           Varchar (100) NOT NULL ,
        password       Varchar (255) NOT NULL ,
        phone          Varchar (15) ,
        birthdate      Date ,
        id_roles Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_roles_FK FOREIGN KEY (id_roles) REFERENCES p7urG_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_comments
#------------------------------------------------------------

CREATE TABLE p7urG_comments(
        id                Int  Auto_increment  NOT NULL ,
        note              Float NOT NULL ,
        content           Text NOT NULL ,
        publicationDate   Datetime NOT NULL ,
        id_articles Int NOT NULL ,
        id_users    Int NOT NULL
	,CONSTRAINT comments_PK PRIMARY KEY (id)

	,CONSTRAINT comments_articles_FK FOREIGN KEY (id_articles) REFERENCES p7urG_articles(id)
	,CONSTRAINT comments_users_FK FOREIGN KEY (id_users) REFERENCES p7urG_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_categories
#------------------------------------------------------------

CREATE TABLE p7urG_categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_countries
#------------------------------------------------------------

CREATE TABLE p7urG_countries(
        id      Int  Auto_increment  NOT NULL ,
        region  Varchar (20) NOT NULL ,
        country Varchar (20) NOT NULL ,
        city    Varchar (20) NOT NULL
	,CONSTRAINT countries_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_favoritesArticles
#------------------------------------------------------------

CREATE TABLE p7urG_favoritesArticles(
        id_articles             Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT favoritesArticles_PK PRIMARY KEY (id_articles,id_users)

	,CONSTRAINT favoritesArticles_articles_FK FOREIGN KEY (id_articles) REFERENCES p7urG_articles(id)
	,CONSTRAINT favoritesArticles_users_FK FOREIGN KEY (id_users) REFERENCES p7urG_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_articlesHavecategories
#------------------------------------------------------------

CREATE TABLE p7urG_articlesHavecategories(
        id_articles                  Int NOT NULL ,
        id_categories Int NOT NULL
	,CONSTRAINT articlesHavecategories_PK PRIMARY KEY (id_articles,id_categories)

	,CONSTRAINT articlesHavecategories_articles_FK FOREIGN KEY (id_articles) REFERENCES p7urG_articles(id)
	,CONSTRAINT articlesHavecategories_categories_FK FOREIGN KEY (id_categories) REFERENCES p7urG_categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_favoritesPlaces
#------------------------------------------------------------

CREATE TABLE p7urG_favoritesPlaces(
        id_users                 Int NOT NULL ,
        id_countries Int NOT NULL
	,CONSTRAINT favoritesPlaces_PK PRIMARY KEY (id_users,id_countries)

	,CONSTRAINT favoritesPlaces_users_FK FOREIGN KEY (id_users) REFERENCES p7urG_users(id)
	,CONSTRAINT favoritesPlaces_countries_FK FOREIGN KEY (id_countries) REFERENCES p7urG_countries(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_articlesConcernCountries
#------------------------------------------------------------

CREATE TABLE p7urG_articlesConcernCountries(
        id_countries                Int NOT NULL ,
        id_articles Int NOT NULL
	,CONSTRAINT articlesConcernCountries_PK PRIMARY KEY (id_countries,id_articles)

	,CONSTRAINT articlesConcernCountries_countries_FK FOREIGN KEY (id_countries) REFERENCES p7urG_countries(id)
	,CONSTRAINT articlesConcernCountries_articles_FK FOREIGN KEY (id_articles) REFERENCES p7urG_articles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: p7urG_bookmarksArticles
#------------------------------------------------------------

CREATE TABLE p7urG_bookmarksArticles(
        id_articles            Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT bookmarksArticles_PK PRIMARY KEY (id_articles,id_users)

	,CONSTRAINT bookmarksArticles_articles_FK FOREIGN KEY (id_articles) REFERENCES p7urG_articles(id)
	,CONSTRAINT bookmarksArticles_users_FK FOREIGN KEY (id_users) REFERENCES p7urG_users(id)
)ENGINE=InnoDB;

