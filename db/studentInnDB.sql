CREATE TABLE registration(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    applied VARCHAR(5) NOT NULL,
    verified VARCHAR(255) NOT NULL,
    token VARCHAR(5) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT NOW()

);

CREATE TABLE recruiter_application(
	id_number VARCHAR(13) PRIMARY KEY NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    race VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    withdrawable_amount DECIMAL(10,2) NOT NULL,
    referral_code VARCHAR(8),
    street VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    postal_code VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    kin_name VARCHAR(100) NOT NULL,
    kin_number VARCHAR(100) NOT NULL,
    application_status VARCHAR(20) NOT NULL,
    application_date DATETIME NOT NULL DEFAULT NOW()
    
);

CREATE TABLE student_application(
	id_number VARCHAR(13) PRIMARY KEY NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    race VARCHAR(10) NOT NULL,
    institution VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    year_of_study VARCHAR(20) NOT NULL,
    study_completion_date DATE NOT NULL,
    funding_type VARCHAR(20) NOT NULL,
    student_number VARCHAR(20) NOT NULL,
    referral_code VARCHAR(8) , 
    street VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    postal_code VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    kin_name VARCHAR(100) NOT NULL,
    kin_number VARCHAR(100) NOT NULL,
    application_status VARCHAR(20) NOT NULL,
    application_date DATETIME NOT NULL DEFAULT NOW()
  
);

CREATE TABLE residences(
    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Residence_address VARCHAR(50) NOT NULL,
    Room_number VARCHAR(50) NOT NULL,
    Room_Taken INT NOT NULL

);
CREATE TABLE residence_application(
    id_number VARCHAR(13),
    residence_address VARCHAR(50) NOT NULL,
    room_number VARCHAR(50) NOT NULL,
    application_date DATETIME NOT NULL DEFAULT NOW(),
    status VARCHAR(20) NOT NULL,
    message VARCHAR(255) NOT NULL
);

CREATE TABLE reports(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    student_number VARCHAR(20),
    report_type VARCHAR(50) NOT NULL,
    property_name VARCHAR(100) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    reported_date DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE avatar(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL,
    image VARCHAR(100)

);
CREATE TABLE documents(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    file_name VARCHAR(100),
    upload_name VARCHAR(100)

);
CREATE TABLE messages(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email VARCHAR(100) NOT NULL,
    message VARCHAR(255) NOT NULL,
    read_ INT NOT NULL,
    message_date DATETIME NOT NULL DEFAULT NOW()

);
CREATE TABLE payments(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_number VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    month VARCHAR(255) NOT NULL,
    approved VARCHAR(255) NOT NULL,
    payment_date DATETIME NOT NULL DEFAULT NOW()

);
CREATE TABLE payment_request(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_number VARCHAR(100) NOT NULL,
    account_holder VARCHAR(100) NOT NULL,
    account_number VARCHAR(255) NOT NULL,
    bank_name VARCHAR(255) NOT NULL,
    branch_code VARCHAR(255) NOT NULL,
    approved VARCHAR(255) NOT NULL,
    payment_request_date DATETIME NOT NULL DEFAULT NOW()

);


INSERT INTO residences (Residence_address, Room_number, Room_Taken) VALUES
('13 5th Street Vrededorp', 'Room 1', 0),
('13 5th Street Vrededorp', 'Room 2', 0),
('13 5th Street Vrededorp', 'Room 3', 0),
('13 5th Street Vrededorp', 'Room 4', 0),
('13 5th Street Vrededorp', 'Room 5', 0),
('13 5th Street Vrededorp', 'Room 6', 0),
('13 5th Street Vrededorp', 'Room 7', 0),
('13 5th Street Vrededorp', 'Room 8', 0),
('13 5th Street Vrededorp', 'Room 9', 0),
('19 Rus Road Vredepark', 'Room 1', 0),
('19 Rus Road Vredepark', 'Room 2', 0),
('19 Rus Road Vredepark', 'Room 3', 0),
('19 Rus Road Vredepark', 'Room 4', 0),
('19 Rus Road Vredepark', 'Room 5', 0),
('19 Rus Road Vredepark', 'Room 6', 0),
('19 Rus Road Vredepark', 'Room 7', 0),
('19 Rus Road Vredepark', 'Room 8', 0),
('19 Rus Road Vredepark', 'Room 9', 0),
('19 Rus Road Vredepark', 'Room 10', 0),
('19 Rus Road Vredepark', 'Room 11', 0),
('19 Rus Road Vredepark', 'Room 12', 0),
('19 Rus Road Vredepark', 'Room 13', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 1', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 2', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 3', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 4', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 5', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 6', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 7', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 8', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 9', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 10', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 11', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 12', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 13', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 14', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 15', 0),
('43/45 Aandbloom Street, Jan Hofmeyer', 'Room 16', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 1', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 2', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 3', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 4', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 5', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 6', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 7', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 8', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 9', 0),
('3 Pypie Draai, Jan Hofmeyer', 'Room 10', 0),
('50 Auckland Avenue, Auckland Park', 'Room 1', 0),
('50 Auckland Avenue, Auckland Park', 'Room 2', 0),
('50 Auckland Avenue, Auckland Park', 'Room 3', 0),
('50 Auckland Avenue, Auckland Park', 'Room 4', 0),
('50 Auckland Avenue, Auckland Park', 'Room 5', 0),
('50 Auckland Avenue, Auckland Park', 'Room 6', 0),
('50 Auckland Avenue, Auckland Park', 'Room 7', 0),
('50 Auckland Avenue, Auckland Park', 'Room 8', 0),
('50 Auckland Avenue, Auckland Park', 'Room 9', 0),
('50 Auckland Avenue, Auckland Park', 'Room 10', 0),
('50 Auckland Avenue, Auckland Park', 'Room 11', 0),
('50 Auckland Avenue, Auckland Park', 'Room 12', 0),
('50 Auckland Avenue, Auckland Park', 'Room 13', 0)


