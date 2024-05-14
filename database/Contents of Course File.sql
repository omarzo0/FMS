CREATE TABLE Course_file_Checklist (
    CourseID INT PRIMARY KEY IDENTITY(1,1),
    CourseTitle NVARCHAR(100),
    CourseCode NVARCHAR(10),
    Specialty NVARCHAR(255),
    ContactHoursPerWeek INT,
    CreditHours INT,
    TopicsTaught NVARCHAR(MAX),
    StudentAssessmentAvailable BIT,
    AdministrativeConstraints NVARCHAR(MAX),
    StudentsFeedback NVARCHAR(50),
    CourseImprovementProposals NVARCHAR(MAX),
    ExternalReviewersComments NVARCHAR(MAX),
    Previous_Years_Action_Plan_Progress NVARCHAR(MAX),
    Unimplemented_Improvements NVARCHAR(MAX),
    ActionPlanForNextYear NVARCHAR(MAX),
    CourseDirector NVARCHAR(100),
    Signaturee NVARCHAR(100),
    ApprovalDate DATE
);

CREATE TABLE matrix_topics (
    Week INT,
    CourseTopics VARCHAR(255) primary key,
    KnowledgeUnderstanding_a1 bit,
    KnowledgeUnderstanding_a2 bit,
	KnowledgeUnderstanding_a3 bit,
	KnowledgeUnderstanding_a4 bit,
    KnowledgeUnderstanding_a5 bit,

    IntellectualSkills_b1 bit,
    IntellectualSkills_b2 bit,
	IntellectualSkills_b3 bit,
    IntellectualSkills_b4 bit,
    IntellectualSkills_b5 bit,

    ProfessionalPracticalSkills_c1 bit,
	ProfessionalPracticalSkills_c2 bit,
    ProfessionalPracticalSkills_c3 bit,
    ProfessionalPracticalSkills_c4 bit,
    ProfessionalPracticalSkills_c5 bit,

    GeneralTransferableSkills_d1 bit,
    GeneralTransferableSkills_d2 bit,
    GeneralTransferableSkills_d3 bit,
    GeneralTransferableSkills_d4 bit,
    GeneralTransferableSkills_d5 bit

);


CREATE TABLE Course_basic_Information (
    CourseID INT FOREIGN KEY REFERENCES Course_file_Checklist(CourseID),
    Faculty NVARCHAR(100),
    Department NVARCHAR(100),
    Division NVARCHAR(100),
    CourseTitle NVARCHAR(100),
    ProgramTitle NVARCHAR(100),
    Leveel NVARCHAR(50),
    CreditHoursPerWeek NVARCHAR(50),
    Instructor NVARCHAR(100),
    CourseDirector NVARCHAR(100),
    ExternalEvaluator NVARCHAR(100)
);

CREATE TABLE course_statistical_informatiobn (
    CourseID INT FOREIGN KEY REFERENCES Course_file_Checklist(CourseID),
    NO_of_student_enrolled_in_the_course: INT,
    NO_of_student_completing_in_the_course INT,
    Passed INT,
    Failed INT,
    Excellent INT,
    VeryGood INT,
    Good INT,
    Pass INT
);

CREATE TABLE  Course_Teaching (
    CourseTeaching NVARCHAR(MAX),
    Topics_taught NVARCHAR(MAX),
    Topics_taught_No_of_learning_hours_Instructor INT,
    Instructor NVARCHAR(255),
    Topics_Taught_Percentage NVARCHAR(50),
    Reasons_for_not_teaching_any_topic  NVARCHAR(MAX),
    Reasons_for_teaching_topics_not_planned_for_in_the_course_specification  NVARCHAR(MAX),

   
   
);



CREATE TABLE  Teaching_Learning_Methods (

    TeachingMethods NVARCHAR(MAX),
    Traditional_Lectures NVARCHAR(MAX),
    Blended	NVARCHAR(MAX),
    e-learning	NVARCHAR(MAX),
    Distance learning	NVARCHAR(MAX),
    Practical Training	NVARCHAR(MAX),
    Clinical Training	NVARCHAR(MAX),
    );



    CREATE TABLE AssessmentPlan (
    AssessmentMethod NVARCHAR(100),
    Marks INT,
    WeightOfAssessment INT,
    AssessmentSchedule INT,
    ILOsCovered NVARCHAR(MAX)
);



    CREATE TABLE FacilitiesAndMaterials (
    ID INT PRIMARY KEY IDENTITY(1,1),
    ResourceCategory NVARCHAR(100),
    TotallyAdequate NVARCHAR(255),
    AdequateToSomeExtent NVARCHAR(255),
    Inadequate NVARCHAR(255)
);

CREATE TABLE FacilitiesAndMaterials (
    ResTeaching_resources NVARCHAR(100),
    TotallyAdequate NVARCHAR(255),
    AdequateToSomeExtent NVARCHAR(255),
    Inadequate NVARCHAR(255)

);

CREATE TABLE AdministrativeConstraints (
    DifficultiesEncountered NVARCHAR(MAX)
);

CREATE TABLE StudentEvaluation (
    MainPointsFeedback NVARCHAR(MAX),
    ResponseOfCourseTeam NVARCHAR(MAX)
);

CREATE TABLE ExternalEvaluatorComments (
    Comments NVARCHAR(MAX),
    ResponseOfCourseTeam NVARCHAR(MAX)
);



CREATE TABLE CourseEnhancement (
    ActionRequired NVARCHAR(255),
    Completed BIT,
    NotCompleted BIT,
    ReasonsForNonCompletion NVARCHAR(MAX)
);


CREATE TABLE CourseActionPlan (
    ActionsRequired NVARCHAR(MAX),
    Responsibility NVARCHAR(MAX),
    CompletionDate DATE
);

CREATE TABLE submitter (
    Course_Director NVARCHAR(64),
    Head_of_Department NVARCHAR(64),
    Date_of_Approval NVARCHAR(64),
    Head_of_Department NVARCHAR(64),
    Signaturee NVARCHAR(64)


);
