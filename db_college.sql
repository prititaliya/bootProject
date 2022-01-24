-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 09:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `Faculty_Id` int(11) NOT NULL,
  `Faculty_Name` varchar(30) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `experience` int(11) NOT NULL,
  `intrest` varchar(50) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `Department_Id` int(11) NOT NULL,
  `Profile_Picture` longblob DEFAULT NULL,
  `Category` varchar(20) DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`Faculty_Id`, `Faculty_Name`, `designation`, `experience`, `intrest`, `qualification`, `Department_Id`, `Profile_Picture`, `Category`) VALUES
(1, 'Prit', 'tutor', 10, 'web development', ' btech', 16, NULL, 'faculty'),
(2, 'meet ukani', 'Head of department', 10, 'Machinery', '    btech', 1, NULL, 'faculty'),
(3, 'madhav bhalani', 'Tutor', 5, 'Mechenic', '  BTech', 11, NULL, 'faculty'),
(4, 'Prit italiya', 'lecturer', 10, 'app development', ' btech', 16, NULL, 'faculty'),
(5, 'dev', 'tutor', 5, 'data', 'phd', 16, NULL, 'faculty'),
(6, 'ujas', 'washer', 5, 'classroom washing ', '10th pass', 6, NULL, 'staff'),
(7, 'om', 'cleaner', 3, 'cleaning', 'B.A', 16, NULL, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `session` char(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`session`, `time`) VALUES
('v6o8n425u9bsp2dnt42to93t3i', 1643011600),
('', 1643011591);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dept`
--

CREATE TABLE `tb_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(40) NOT NULL,
  `dept_desc` text NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dept`
--

INSERT INTO `tb_dept` (`dept_id`, `dept_name`, `dept_desc`, `last_update`) VALUES
(1, 'APPLIED MECHANICS', '  Applied Mechanics Department undertakes academic work of some of the subjects of Civil, Mechanical, Automobile and Metallurgical Engineering.  Department has vastly experienced faculties and supporting staff.  Department has fully equipped laboratories for Applied Mechanics, Strength of Material, Soil Engineering and Concrete Technology.\r\n\r\n<b>Applied Mechanics</b> laboratory is equipped with Screw Jack, Wheel and axial, force polygon apparatus, etc. Strength of Material laboratory is equipped with Compression Testing Machine, Universal Tensile Testing Machine, Izod and Charpy Impact Testing Machine, Hardness Testing Machine, etc. Soil engineering laboratory is equipped with necessary equipments required for testing of soil such as Liquid limit apparatus, Hot air oven, varies sieves, Permeability apparatus, Shear test apparatus. Concrete laboratory is equipped with Compression Testing Machine, Vibrating table, Slump test apparatus, Flakiness and elongation index test apparatus, etc.\r\n\r\nDepartment also regularly organize subject related Industrial visit for students of Civil Engineering and also organized Expert lectures. ', '2021-08-27'),
(6, 'CIVIL ENGG.', 'ABOUT\r\n\r\nEstablished in  1955 with intake of 60 students, The Civil Engineering Department is one of the founding departments in the Institute and has grown substantially over the years. Department is a Professional engineering discipline which deals with the Design, Construction and Maintenance of the physical and naturally built environment. Program was accredited by NBA for the period of 2008 - 2011. The present student intake of the department is 124 from 2008 in two divisions and guided by well qualified and experienced faculties and staff members.\r\n\r\nPROGRAMME STRUCTURE\r\n\r\nDiploma in Civil Engineering is a Three-year long program. After implementing shift pattern in 2008, programme is offered in two shifts with intake of 64 and 60 respectively. Department consists of various laboratories like, Surveying, Transportation engineering, Fluid mechanics, Environmental Engineering, etc. Students are Enrolled in program based on 10th standard merit, Students who have passed ITI can aspire for direct Second-year admission (Lateral Entry).\r\n\r\nVISION\r\n\r\n“Achieve Excellence in Civil Engineering for sustainable and comprehensive growth of industry &society.”\r\n\r\nMISSION\r\n\r\nTo develop core competency in civil engineering.\r\nTo promote learning through innovative approach for sustainable development.\r\nTo inculcate professional knowledge & entrepreneurship skill with moral, ethical & professional value for industry & society.\r\nTo upgrade staff with advancement in civil engineering & professional Liaisoning with industry.\r\nPROGRAM EDUCATIONAL OBJECTIVES (PEOs)\r\n\r\nTo understand, design and Operations of Civil Engineering Tools.\r\nTo implement the imperative knowledge of science & fundamental concepts of civil engineering.\r\nTo pursue higher education, Career development & entrepreneurship skills in Civil engineering.\r\nTo exhibit leadership, trigger social & economical commitments & to inculcate community services and protect environment.  \r\nPROGRAM OUTCOMES (POs)\r\n\r\nBasic and Discipline specific knowledge: Apply knowledge of basic mathematics, science and engineering fundamentals and engineering specialization to solve the engineering problems.\r\nProblem analysis: Identify and analyse well-defined engineering problems using codified standard methods.\r\nDesign/ development of solutions: Design solutions for well-defined technical problems and assist with the design of systems components or processes to meet specified needs.\r\nEngineering Tools, Experimentation and Testing: Apply modern engineering tools and appropriate technique to conduct standard tests and measurements.\r\nEngineering practices for society, sustainability and environment: Apply appropriate technology in context of society, sustainability, environment and ethical practices.\r\nProject Management: Use engineering management principles individually, as a team member or a leader to manage projects and effectively communicate about well-defined engineering activities.\r\nLife-long learning: Ability to analyse individual needs and engage in updating in the context of technological changes.\r\nPROGRAM SPECIFIC OUTCOMES (PSOs)\r\n\r\nTo plan, design, estimate, execution and maintenance of various civil engineering structures.\r\nTo solve civil engineering problems for sustainable development of society & environment.    \r\nCAREER OPTIONS AND JOB PROSPECTS\r\n\r\nAfter completing Diploma in Civil Engineering, the Students can opt for various career opportunities, Higher Studies and job prospects. Students can go for either a government-based or a private based industry. Various job options which the Students can opt that includes Site supervisor, Assistant Civil Engineer, Junior Construction Manager, Assistant Inventory Manager, Construction Project Assistant, Junior Plant Engineer, Consultant, and many more…', '2021-09-07'),
(11, 'AUTOMOBILE ENGG', 'Automobile Engineering Department established in 1958, is one of the pioneering departments of Dr. S. & S. S. Ghandhy College Of Engineering and Technology, Surat. Institute is running under Department of Technical Education, Government of Gujarat and is affiliated to Gujarat Technological University, Ahmedabad. Diploma Automobile engineering program is approved by All India council for technical education (AICTE), New Delhi.\r\n\r\nAutomobile engineering is a branch of engineering which deals with designing, manufacturing, operating, repair and diagnosis of vehicles. It is a segment of vehicle engineering which deals with motorcycles, cars, buses, trucks, etc. It includes mechanical, electrical, electronic, dynamics, software and safety elements. The department has qualified faculty members engaged in teaching learning process with the aim of achieving excellence in the field of automobile engineering.\r\nDURATION OF COURSE\r\n03 years, six semesters (including one full term industrial training in fifth semester). Students are offered industrial training in 5th SEM as a part of curriculum.\r\n\r\nENTRY LEVEL\r\n\r\n10th Standard Pass ( 1st Sem. Entry)\r\nCertificate course of duration 2 years from TEB /NCVT/GCVT/IGTR  (3rd Sem. Entry)\r\nADMISSION\r\n\r\nAdmission through Central Admission Committee for Professional Diploma Courses on the basis of state level merit List. For More information visit www.acpdc.co.in\r\n\r\nVISION:\r\n\r\n“To be a centre of excellence in technical education to prepare diploma automobile engineers with innovative technical and professional skills suitable to automotive industry and the society.” \r\nMISSION:\r\n\r\nTo impart globally viable technical core competencies and skills related to Automobile Engineering.\r\nTo provide scholarly and vibrant learning environment for achieving professional excellence and innovation.\r\nTo strengthen the institute – industry relation to stay updated with dynamic behavior of automotive sector.\r\nTo inculcate professional ethics and moral values amongst the students.\r\n PROGRAM EDUCATIONAL OBJECTIVES (PEOs):\r\n\r\nThe program in Automobile Engineering will prepare students\r\n\r\nTo make successful career in the field of Automobile service, manufacturing, Road Transport, Motor Insurance and allied automobile sector.\r\nTo pursue and excel in higher education for their professional development.\r\nTo demonstrate professional ethics and ethos with life-long learning, contributing to the betterment of the society.\r\nPROGRAM SPECIFIC OUTCOMES (PSOs):\r\n\r\nDiploma Automobile graduate will be able\r\n\r\nTo identify, test, analyze and solve problems related to vehicle service.\r\nTo inspect road transport and conduct motor insurance survey.\r\nPROGRAM OUTCOMES (POs)\r\n\r\n1. Basic and Discipline specific knowledge: Apply knowledge of basic mathematics, science and engineering fundamentals and engineering specialization to solve the engineering problems.\r\n\r\n2. Problem analysis: Identify and analyse well-defined engineering problems using codified standard methods.\r\n\r\n3. Design/ development of solutions: Design solutions for well-defined technical problems and assist with the design of systems components or processes to meet specified needs.\r\n\r\n4. Engineering Tools, Experimentation and Testing: Apply modern engineering tools and appropriate technique to conduct standard tests and measurements.\r\n\r\n5. Engineering practices for society, sustainability and environment: Apply appropriate technology in context of society, sustainability, environment and ethical practices.\r\n\r\n6. Project Management: Use engineering management principles individually, as a team member or a leader to manage projects and effectively communicate about well-defined engineering activities.\r\n\r\n7. Life-long learning: Ability to analyse individual needs and engage in updating in the context of technological changes.\r\n\r\nTRAINING & PLACEMENTS OPPORTUNITIES\r\n\r\nEvery year all the students of Semester-5 are placed for full term (14 weeks) industrial training as a part of curriculum. \r\n\r\nList of industry/service stations where students undergone Industrial training in Academic year: 2017  2018  2019  2021\r\n\r\nEach year campus drives are held at Institute by various automobile industries, authorized workshops  and Motor insurance companies. Many students are placed  every year through on/off campus drive. Diploma Automobile graduates are also eligible to apply for the post of Assistant Inspector of Motor Vehicle (AIMV)(class-3). Many diploma Graduates of this program are recruited in Government of Gujarat as AIMV. Approximately 40% of diploma Automobile graduates are getting admission in degree engineering program. \r\nList of industries/companies hired our graduates in past few years is given below:', '2021-08-29'),
(16, 'INFORMATION TECHNOLOGY', '    <h3>In the Year 2000 </h3>was the Pioneer year for IT Department in this Institute. Since 2000 to till date continuous evaluation and improvisation makes our journey very successful like fruitful tree from small seed.\r\n \r\nOur Department is armed up with agile young faculties and 500 plus enthusiastic students studying in single shift. We are equipped with well-developed Classrooms & Laboratories with Servers, Projectors and 100 plus computers.\r\n \r\nOur main focus is on the Quality Education with Multidimensional skill development approach. Our constant efforts to develop industry compatible curriculum and live contact with industry Experts makes our students more orient for the real world. A regular arrangement of Expert Lectures, Technological Workshops, Seminars, and Technical Events makes our students more dynamic and creative.\r\n \r\nOur Department is keen to achieve the decided goals to serve its best services to Institute and Country.\r\n \r\nSTUDENT INTAKE/YEAR\r\n\r\nName of Department\r\n\r\nYear\r\n\r\nStudent Intake\r\n\r\nInformation Technology\r\n\r\n 2000\r\n\r\n60 \r\n\r\n 2019\r\n\r\n63 \r\n\r\n \r\nDURATION OF COURSE\r\n \r\n03 years full time course, six semesters.\r\n\r\nENTRY LEVEL\r\n10th Standard Pass ( 1st Sem. Entry)\r\nCertificate course of duration 2 years from TEB /NCVT/GCVT/IGTR  (3rd Sem. Entry)\r\nADMISSION\r\n \r\nAdmission through Central Admission Committee for Professional Diploma Courses on the basis of state level merit List. For More information visit www.acpdc.co.in\r\n\r\nVISION\r\n\r\n“To be a leading department in providing competent IT engineer for the benefit of industry and society.”\r\n\r\nMISSION\r\nM1: To prepare competent IT engineer by imparting qualitative technical education in IT field with best infrastructure.\r\nM2: To enhance the student’s technical competency in IT field for solving real world problems.\r\nM3: To nurture professional and ethical values in IT engineer to become a responsible member of workforce and society.\r\nPROGRAM EDUCATIONAL OBJECTIVES (PEOs)\r\n \r\nThe program in Information Technology will prepare students\r\nPEO1: To become software solution provider for real world problems.\r\nPEO2: To prepare a diploma engineer who is employable in industry, academia and allied areas related to IT field or become an entrepreneur.\r\nPEO3: To be a successful professional with ethical values, oral and written communication skills to work as an individual and team member\r\nPROGRAM SPECIFIC OUTCOMES (PSOs)\r\n \r\nDiploma IT graduate will be able\r\nPSO1: A graduate will be able to design and implement solutions using object oriented programming.\r\nPSO2: A graduate will be able to build real world applications for World Wide Web and Android platform.\r\nPROGRAM OUTCOMES (POs)\r\nBasic and Discipline specific knowledge: Apply knowledge of basic mathematics, science and engineering fundamentals and engineering specialization to solve the engineering problems.\r\nProblem analysis: Identify and analyze well-defined engineering problems using codified standard methods.\r\nDesign/ development of solutions: Design solutions for well-defined technical problems and assist with the design of systems components or processes to meet specified needs.\r\nEngineering Tools, Experimentation and Testing: Apply modern engineering tools and appropriate technique to conduct standard tests and measurements.\r\nEngineering practices for society, sustainability and environment: Apply appropriate technology in context of society, sustainability, environment and ethical practices.\r\nProject Management: Use engineering management principles individually, as a team member or a leader to manage projects and effectively communicate about well-defined engineering activities.\r\nLife-long learning: Ability to analyze individual needs and engage in updating in the context of technological changes.\r\nTRAINING & PLACEMENTS OPPORTUNITIES\r\n\r\nEach year after completing Diploma in Information Technology many students join the Bachelor of Engineering course and some of the students are placed in companies.\r\nYear of Passing\r\n\r\nStudents in Higher Studies (B.E.)\r\n\r\nStudents in Job\r\n\r\n2018\r\n\r\n31\r\n\r\n4\r\n\r\n2019\r\n\r\n27\r\n\r\n3\r\n\r\n2020\r\n\r\n42\r\n\r\n5\r\n\r\n \r\nStudents got the job in following companies:\r\nSr. No.\r\n\r\nName of Company\r\n\r\n1\r\n\r\nMicrohard IT Solutions Pvt Ltd., Surat\r\n\r\n2\r\n\r\nJio Service Center, Surat\r\n\r\n3\r\n\r\nR apparels, Udhna\r\n\r\n4\r\n\r\nSMIMER Hospital, Surat\r\n\r\n5\r\n\r\nELaunch Infotech, Surat\r\n\r\n \r\nCO - CURRICULAR AND EXTRACURRICULAR ACTIVITIES\r\n \r\nSeries of Co-curricular and extracurricular activities like Group Discussions, Expert lectures, Industrial visits, Tree plantation, Cleanliness drive, Yoga celebrations, Sports week, NCC and NSS activities are planned and organized in department and institute for a harmonious development of students in respect to their morality, humanity, honesty, character and health. These activities also contribute to the development of soft skills or employable skills to great extent, which are ultimately required at the world of work.\r\n<body>\r\n<table style:\"border: 1px solid black; border-collapse: collapse;\">\r\n <caption>A complex table</caption>\r\n <thead>\r\n  <tr>\r\n   <th colspan=\"3\">Invoice #123456789</th>\r\n   <th>14 January 2025\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">\r\n    <strong>Pay to:</strong><br>\r\n    Acme Billing Co.<br>\r\n    123 Main St.<br>\r\n    Cityville, NA 12345\r\n   </td>\r\n   <td colspan=\"2\">\r\n    <strong>Customer:</strong><br>\r\n    John Smith<br>\r\n    321 Willow Way<br>\r\n    Southeast Northwestershire, MA 54321\r\n   </td>\r\n  </tr>\r\n </thead>\r\n <tbody>\r\n  <tr>\r\n   <th>Name / Description</th>\r\n   <th>Qty.</th>\r\n   <th>@</th>\r\n   <th>Cost</th>\r\n  </tr>\r\n  <tr>\r\n   <td>Paperclips</td>\r\n   <td>1000</td>\r\n   <td>0.01</td>\r\n   <td>10.00</td>\r\n  </tr>\r\n  <tr>\r\n   <td>Staples (box)</td>\r\n   <td>100</td>\r\n   <td>1.00</td>\r\n   <td>100.00</td>\r\n  </tr>\r\n </tbody>\r\n <tfoot>\r\n  <tr>\r\n   <th colspan=\"3\">Subtotal</th>\r\n   <td> 110.00</td>\r\n  </tr>\r\n  <tr>\r\n   <th colspan=\"2\">Tax</th>\r\n   <td> 8% </td>\r\n   <td>8.80</td>\r\n  </tr>\r\n  <tr>\r\n   <th colspan=\"3\">Grand Total</th>\r\n   <td>$ 118.80</td>\r\n  </tr>\r\n </tfoot>\r\n</table>\r\n</body>', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `sno` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `lastseen` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`sno`, `username`, `password`, `role`, `lastseen`, `email`) VALUES
(30, 'admin', '$2y$10$9DxhSYA3OdYilfdWk1QSA.tjHDS4nZef0ymxQLr76ghFFDPXVH8gW', 'admin', '2021-08-29 06:26:06', 'admin@admin.con'),
(42, 'prit', '$2y$10$SXsz8jk7V52mxA0tyXAsdutbrSq2Fn7aoerCH/ilJZa.bAJHkA712', 'user', '2022-01-13 16:44:36', 'prititaliya2244@gmail.com'),
(43, 'meet', '$2y$10$m8.a9/uf1geV.DqDUF6aYOic.xqP9Hj2/ZtGxzrzyw2KonMZvN2Aa', 'user', '2022-01-13 16:53:24', 'meetukani156@gmail.com'),
(44, 'madhav', '$2y$10$ygjqHKbkT7grvYUIvfEf..tTfW.t/cmKQsz2EUIfESZapUETfjUta', 'user', '2022-01-13 16:54:10', 'madhavbhalani@gmail.com'),
(45, 'dev', '$2y$10$P6gROyb3/HZPJ8vsQ3sXJe8FSNsRgmfR/PPBuStSH8phcWivZ18fe', 'user', '2022-01-15 16:36:23', 'dev@dev.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`Faculty_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `sno` (`sno`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `Faculty_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD CONSTRAINT `Faculty_Details_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `tb_dept` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
