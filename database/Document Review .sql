CREATE TABLE ProgramBasicInformation (
    ID INT PRIMARY KEY IDENTITY(1,1),
    College NVARCHAR(100),
    UndergraduateLevel NVARCHAR(50),
    ProgramName NVARCHAR(100),
    NatureOfProgram NVARCHAR(100),
    ScientificDepartment NVARCHAR(100),
    ProgramApprovalDate DATE
);
CREATE TABLE SpecializedInformation (
    HasAcademicBenchmarks BIT,
    StandardsUsed NVARCHAR(50)
);

