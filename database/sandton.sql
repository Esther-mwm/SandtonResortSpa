-- Create the sadnton database if it doesn't exist
CREATE DATABASE IF NOT EXISTS sandton;

-- Use the sadnton database
USE santon;

-- Create the Rooms table
CREATE TABLE IF NOT EXISTS Rooms (
    RoomType VARCHAR(50) PRIMARY KEY,
    Price INT,
    Capacity INT,
    Adults INT,
    Children INT
);

-- Insert data into the Rooms table
INSERT INTO Rooms (RoomType, Price, Capacity, Adults, Children)
VALUES
    ('Deluxe', 7000, 2, 2, 1),
    ('Honeymoon', 8000, 2, 2, 0),
    ('Fountain', 6000, 2, 2, 1),
    ('Villa', 8000, 4, 4, 2);

-- Create the ConferenceHalls table
CREATE TABLE IF NOT EXISTS ConferenceHalls (
    HallType VARCHAR(50) PRIMARY KEY,
    Price INT,
    Capacity INT
);

-- Insert data into the ConferenceHalls table
INSERT INTO ConferenceHalls (HallType, Price, Capacity)
VALUES
    ('Small', 20000, 10),
    ('Executive', 50000, 20),
    ('GrandBallroom', 400000, 700),
    ('Large', 250000, 500);

-- Create the WellnessBookings table
CREATE TABLE IF NOT EXISTS WellnessBookings (
    Service VARCHAR(50) PRIMARY KEY,
    Price INT
);

-- Insert data into the WellnessBookings table
INSERT INTO WellnessBookings (Service, Price)
VALUES
    ('HotstoneMassage', 5000),
    ('FacialTherapy', 3000),
    ('ExfoliateGlow', 2500),
    ('Sauna', 9000),
    ('Salon', 3000);

-- RoomTypes Table
CREATE TABLE IF NOT EXISTS RoomTypes (
    RoomTypeID INT AUTO_INCREMENT PRIMARY KEY,
    RoomType VARCHAR(50),
    Price INT,
    Capacity INT,
    Adults INT,
    Children INT
);

-- Insert data into the RoomTypes table
INSERT INTO RoomTypes (RoomType, Price, Capacity, Adults, Children)
VALUES
    ('Deluxe', 7000, 2, 2, 1),
    ('Honeymoon', 8000, 2, 2, 0),
    ('Fountain', 6000, 2, 2, 1),
    ('Villa', 8000, 4, 4, 2);

-- Rooms Table
CREATE TABLE IF NOT EXISTS Room (
    RoomID INT AUTO_INCREMENT PRIMARY KEY,
    RoomNumber INT,
    RoomTypeID INT,
    Status VARCHAR(50),
    FOREIGN KEY (RoomTypeID) REFERENCES RoomTypes(RoomTypeID)
);

-- Insert data into the Rooms table (for example, with room numbers and statuses)
INSERT INTO Room (RoomNumber, RoomTypeID, Status)
VALUES
    (101, 1, 'Available'),  -- Room Number 101 is a Deluxe room
    (102, 2, 'Booked'),     -- Room Number 102 is a Honeymoon room
    (103, 3, 'Available'),  -- Room Number 103 is a Fountain room
    (104, 4, 'Available');  -- Room Number 104 is a Villa room


-- Create the ConferenceHalls table
CREATE TABLE IF NOT EXISTS ConferenceHall (
    HallID INT AUTO_INCREMENT PRIMARY KEY,
    HallType VARCHAR(50) UNIQUE,
    Price INT,
    Capacity INT
);

-- Insert data into the ConferenceHalls table
INSERT INTO ConferenceHall (HallType, Price, Capacity)
VALUES
    ('Small', 20000, 10),
    ('Executive', 50000, 20),
    ('GrandBallroom', 400000, 700),
    ('Large', 250000, 500);

-- Create the ConferenceHallBookings table
CREATE TABLE IF NOT EXISTS ConferenceHallBookings (
    HallBookingID INT AUTO_INCREMENT PRIMARY KEY,
    HallID INT,
    Status ENUM('Available', 'Booked') DEFAULT 'Available',
    FOREIGN KEY (HallID) REFERENCES ConferenceHall(HallID)
);

-- Insert data into the ConferenceHallBookings table based on the number of rooms
INSERT INTO ConferenceHallBookings (HallID) VALUES
    (1), (1), (1), (1), -- Small conference room (4 in total)
    (2), (2), (2), -- Executive boardroom (3 in total)
    (3), -- Grand ballroom (1 only)
    (4), (4); -- Large conference room (2 in total)


ALTER TABLE ConferenceHals ADD COLUMN HallNumber INT AUTO_INCREMENT FIRST;

