<?php 
//include database connection
include('../functions.php'); 
include('../conn'.DS.'db_connection.php'); 
include('../classes'.DS.'querying_class.php');
include('../classes'.DS.'form_class.php');
include('../classes'.DS.'insertion_class.php');

$form_check=new FormDealer();
$insert=new Insertion();
$query_man=new DataQuery();

 ?>

 <?php
    
    //code snippet to handle insertion of country to country table
    if(isset($_POST['country_value'])){

    	if(!empty($_POST['country_value'])){
                
                $country=$form_check->cleanString($_POST['country_value']);
                $results=$insert->insert_this("COUNTRY","COUNTRY_NAME",$country);

                echo $results;

    	}
    }

    //code snippet to remove country from database
     if(isset($_POST['country'])){

    	if(!empty($_POST['country'])){
                
                $country=$_POST['country'];
                $results=$query_man->delete_by_id("COUNTRY","COUNTRY_ID",$country);

                echo $results.mysqli_error(DB_Connection::$connection);

    	}
    }

    //code snippet to add institution to the database
      if(isset($_POST['institution_value'])&&isset($_POST['institution_country'])){

    	if(!empty($_POST['institution_country'])&&!empty($_POST['institution_value'])){
                
                $country=$_POST['institution_country'];
                $value=$form_check->cleanString($_POST['institution_value']);

                $results=$insert->insert_this_foreign("INSTITUTION","INSTITUTION_NAME",$value,"C_ID",$country);

                echo $results.mysqli_error(DB_Connection::$connection);

    	}
    }

      //code snippet to remove institution from database
      if(isset($_POST['institution'])){

    	if(!empty($_POST['institution'])){
                
                $institution_id=$_POST['institution'];

                $results=$query_man->delete_by_id("INSTITUTION","INSTITUTION_ID",$institution_id);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }


     //code snippet to add new faculty to the database
     if(isset($_POST['faculty_value'])&&isset($_POST['institution_id'])){

    	if(!empty($_POST['institution_id'])&&!empty($_POST['faculty_value'])){
                
                $institution=$_POST['institution_id'];
                $value=$form_check->cleanString($_POST['faculty_value']);

                $results=$insert->insert_this_foreign("FACULTY","FACULTY_NAME",$value,"INST_ID",$institution);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }

     //code snippet to remove faculty from database
      if(isset($_POST['faculty'])){

    	if(!empty($_POST['faculty'])){
                
                $faculty_id=$_POST['faculty'];

                $results=$query_man->delete_by_id("FACULTY","FACULTY_ID",$faculty_id);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }


       //code snippet to add new department to the database
     if(isset($_POST['department_value'])&&isset($_POST['faculty_id'])){

    	if(!empty($_POST['faculty_id'])&&!empty($_POST['department_value'])){
                
                $faculty=$_POST['faculty_id'];


                $value=$form_check->cleanString($_POST['department_value']);

                $results=$insert->insert_this_foreign("DEPARTMENT","DEPARTMENT_NAME",$value,"FACU_ID",$faculty);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }

       //code snippet to remove department from database
      if(isset($_POST['department'])){

    	if(!empty($_POST['department'])){
                
                $department_id=$_POST['department'];

                $results=$query_man->delete_by_id("DEPARTMENT","DEPARTMENT_ID",$department_id);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }



       //code snippet to add new year group to the database
     if(isset($_POST['year_group'])){

    	if(!empty($_POST['year_group'])){
                
                $value=$form_check->cleanString($_POST['year_group']);

                $results=$insert->insert_this("YEARS","YEAR_GROUP",$value);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }



       //code snippet to remove year group from database
      if(isset($_POST['year'])){

    	if(!empty($_POST['year'])){
                
                $year_id=$_POST['year'];

                $results=$query_man->delete_by_id("YEARS","YEAR_GROUP_ID",$year_id);

                echo $results;//.mysqli_error(DB_Connection::$connection);

    	}
    }




 ?>