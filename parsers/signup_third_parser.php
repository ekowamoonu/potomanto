<?php 
//include database connection
include('../functions.php'); 
include('../conn'.DS.'db_connection.php'); 
include('../classes'.DS.'querying_class.php');
include('../classes'.DS.'form_class.php');
include('../classes'.DS.'insertion_class.php');

$query_man=new DataQuery();

 ?>

 <?php

 //getting the list of all institutions from a country
 if(isset($_POST['country'])){

 	if(!empty($_POST['country'])){

 		$rex="";
        $country=$_POST['country'];
 		$records=$query_man->find_by_col("INSTITUTION","C_ID",$country);

 		while($name=mysqli_fetch_assoc($records)){

 			    $value=$name['INSTITUTION_NAME'];
                $inst_id=$name['INSTITUTION_ID'];

 			    $rex.="<option value='{$inst_id}'>".$value."</option>";
 		}

 		echo $rex;

 	}
 }

  //getting the list of all faculties from an institution
 if(isset($_POST['institution'])){

 	if(!empty($_POST['institution'])){

 		$rex="";
        $institution=$_POST['institution'];
 		$records=$query_man->find_by_col("FACULTY","INST_ID",$institution);

 		while($name=mysqli_fetch_assoc($records)){

 			    $value=$name['FACULTY_NAME'];
                $facu_id=$name['FACULTY_ID'];

 			    $rex.="<option value='{$facu_id}'>".$value."</option>";
 		}

 		echo $rex;

 	}
 }

 //getting the list of all departments from a faculty
 if(isset($_POST['faculty'])){

 	if(!empty($_POST['faculty'])){

 		$rex="";
        $faculty=$_POST['faculty'];
 		$records=$query_man->find_by_col("DEPARTMENT","FACU_ID",$faculty);

 		while($name=mysqli_fetch_assoc($records)){

 			    $value=$name['DEPARTMENT_NAME'];
                $dept_id=$name['DEPARTMENT_ID'];

 			    $rex.="<option value='{$dept_id}'>".$value."</option>";
 		}

 		echo $rex;

 	}
 }



 ?>