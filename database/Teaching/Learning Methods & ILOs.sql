CREATE TABLE Teaching_Learning_Methods (
    Week INT,
    ILOS VARCHAR(255) primary key,
    Topic VARCHAR(255),

    Traditional_Lectures bit,
    Blended bit,
	e-learning bit,
	Distance_learning bit,
    Practical_training	 bit,
    Clinical training bit
CONSTRAINT FK_topic_teaching FOREIGN KEY (Topic)
REFERENCES CourseAssessment(Topic)



);


