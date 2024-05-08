CREATE TABLE Admin (
    AdminID INT PRIMARY KEY IDENTITY(1,1),
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL
);

INSERT INTO Admin (Username, Password) VALUES ('admin', 'adminpassword');
