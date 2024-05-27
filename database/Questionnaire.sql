CREATE TABLE questionnaire_responses (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructor_id VARCHAR(255) NOT NULL,
	year_level VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    response VARCHAR(255) NOT NULL,
    comments VARCHAR(255) NOT NULL,
    submission_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
select * from questionnaire_student

CREATE TABLE questionnaire_student (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructor_id VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
	statement VARCHAR(255) NOT NULL,
    response VARCHAR(255) NOT NULL,
    comments VARCHAR(255) NOT NULL,
    submission_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);