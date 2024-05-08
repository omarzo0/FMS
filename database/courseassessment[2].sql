CREATE TABLE CourseAssessment (
    Topic VARCHAR(255) primary key,
    ILOs VARCHAR(10),
    MCQ BIT,
    ShortEssays BIT,
    LongEssays BIT,
	TrueFalse BIT,
   modifiedTrueFalse BIT,
    ShortAnswer BIT,
    matc BIT,
    complete BIT,
    problemsolving BIT,
    practical BIT,
	Assignment_Project_Research BIT,
	Requirements BIT,
    oral BIT
);
