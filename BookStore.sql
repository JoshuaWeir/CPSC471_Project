
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
    Password VARCHAR(30) NOT NULL,
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
    Password VARCHAR(30) NOT NULL,
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
    NumberOfBooks int NOT NULL,
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
    ISBN BIGINT NOT NULL,
    ReleaseDate DATE NOT NULL,
    InventoryDate DATE NOT NULL,
    Price FLOAT NOT NULL,
    Title VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(AdminID) REFERENCES Admin(ID) ON DELETE CASCADE ON UPDATE CASCADE,
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
    NumberOfBooks int NOT NULL,
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
    NumberOfBooks int NOT NULL,
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

INSERT INTO Admin VALUES (1,"admin1","admin1@gmail.com","12345","Administrator","123 Road NE, Calgary", "2000-12-02");
INSERT INTO RegisteredUser VALUES (0, "guest", "temp", "temp", "guest", "temp", "0001-01-01", 0, NULL, NULL, NULL, 1);
INSERT INTO RegisteredUser VALUES (2, "joshUser", "josh@gmail.com", "qwerty", "Josh Weir", "Airdrie, AB", "2001-03-30", 10, NULL, NULL, NULL, 1);
INSERT INTO RegisteredUser VALUES (3, "tyUser", "ty@gmail.com", "1234", "Ty Pilling", "Calgary, AB", "2001-05-10", 15, NULL, NULL, NULL, 1);
INSERT INTO RegisteredUser VALUES (4, "ernestUser", "ernest@gmail.com", "pass", "Ernest Sarna", "Calgary, AB", "2001-10-08", 12, NULL, NULL, NULL, 1);

INSERT INTO Publisher VALUES ("Rocky Mountain Books", "Calgary, AB", "403-271-3145");
INSERT INTO Publisher VALUES ("HarperCollins", "New York, NY", "212-207-7000");
INSERT INTO Publisher VALUES ("Bloomsbury", "London, UK", "44-20-7631-5600");
INSERT INTO Publisher VALUES ("Vintage", "New York, NY", "212-572-2100");
INSERT INTO Publisher VALUES ("Penguin Classics", "New York, NY", "212-366-2000");
INSERT INTO Publisher VALUES ("Simon & Schuster", "New York, NY", "212-698-7000");
INSERT INTO Publisher VALUES ("Random House", "New York, NY", "212-782-9000");
INSERT INTO Publisher VALUES ("Houghton Mifflin Harcourt", "Boston, MA", "617-351-5000");
INSERT INTO Publisher VALUES ("Scholastic Press", "New York, NY", "212-343-6100");
INSERT INTO Publisher VALUES ("Doubleday Books", "New York, NY", "212-782-9000");
INSERT INTO Publisher VALUES ("Riverhead Books", "New York, NY", "212-366-2000");

INSERT INTO Author VALUES ("Rick Riordan", "1980-01-14", "YA fiction author", 15);
INSERT INTO Author VALUES ("J.R.R. Tolkien", "1892-01-03", "Fantasy author", 20);
INSERT INTO Author VALUES ("J.K. Rowling", "1965-07-31", "Fantasy author", 16);
INSERT INTO Author VALUES ("George Orwell", "1903-06-25", "Dystopian author", 10);
INSERT INTO Author VALUES ("Jane Austen", "1775-12-16", "Romance author", 6);
INSERT INTO Author VALUES ("Stephen King", "1947-09-21", "Horror author", 63);
INSERT INTO Author VALUES ("Markus Zusak", "1975-06-23", "Historical fiction author", 7);
INSERT INTO Author VALUES ("Margaret Atwood", "1939-11-18", "Dystopian author", 18);
INSERT INTO Author VALUES ("Suzanne Collins", "1962-08-10", "YA fiction author", 11);
INSERT INTO Author VALUES ("Dan Brown", "1964-06-22", "Thriller author", 8);
INSERT INTO Author VALUES ("Khaled Hosseini", "1965-03-04", "Historical fiction author", 4);
INSERT INTO Author VALUES ("Joseph Heller", "1923-05-01", "General fiction author", 6);
INSERT INTO Author VALUES ("Kurt Vonnegut", "1922-11-11", "Science fiction author", 12);
INSERT INTO Author VALUES ("Gabriel Garcia Marquez", "1927-03-06", "General fiction author", 5);

