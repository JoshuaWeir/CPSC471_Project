
--
-- Database: `BookStore`
--

DROP DATABASE IF EXISTS BookStore;
CREATE DATABASE BookStore; 
USE BookStore;

-- --------------------------------------------------------
--
-- Table structure for table Admin
--

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
    ID int NOT NULL,
    Username VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Password VARCHAR(10) NOT NULL,
    Name VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    BirthDate DATE NOT NULL,
    PRIMARY KEY (ID)
);

--
-- Table structure for table RegisteredUser
--

DROP TABLE IF EXISTS RegisteredUser;
CREATE TABLE RegisteredUser (
    ID int NOT NULL,
    Username VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Password VARCHAR(10) NOT NULL,
    Name VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    BirthDate DATE NOT NULL,
    Points int NOT NULL,
    CardNum VARCHAR(16) DEFAULT NULL,
    CardName VARCHAR(50) DEFAULT NULL,
    ExpireDate VARCHAR(5) DEFAULT NULL,
    AdminID int NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY(AdminID) REFERENCES Admin(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table Publisher
--

DROP TABLE IF EXISTS Publisher;
CREATE TABLE Publisher (
    Name VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    ContactInfo VARCHAR(30) NOT NULL,
    PRIMARY KEY (Name)
);

--
-- Table structure for table Author
--

DROP TABLE IF EXISTS Author;
CREATE TABLE Author (
    Name VARCHAR(50) NOT NULL,
    BirthDate DATE NOT NULL,
    ShortBio VARCHAR(100) NOT NULL,
    PRIMARY KEY (Name)
);

--
-- Table structure for table Book
--
DROP TABLE IF EXISTS Book;
CREATE TABLE Book (
    ID int NOT NULL,
    AdminID int NOT NULL,
    PublisherName VARCHAR(50) NOT NULL,
    AuthorName VARCHAR(50) NOT NULL,
    ISBN int NOT NULL,
    ReleaseDate DATE NOT NULL,
    InventoryDate DATE NOT NULL,
    Price FLOAT NOT NULL,
    Title VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(Admin ID) REFERENCES Admin(ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(PublisherName) REFERENCES Publisher(Name) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(AuthorName) REFERENCES Author(Name) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table HistoryBook
--

DROP TABLE IF EXISTS HistoryBook;
CREATE TABLE HistoryBook (
    ID int NOT NULL,
    Era VARCHAR(30) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table FantasyBook
--

DROP TABLE IF EXISTS FantasyBook;
CREATE TABLE FantasyBook (
    ID int NOT NULL,
    Theme VARCHAR(30) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table SciFiBook
--

DROP TABLE IF EXISTS SciFiBook;
CREATE TABLE SciFiBook (
    ID int NOT NULL,
    Theme VARCHAR(30) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table OtherBook
--

DROP TABLE IF EXISTS OtherBook;
CREATE TABLE OtherBook (
    ID int NOT NULL,
    Genre VARCHAR(30) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table PurchaseOrder
--

DROP TABLE IF EXISTS PurchaseOrder;
CREATE TABLE PurchaseOrder (
    ID int NOT NULL,
    UserID int NOT NULL,
    Price int NOT NULL,
    Address VARCHAR(50) NOT NULL,
    RegUserFlag BOOLEAN NOT NULL,
    PRIMARY KEY (ID, UserID),
    FOREIGN KEY (UserID) REFERENCES RegisteredUser(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table ReturnOrder
--

DROP TABLE IF EXISTS ReturnOrder;
CREATE TABLE ReturnOrder (
    ID int NOT NULL,
    UserID int NOT NULL,
    Price int NOT NULL,
    RegUserFlag BOOLEAN NOT NULL,
    CreditValue int NOT NULL,
    CreditID int NOT NULL,
    PRIMARY KEY (ID, UserID, CreditID),
    FOREIGN KEY (UserID) REFERENCES RegisteredUser(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table Returned
--

DROP TABLE IF EXISTS Returned;
CREATE TABLE Returned (
    ID int NOT NULL,
    RO_ID int NOT NULL,
    UserID int NOT NULL,
    CreditID int NOT NULL,
    ReturnDate DATE NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID, RO_ID, CreditID) REFERENCES ReturnOrder(UserID, ID, CreditID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table Sold
--

DROP TABLE IF EXISTS Sold;
CREATE TABLE Sold (
    ID int NOT NULL,
    PO_ID int NOT NULL,
    UserID int NOT NULL,
    SaleDate DATE NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID, PO_ID) REFERENCES PurchaseOrder(UserID, ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ID) REFERENCES Book(ID) ON DELETE CASCADE ON UPDATE CASCADE
);
