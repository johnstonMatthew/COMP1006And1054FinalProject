CREATE DATABASE smoke;

CREATE TABLE useraccount (
    accountId INT NOT NULL AUTO_INCREMENT,
    accountName VARCHAR(150) NOT NULL,
    dateOfBirth DATE NOT NULL,
    email VARCHAR(50) NOT NULL,
    fName VARCHAR(50) NOT NULL,
    lName VARCHAR(100) NOT NULL,
    registerPass VARCHAR(100) NOT NULL,
    profilePicture VARCHAR(255) NOT NULL,
    PRIMARY KEY (accountId)
);

CREATE TABLE games (
    gameId INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    description VARCHAR(500) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    publishDate DATE NOT NULL,
    publisher VARCHAR(150) NOT NULL,
    coverImage VARCHAR(255) NOT NULL,
    PRIMARY KEY (gameId)
);

CREATE TABLE reviews (
    reviewId INT NOT NULL AUTO_INCREMENT,
    gameId INT NOT NULL,
    accountId INT NOT NULL,
    subject VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    rating int NOT NULL,
    reviewDate DATE NOT NULL,
    PRIMARY KEY (reviewId),
    FOREIGN KEY (gameId) REFERENCES games(gameId),
    FOREIGN KEY (accountId) REFERENCES userAccount(accountId)
);