CREATE TABLE users (userName varchar(255), password varchar(255), email varchar(255), 
					phone varchar(10), librarian tinyint, FirstName varchar(255), LastName varchar(255));
                    
CREATE TABLE books (bookId int(10), bookTitle varchar(255), author varchar(255), availability tinyint);

CREATE TABLE loanHistory (userName varchar(255), bookId int(10), dueDate date, returnedDate date);

CREATE TABLE shelves (shelfId int(10), shelfName varchar(255));

CREATE TABLE bookLocations (shelfId int(10), bookId int(10));

INSERT INTO books VALUES ('1', 'Book1', 'author1', '1');
INSERT INTO books VALUES ('2', 'Book2', 'author2', '1');
INSERT INTO books VALUES ('3', 'Book3', 'author3', '1');

INSERT INTO shelves VALUES ('1', 'Science');

INSERT INTO bookLocations VALUES ('1', '1');
INSERT INTO bookLocations VALUES ('1', '2');
INSERT INTO bookLocations VALUES ('1', '3');
INSERT INTO bookLocations VALUES ('1', '5');

SELECT * FROM books;
SELECT * FROM bookLocations;
SELECT * FROM shelves;
SELECT * FROM users;
SELECT * FROM loanHistory;

SELECT * FROM users WHERE userName='admin' AND password='admin';

SELECT * FROM books, shelves, bookLocations WHERE books.bookId=bookLocations.bookId AND shelves.shelfID=bookLocations.shelfId;

SET SQL_SAFE_UPDATES = 0;
DELETE FROM books WHERE bookId=4;