INSERT INTO Book VALUES (1,1,"Rocky Mountain Books", "Rick Riordan", 9784747332743, "2012-08-03", "2012-08-10", 13.99, "Percy Jackson");
INSERT INTO Book VALUES (2,1,"HarperCollins", "J.R.R. Tolkien", 9780261103252, "1991-11-27", "1991-12-04", 19.99, "The Lord of the Rings");
INSERT INTO Book VALUES (3,1,"Bloomsbury", "J.K. Rowling", 9780747532743, "1997-06-26", "1997-07-03", 14.99, "Harry Potter and the Philosopher's Stone");
INSERT INTO Book VALUES (4,1,"Vintage", "George Orwell", 9780451524935, "1950-06-08", "1950-06-15", 9.99, "1984");
INSERT INTO Book VALUES (5,1,"Penguin Classics", "Jane Austen", 9780141439518, "2003-05-27", "2003-06-03", 7.99, "Pride and Prejudice");
INSERT INTO Book VALUES (6,1,"Simon & Schuster", "Stephen King", 9781501142970, "2016-01-05", "2016-01-12", 16.99, "The Shining");
INSERT INTO Book VALUES (7,1,"Random House", "Markus Zusak", 9780375842207, "2007-03-14", "2007-03-21", 12.99, "The Book Thief");
INSERT INTO Book VALUES (8,1,"Houghton Mifflin Harcourt", "Margaret Atwood", 9780385490818, "1998-03-16", "1998-03-23", 15.95, "The Handmaid's Tale");
INSERT INTO Book VALUES (9,1,"Scholastic Press", "Suzanne Collins", 9780439023481, "2008-09-14", "2008-09-21", 18.99, "The Hunger Games");
INSERT INTO Book VALUES (10,1,"Doubleday Books", "Dan Brown", 9780385504201, "2003-03-18", "2003-03-25", 24.95, "The Da Vinci Code");
INSERT INTO Book VALUES (11,1,"Riverhead Books", "Khaled Hosseini", 9781594480003, "2003-06-17", "2003-06-24", 14.00, "The Kite Runner");

INSERT INTO Book VALUES (12,1,"Simon & Schuster", "Joseph Heller", 9780099536017, "1961-10-10", "2023-04-12", 8.99, "Catch 22");
INSERT INTO Book VALUES (13,1,"Simon & Schuster", "Kurt Vonnegut", 9780385333788, "1952-08-18", "2023-03-22", 5.99, "Player Piano");
INSERT INTO Book VALUES (14,1,"HarperCollins", "Gabriel Garcia Marquez", 9780060740450, "1962-01-01", "2023-03-23", 14.00, "One Hundred Years of Solitude");

INSERT INTO FantasyBook VALUES (1,"Greek Gods");
INSERT INTO FantasyBook VALUES (2,"Dragons and Magic");
INSERT INTO FantasyBook VALUES (3,"Magic School");
INSERT INTO OtherBook VALUES (4,"Past Dystopian");
INSERT INTO OtherBook VALUES (5,"Romance");
INSERT INTO OtherBook VALUES (6,"Horror");
INSERT INTO OtherBook VALUES (7,"Historical Fiction");
INSERT INTO OtherBook VALUES (8,"Future Dystopian");
INSERT INTO SciFiBook VALUES (9, "Survival");
INSERT INTO OtherBook VALUES (10,"Mystery");
INSERT INTO OtherBook VALUES (11,"Fiction");
