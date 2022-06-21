CREATE TABLE registration(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    applied VARCHAR(5) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT NOW()

);

CREATE TABLE recruiter_application(
	id_number VARCHAR(13) PRIMARY KEY NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    age INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    withdrawable_amount DECIMAL(10,2) NOT NULL,
    referral_code VARCHAR(8),
    application_status VARCHAR(20) NOT NULL,
    application_date DATETIME NOT NULL DEFAULT NOW()
    
);

CREATE TABLE student_application(
	id_number VARCHAR(13) PRIMARY KEY NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    date_of_birth DATE NOT NULL,
    age INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    funding_type VARCHAR(20) NOT NULL,
    student_number VARCHAR(20) NOT NULL,
    instituition VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    year_of_study VARCHAR(20) NOT NULL,
    study_completion_date DATE NOT NULL,
    referral_code VARCHAR(8) REFERENCES recruiter_application(referral_code), 
    application_status VARCHAR(20) NOT NULL,
    application_date DATETIME NOT NULL DEFAULT NOW()
  
);

CREATE TABLE residence_application(
    id_number VARCHAR(13) REFERENCES student_application(id_number),
    first_choice VARCHAR(50) NOT NULL,
    second_choice VARCHAR(50) NOT NULL,
    third_choice VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    message VARCHAR(255) NOT NULL
)

CREATE TABLE reports(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    student_number VARCHAR(20) REFERENCES student_application(student_number),
    report_type VARCHAR(50) NOT NULL,
    property_name VARCHAR(100) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    reported_date DATETIME NOT NULL DEFAULT NOW()
);

