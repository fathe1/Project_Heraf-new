create database project_herf

CREATE TABLE Accounts (
    AccountID int PRIMARY KEY IDENTITY(1,1),
    Username NVARCHAR(50) NOT NULL,
    Email NVARCHAR(100) NOT NULL UNIQUE,
    Password NVARCHAR(50) NOT NULL,
    Phone NVARCHAR(20) NOT NULL,
    Location NVARCHAR(100) NOT NULL,
    AccountType NVARCHAR(50) CHECK (AccountType IN ('Customer', 'Professional')) NOT NULL,
    Profession NVARCHAR(100), 
    Photo VARBINARY(MAX) 
);

CREATE TABLE Bookings (
    BookingID INT PRIMARY KEY IDENTITY(1,1),
    ServiceType NVARCHAR(100) NOT NULL,
    ArtisanName NVARCHAR(100) NOT NULL,
    BookingDate DATE NOT NULL,
    BookingTime TIME NOT NULL,
    PaymentMethod NVARCHAR(50) CHECK (PaymentMethod IN ('Cash', 'Credit Card')) NOT NULL,
    AccountID INT,
    FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID)
);

CREATE TABLE Ratings (
    RatingID INT PRIMARY KEY IDENTITY(1,1),
    ServiceType NVARCHAR(100) NOT NULL,
    Rating INT CHECK (Rating >= 1 AND Rating <= 5) NOT NULL,
    Comments NVARCHAR(MAX),
    AccountID INT,
    FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID)
);

CREATE TABLE Inquiries (
    InquiryID INT PRIMARY KEY IDENTITY(1,1),
    Name NVARCHAR(100) NOT NULL,
    Email NVARCHAR(100) NOT NULL,
    Subject NVARCHAR(200) NOT NULL,
    Message NVARCHAR(MAX) NOT NULL,
    InquiryDate DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (Email) REFERENCES Accounts(Email)
);