<?php
   include('../conn/db_connection.php');//contains database class
   $conn=new DB_Connection();
    
   /*create country table*/ 
   $country_table="CREATE TABLE IF NOT EXISTS COUNTRY(";
   $country_table.="COUNTRY_ID INT AUTO_INCREMENT,";
   $country_table.="COUNTRY_NAME VARCHAR(20),";
   $country_table.="PRIMARY KEY(COUNTRY_ID)";
   $country_table.=");";

   $conn->run_table_query($country_table,"COUNTRY");

   //create institution table
   $institution_table="CREATE TABLE IF NOT EXISTS INSTITUTION(";
   $institution_table.="INSTITUTION_ID INT AUTO_INCREMENT,";
   $institution_table.="C_ID INT,";
   $institution_table.="INSTITUTION_NAME VARCHAR(50) NULL,";
   $institution_table.="PRIMARY KEY (INSTITUTION_ID),";
   $institution_table.="FOREIGN KEY(C_ID) REFERENCES COUNTRY(COUNTRY_ID) ";
   $institution_table.="ON DELETE CASCADE ON UPDATE CASCADE);";
   
   $conn->run_table_query($institution_table,"INSTITUTION");

   //create faculty table
   $faculty_table="CREATE TABLE IF NOT EXISTS FACULTY(";
   $faculty_table.="FACULTY_ID INT AUTO_INCREMENT,";
   $faculty_table.="INST_ID INT,";
   $faculty_table.="FACULTY_NAME VARCHAR(70),";
   $faculty_table.="PRIMARY KEY(FACULTY_ID),";
   $faculty_table.="FOREIGN KEY(INST_ID) REFERENCES INSTITUTION(INSTITUTION_ID) ";
   $faculty_table.="ON DELETE CASCADE ON UPDATE CASCADE);";

   $conn->run_table_query($faculty_table,"FACULTY");

   //create department table
   $faculty_table="CREATE TABLE IF NOT EXISTS DEPARTMENT(";
   $faculty_table.="DEPARTMENT_ID INT AUTO_INCREMENT,";
   $faculty_table.="FACU_ID INT,";
   $faculty_table.="DEPARTMENT_NAME VARCHAR(70),";
   $faculty_table.="PRIMARY KEY(DEPARTMENT_ID),";
   $faculty_table.="FOREIGN KEY(FACU_ID) REFERENCES FACULTY(FACULTY_ID) ";
   $faculty_table.="ON DELETE CASCADE ON UPDATE CASCADE);";

   $conn->run_table_query($faculty_table,"DEPARTMENT");

    //create year group table
   $year_table="CREATE TABLE IF NOT EXISTS YEARS(";
   $year_table.="YEAR_GROUP_ID INT AUTO_INCREMENT,";
   $year_table.="YEAR_GROUP VARCHAR(70),";
   $year_table.="PRIMARY KEY(YEAR_GROUP_ID) );";

   $conn->run_table_query($year_table,"YEAR GROUP");

   //create employee  table
   $employee_table="CREATE TABLE IF NOT EXISTS EMPLOYEE(";
   $employee_table.="EMPLOYEE_ID INT AUTO_INCREMENT,";
   $employee_table.="EMPLOYEE_USER_NAME  VARCHAR(70),";
   $employee_table.="EMPLOYEE_PASSWORD   VARCHAR(120),";
   $employee_table.="EMPLOYEE_NAME  VARCHAR(70),";
   $employee_table.="EMPLOYEE_PHONE VARCHAR(20),";
   $employee_table.="EMPLOYEE_EMAIL VARCHAR(70),";
   $employee_table.="EMPLOYEE_LOCATION VARCHAR(70),";
   $employee_table.="PRIMARY KEY(EMPLOYEE_ID) );";

   $conn->run_table_query($employee_table,"EMPLOYEE");


    //create employee  table
   $job_alert_table="CREATE TABLE IF NOT EXISTS JALERTS(";
   $job_alert_table.="JALERT_ID INT AUTO_INCREMENT,";
   $job_alert_table.="EMP_ID  INT,";
   $job_alert_table.="JALERT_HEADER  VARCHAR(40),";
   $job_alert_table.="JALERT_CONTENT TEXT,";
   $job_alert_table.="JALERT_TIME TIMESTAMP,";
   $job_alert_table.="JALERT_DURATION VARCHAR(20),";
   $job_alert_table.="URGENCY VARCHAR(15),";
   $job_alert_table.="PRIMARY KEY(JALERT_ID), ";
   $job_alert_table.="FOREIGN KEY(EMP_ID) REFERENCES EMPLOYEE(EMPLOYEE_ID) ON DELETE CASCADE ON UPDATE CASCADE );";

   $conn->run_table_query($job_alert_table,"JOB ALERTS TABLE");


   //create the largest table-potomanto-users table
   $users="CREATE TABLE IF NOT EXISTS POTOUSERS(";
   $users.="POTO_ID INT AUTO_INCREMENT, ";
   $users.="P_USERNAME VARCHAR(20),";
   $users.="P_PASSWORD VARCHAR(130),";
   $users.="FIRSTNAME VARCHAR(20),";
   $users.="LASTNAME VARCHAR(30),";
   $users.="EMAIL VARCHAR(20),";
   $users.="CALL_LINE VARCHAR(20),";
   $users.="WHATSAPP_LINE VARCHAR(20),";
   $users.="FACEBOOK_NAME VARCHAR(30),";
   $users.="GENDER VARCHAR(2),";
   $users.="CO_ID INT,";
   $users.="IN_ID INT,";
   $users.="FA_ID INT,";          
   $users.="DEPT_ID INT,";
   $users.="STATUS VARCHAR(20),";
   $users.="YEAR_GROUP VARCHAR(20),";
   $users.="SPECIALITY VARCHAR(50),";
   $users.="CURRENTLY TEXT,";
   $users.="MMT TEXT,";  
   $users.="MCT TEXT,"; 
   $users.="FAVORITE_COURSE VARCHAR(25),"; 
   $users.="AMBITIONS TEXT,"; 
   $users.="TEAM_WORK VARCHAR(5),"; 
   $users.="HUMAN_RELATIONS VARCHAR(5),"; 
   $users.="PERSONALITY_ATTITUDE VARCHAR(5),"; 
   $users.="OPENESS VARCHAR(5),"; 
   $users.="PROFILE_PHOTO VARCHAR(40),"; 
   //$users.="FINAL_YR_DOC VARCHAR(40),"; 
   $users.="CV VARCHAR(30),"; 
   $users.="PRIMARY KEY(POTO_ID),"; 
   $users.="FOREIGN KEY(CO_ID) REFERENCES COUNTRY(COUNTRY_ID) ON DELETE CASCADE ON UPDATE CASCADE,"; 
   $users.="FOREIGN KEY(IN_ID) REFERENCES INSTITUTION(INSTITUTION_ID) ON DELETE CASCADE ON UPDATE CASCADE,"; 
   $users.="FOREIGN KEY(FA_ID) REFERENCES FACULTY(FACULTY_ID) ON DELETE CASCADE ON UPDATE CASCADE,"; 
   $users.="FOREIGN KEY(DEPT_ID) REFERENCES DEPARTMENT(DEPARTMENT_ID) ON DELETE CASCADE ON UPDATE CASCADE );"; 


   $conn->run_table_query($users,"POTO USERS TABLE");

   //create poto user posts table
   $user_alerts="CREATE TABLE IF NOT EXISTS UPOSTS(";
   $user_alerts.="POST_ID INT AUTO_INCREMENT,";
   $user_alerts.="PERSON_POSTING_ID INT,";
   $user_alerts.="POST_HEADER VARCHAR(30),";
   $user_alerts.="POST_CONTENT TEXT,";
   $user_alerts.="POST_AVAILABILITY VARCHAR(40),";
   $user_alerts.="POST_IMAGE VARCHAR(40),";
   $user_alerts.="POST_TIME TIMESTAMP,";
   $user_alerts.="URGENCY VARCHAR(15),";
   $user_alerts.="PRIMARY KEY(POST_ID),";
   $user_alerts.="FOREIGN KEY(PERSON_POSTING_ID) REFERENCES POTOUSERS(POTO_ID) ON DELETE CASCADE ON UPDATE CASCADE";
   $user_alerts.=");";

   $conn->run_table_query($user_alerts,"POTO USER POSTS TABLE");

   //createproject table
   $project="CREATE TABLE IF NOT EXISTS PROJECTS(";
   $project.="PROJECT_ID INT AUTO_INCREMENT,";
   $project.="USER_POSTING_ID INT,";
   $project.="COUNT_ID INT,";
   $project.="INSTITU_ID INT,";
   $project.="FACUL_ID INT,";
   $project.="DEP_ID INT,";
   $project.="YEAR_GROUP VARCHAR(30),";
   $project.="PROJECT_HEADER VARCHAR(30),";
   $project.="PROJECT_DESCRIPTION TEXT,";
   $project.="PROJECT_IMAGE VARCHAR(40),";
   $project.="PROJECT_FILE VARCHAR(40),";
   $project.="PROJECT_STATUS VARCHAR(15),";
   $project.="PROJECT_AVAILABILITY VARCHAR(12),";
   $project.="PRIMARY KEY(PROJECT_ID),";
   $project.="FOREIGN KEY(USER_POSTING_ID) REFERENCES POTOUSERS(POTO_ID) ON DELETE CASCADE ON UPDATE CASCADE,";
   $project.="FOREIGN KEY(COUNT_ID) REFERENCES COUNTRY(COUNTRY_ID) ON DELETE CASCADE ON UPDATE CASCADE,";
   $project.="FOREIGN KEY(INSTITU_ID) REFERENCES INSTITUTION(INSTITUTION_ID) ON DELETE CASCADE ON UPDATE CASCADE,";
   $project.="FOREIGN KEY(FACUL_ID) REFERENCES FACULTY(FACULTY_ID) ON DELETE CASCADE ON UPDATE CASCADE,";
   $project.="FOREIGN KEY(DEP_ID) REFERENCES DEPARTMENT(DEPARTMENT_ID) ON DELETE CASCADE ON UPDATE CASCADE";
   $project.=");";

   $conn->run_table_query($project,"PROJECTS TABLE");


   //announcements table
   $announcement="CREATE TABLE IF NOT EXISTS ANNOUNCEMENTS(";
   $announcement.="ANNOUNCEMENT_ID INT AUTO_INCREMENT,";
   $announcement.="ANNOUNCEMENT TEXT,";
   $announcement.="PRIMARY KEY(ANNOUNCEMENT_ID)";
   $announcement.=");";

   $conn->run_table_query($announcement,"ANNOUNCEMENTS TABLE");

   //alter projects table and add new column
   $alter_projects="ALTER TABLE PROJECTS ADD COLUMN UPLOAD_TIME TIMESTAMP DEFAULT NOW();";
   $query=mysqli_query(DB_Connection::$connection,$alter_projects);
   if($query){
      echo "<h2 style='color:green;'>PROJECTS TABLE ATERED</h2>";
   }


?>