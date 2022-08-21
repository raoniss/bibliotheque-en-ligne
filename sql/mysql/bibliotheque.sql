
--ADMINISTRATEUR
CREATE TABLE Administrators(
    id SMALLINT AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name VARCHAR(230) NOT NULL,
    first_name VARCHAR(230) NOT NULL,
    email VARCHAR(230) NOT NULL,
    password VARCHAR(62) NOT NULL,
    super  ENUM('true','false') default 'false' NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_administrators_uuid UNIQUE(uuid),
    CONSTRAINT u_administrators_email UNIQUE(email)
    

) engine = innodb default charset utf8;

--LECTEUR
CREATE TABLE Readers(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name VARCHAR(230) NOT NULL,
    first_name VARCHAR(230) NOT NULL,
    email VARCHAR(230) NOT NULL,
    password VARCHAR(62) NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_readers_uuid UNIQUE(uuid),
    CONSTRAINT u_readers_email UNIQUE(email)
    
) engine = innodb default charset utf8;

--RESERVATION 
CREATE TABLE Reservations(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    reader bigint NOT NULL,
    books longtext not null,
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_reservations_uuid UNIQUE(uuid),
    CONSTRAINT fk_reservations_readers FOREIGN KEY(reader) REFERENCES readers(id)

) engine = innodb default charset utf8;

--CATEGORIE
CREATE TABLE Categories(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL, -- description 
    author SMALLINT not null,
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_books_uuid UNIQUE(uuid),
    CONSTRAINT u_categories_name UNIQUE(name),
    CONSTRAINT fk_categories_administrators FOREIGN KEY(author) REFERENCES Administrators(id)

) engine = innodb default charset utf8;  

--LECTEUR
CREATE TABLE Writers(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name VARCHAR(255) NOT NULL,
    story TEXT NOT NULL, -- description 
    author SMALLINT not null,
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_books_uuid UNIQUE(uuid),
    CONSTRAINT u_books_name UNIQUE(name),
    CONSTRAINT fk_writers_administrators FOREIGN KEY(author) REFERENCES Administrators(id)


) engine = innodb default charset utf8;  

--FICHIER
CREATE TABLE  Files(
    id BIGINT auto_increment NOT null,
    uuid varchar(255) not null,
    type ENUM ('document') not null,
    extension varchar(10) not null,
    size bigint not null,
    name varchar(160) not null,
    author SMALLINT not null,
    created_at datetime default now(),
    PRIMARY KEY(id),
    CONSTRAINT files_uuid UNIQUE(uuid),
    CONSTRAINT fk_files_administrators FOREIGN KEY(author) REFERENCES Administrators(id)

)engine = innodb default charset utf8;



-- OUVRAGE

CREATE TABLE Books(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name VARCHAR(255) NOT NULL,
    resume TEXT NOT NULL, 
    writer BIGINT NOT NULL,
    category bigint NOT NULL, 
    author SMALLINT NOT NULL, 
    file bigint not null, 
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_books_uuid UNIQUE(uuid),
    CONSTRAINT u_books_name UNIQUE(name),
    CONSTRAINT fk_books_files FOREIGN KEY(file) REFERENCES Files(id),
    CONSTRAINT fk_books_writers FOREIGN KEY(writer) REFERENCES Writers(id),
    CONSTRAINT fk_books_administrators FOREIGN KEY(author) REFERENCES Administrators(id),
    CONSTRAINT fk_books_categories FOREIGN KEY(category) REFERENCES Categories(id)


) engine = innodb default charset utf8;   



-- CATEGORIE D ABONNEMENT --
CREATE TABLE Subscription_categories(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    name varchar(150) not null,
    author SMALLINT NOT NULL, -- celui qui realise l'action
    labelle bigint not null,
    day_expire INT not null,
    created_at DATETIME DEFAULT NOW(),
    update_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_subscription_categorie_name UNIQUE(name)
    
) engine = innodb default charset utf8;

--ABONNEMENT 
CREATE TABLE Subscriptions(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    reader bigint NOT NULL,
    author SMALLINT NOT NULL, -- celui qui realise l'action
    subscription bigint not null,
    expires_at DATETIME DEFAULT NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_subscription_uuid UNIQUE(uuid),
    CONSTRAINT fk_subscription_administrators FOREIGN KEY(author) REFERENCES Administrators(id),
    CONSTRAINT fk_subscription_readers FOREIGN KEY(reader) REFERENCES Readers(id),
    CONSTRAINT fk_subscription_categorie FOREIGN KEY(subscription) REFERENCES Subscription_categories(id)

) engine = innodb default charset utf8;


-- EMPRUNT
CREATE TABLE Loans(
    id bigint AUTO_INCREMENT NOT NULL,
    uuid VARCHAR(38) NOT NULL,
    reader BIGINT NOT NULL,
    books longtext not null,
    author SMALLINT NOT NULL, -- celui qui realise l'action
    returned ENUM('true','false') NOT NULL,
    returned_at DATETIME DEFAULT NULL,
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    CONSTRAINT u_loans_uuid UNIQUE(uuid),
    CONSTRAINT fk_loans_administrators FOREIGN KEY(author) REFERENCES Administrators(id),
    CONSTRAINT fk_loans_reader UNIQUE(reader) REFERENCES Readers(id)

) engine = innodb default charset utf8;