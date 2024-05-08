CREATE TABLE Blueprint_for_Written_Exams (
    Topic VARCHAR(255),
    ILOs VARCHAR(255),
    NumberOfLectures INT,
    MarksM INT,
    MarksQ INT,
    MarksF INT,
    MCQ INT,
    ShortEssayQ INT,
    LongEssayQ INT,
    TrueFalseQ INT,
    ModifiedTrueFalseQ INT,
    ShortAnswerQ INT,
    Matchq int, 
	Complete INT,
    ProblemSolving INT
	CONSTRAINT FK_topic FOREIGN KEY (Topic)
    REFERENCES CourseAssessment(Topic)
);
