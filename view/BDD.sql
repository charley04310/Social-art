#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: MetaPost
#------------------------------------------------------------

CREATE TABLE MetaPost(
        Id_Com      Int  Auto_increment  NOT NULL ,
        Desc_Com    Varchar (255) NOT NULL ,
        Like_Com    Int NOT NULL ,
        Dislike_Com Int NOT NULL
	,CONSTRAINT MetaPost_PK PRIMARY KEY (Id_Com)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Roles
#------------------------------------------------------------

CREATE TABLE Roles(
        Id_Permission Int  Auto_increment  NOT NULL ,
        Type_Role     Varchar (255) NOT NULL
	,CONSTRAINT Roles_PK PRIMARY KEY (Id_Permission)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        Id_Users      Int  Auto_increment  NOT NULL ,
        Pseudo_Users  Varchar (50) NOT NULL ,
        Mdp_Users     Varchar (50) NOT NULL ,
        Bio_Users     Varchar (255) NOT NULL ,
        Date_Users    TimeStamp NOT NULL ,
        Natio_Users   Varchar (255) NOT NULL ,
        Email_Users   Varchar (255) NOT NULL ,
        Avatar_Users  Varchar (255) NOT NULL ,
        Img_Users     Varchar (255) NOT NULL ,
        Id_Permission Int NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (Id_Users)

	,CONSTRAINT Utilisateurs_Roles_FK FOREIGN KEY (Id_Permission) REFERENCES Roles(Id_Permission)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Postes
#------------------------------------------------------------

CREATE TABLE Postes(
        Id_Poste    Int  Auto_increment  NOT NULL ,
        Cat_Poste   Varchar (255) NOT NULL ,
        Date_Poste  TimeStamp NOT NULL ,
        Desc_Poste  Varchar (255) NOT NULL ,
        Nbr_Comment Int NOT NULL ,
        Nbr_Avis    Int NOT NULL ,
        Img_Poste   Varchar (255) NOT NULL ,
        Id_Users    Int NOT NULL
	,CONSTRAINT Postes_PK PRIMARY KEY (Id_Poste)

	,CONSTRAINT Postes_Utilisateurs_FK FOREIGN KEY (Id_Users) REFERENCES Utilisateurs(Id_Users)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avoir
#------------------------------------------------------------

CREATE TABLE Avoir(
        Id_Poste Int NOT NULL ,
        Id_Com   Int NOT NULL
	,CONSTRAINT Avoir_PK PRIMARY KEY (Id_Poste,Id_Com)

	,CONSTRAINT Avoir_Postes_FK FOREIGN KEY (Id_Poste) REFERENCES Postes(Id_Poste)
	,CONSTRAINT Avoir_MetaPost0_FK FOREIGN KEY (Id_Com) REFERENCES MetaPost(Id_Com)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Fournir
#------------------------------------------------------------

CREATE TABLE Fournir(
        Id_Com   Int NOT NULL ,
        Id_Users Int NOT NULL
	,CONSTRAINT Fournir_PK PRIMARY KEY (Id_Com,Id_Users)

	,CONSTRAINT Fournir_MetaPost_FK FOREIGN KEY (Id_Com) REFERENCES MetaPost(Id_Com)
	,CONSTRAINT Fournir_Utilisateurs0_FK FOREIGN KEY (Id_Users) REFERENCES Utilisateurs(Id_Users)
)ENGINE=InnoDB;

