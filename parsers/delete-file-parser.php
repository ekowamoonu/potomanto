<?php
//include database connection
include('../functions.php'); 
include('../conn'.DS.'db_connection.php'); 
include('../classes'.DS.'querying_class.php');

$query_guy=new DataQuery();

/*record deletion*/
if(isset($_GET['delete'])&&isset($_GET['name'])){
	 
	 $delete_result=mysqli_query(DB_Connection::$connection,"DELETE FROM PROJECTS WHERE PROJECT_ID=".(int)$_GET['delete']);

	                  /*reading project file and deleting from user projects folder*/
                          $geo="../user_projects".DS;
                          $ha=opendir($geo);
                          if($ha)
                          {
                             while($p_file=readdir($ha))
                              {

                                if($p_file!='.'&&$p_file!='..'&&$p_file==$_GET['name'])
                                    {
                                        $file=$p_file;
                                        unlink('../user_projects'.DS.$file);

                                        break;
                          
                                    }
                                
                              }


                           }//end handle

}

/*******************end record deletion***************************************/

/*refreshing documents*/
/*if(isset($_POST['something'])){
      if(!empty($_POST['something'])){
          
          $id=$_POST['something'];
          $project_list=$query_guy->find_by_col("PROJECTS","USER_POSTING_ID",$id);
           $p_list="";

                while($row_set=mysqli_fetch_assoc($project_list)){

                  $project_id=$row_set['PROJECT_ID'];
                  $original_file=$row_set['PROJECT_FILE'];
                  $project_file=strlen($row_set['PROJECT_FILE'])>20?substr($row_set['PROJECT_FILE'],0,20).'...':$row_set['PROJECT_FILE'];
                  

                  $p_list.='<div id="record-'.$project_id.'" class="recorder-'.$original_file.'">
                                   <a href="#" class="delete"><i class="fa fa-file fa-fw"></i>'.$project_file.'<i class="fa fa-times-circle fa-fw"></i></a></div>';


                   }
  
             echo $p_list;
      }

}
*/

?>