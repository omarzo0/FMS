
CREATE TABLE PositionEvaluation (
    uName NVARCHAR(100),
    YearLevel NVARCHAR(50),
    Position NVARCHAR(50),
   
);
CREATE TABLE UniversityVision (
    Statement NVARCHAR(255),
    StronglyAgree BIT,
    Agree BIT,
    Neutral BIT,
    Disagree BIT,
    StronglyDisagree BIT
    
-- Insert sample data into the table
INSERT INTO UniversityVision (Statement, StronglyAgree, Agree, Neutral, Disagree, StronglyDisagree)
VALUES 
('The vision of the university is clear and appropriate.', 1, 0, 1, 0, 0);
);


