CREATE TABLE users (userName varchar(255), password varchar(255), email varchar(255), 
					phone int(10), librarian tinyint, FirstName varchar(255), LastName varchar(255));
                    
CREATE TABLE books (bookId int(10), bookTitle varchar(255), author varchar(255), availability tinyint);

CREATE TABLE loanHistory (userName varchar(255), bookId int(10), dueDate date, returnedDate date);

CREATE TABLE shelves (shelfID int(10), shelfName varchar(255), bookId int(10));

INSERT INTO books VALUES ('1', 'Book1', 'author1', '1');
INSERT INTO books VALUES ('2', 'Book2', 'author2', '1');
INSERT INTO books VALUES ('3', 'Book3', 'author3', '1');

INSERT INTO shelves VALUES ('1', 'Science', '1');
INSERT INTO shelves VALUES ('1', 'Science', '2');
INSERT INTO shelves VALUES ('1', 'Science', '3');

SELECT * FROM books;
SELECT * FROM shelves;
SELECT * FROM users;

SELECT * FROM users WHERE userName='admin' AND password='admin';

