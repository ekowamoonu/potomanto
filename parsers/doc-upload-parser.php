<?php 

//include database connection
include('../functions.php'); 
include('../conn'.DS.'db_connection.php'); 
include('../classes'.DS.'querying_class.php');
include('../classes'.DS.'form_class.php');
include('../classes'.DS.'insertion_class.php');

$query_guy=new DataQuery();
$form_man=new FormDealer();

$success="";

//set sql scheduler on
/*$query=mysqli_query(DB_Connection::$connection,"SET GLOBAL event_scheduler= 1;");*/




if(isset($_POST['poto_id'])&&
  isset($_POST['doc_title'])&&
  isset($_POST['doc_description'])&&
  isset($_POST['doc_availability'])&&
  isset($_POST['doc_status'])&&
  isset($_POST['file_name'])
  ){

      if(!empty($_POST['poto_id'])&&
        !empty($_POST['doc_title'])&&
        !empty($_POST['doc_description'])&&
        !empty($_POST['doc_availability'])&&
        !empty($_POST['doc_status'])&&
        !empty($_POST['file_name'])
        ){
              $id=$_POST['poto_id'];
              $p_file=$_POST['file_name'];
              /*Get all records about user*/
              $record=$query_guy->find_by_id("POTOUSERS","POTO_ID",$id);


              /*These records are to be used for the project submition*/
              $country=$record['CO_ID'];
              $institution=$record['IN_ID'];
              $faculty=$record['FA_ID'];
              $department=$record['DEPT_ID'];
              $year=$record['YEAR_GROUP'];
              /********************************************************/


              $project_title=$form_man->cleanString($_POST['doc_title']);
              $project_description=$form_man->cleanString($_POST['doc_description']);
              $project_availability=$form_man->cleanString($_POST['doc_availability']);
               /*$project_exp=$form_man->cleanString($_POST['project_expiry']);*/
              $project_status=$form_man->cleanString($_POST['doc_status']);
              $project_documentation=$form_man->cleanString($p_file);
              $current_time=time();
              $upload_time=strftime("%Y-%m-%d %H:%M:%S",$current_time);


              /*insert project details into database*/
               $project_insert="INSERT INTO PROJECTS(USER_POSTING_ID,COUNT_ID,INSTITU_ID,FACUL_ID,DEP_ID,YEAR_GROUP,PROJECT_HEADER,PROJECT_DESCRIPTION,PROJECT_IMAGE,PROJECT_FILE,PROJECT_STATUS,PROJECT_AVAILABILITY,UPLOAD_TIME) VALUES(";
               $project_insert.="'{$id}',";
               $project_insert.="'{$country}',";
               $project_insert.="'{$institution}',";
               $project_insert.="'{$faculty}',";
               $project_insert.="'{$department}',";
               $project_insert.="'{$year}',";
               $project_insert.="'{$project_title}',";
               $project_insert.="'{$project_description}',";
               $project_insert.="'nothing',";
               $project_insert.="'{$project_documentation}',";
               $project_insert.="'{$project_status}',";
               $project_insert.="'{$project_availability}',";
                $project_insert.="'{$upload_time}'";
               $project_insert.=");";

               $project_query=mysqli_query(DB_Connection::$connection,$project_insert);

               if($project_query){echo 2;}

      }//end second main if

}//end main if


/*deleting a document*/



