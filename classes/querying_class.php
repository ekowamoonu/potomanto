 <?php

      /*main querying class*/
     class DataQuery extends DB_Connection{
          
          //find all returns the whole table record
     	   public function find_all($table){//selects everything from table
     	   	  $query="SELECT * FROM ".$table;
     	   	  $results=mysqli_query(parent::$connection,$query);
               
     	   	  return $results;
     	   }
             
          //find by id returns just one row as an associative array
     	   public function find_by_id($table,$column,$id){//selects everything from table by id
     	   	$query="SELECT * FROM ".$table." WHERE ".$column."=".$id;
     	   	$results=mysqli_query(parent::$connection,$query);

         /* if(!$results){echo mysqli_error(parent::$connection);}*/

     	   	$results_set=mysqli_fetch_assoc($results);

           return $results_set;
     	   }

         //find by col returns just one row as an associative array
         public function find_by_col($table,$column,$id){//selects everything from table by id
          $query="SELECT * FROM ".$table." WHERE ".$column."=".$id;
          $results=mysqli_query(parent::$connection,$query);

           return $results;
         }

         public function pagination_by_sql($table,$per_page,$offset){
            $query="SELECT * FROM ".$table." LIMIT ".$per_page." OFFSET ".$offset;
            $results=mysqli_query(parent::$connection,$query);

            return $results;
         }

           public function projects_pagination_by_sql($table,$per_page,$offset){
            $query="SELECT * FROM ".$table." ORDER BY UPLOAD_TIME DESC LIMIT ".$per_page." OFFSET ".$offset;
            $results=mysqli_query(parent::$connection,$query);

            return $results;
         }

           //count number of rows in table
           public function countNumber($table){
              $query="SELECT COUNT(*) FROM ".$table;
              $result=mysqli_query(parent::$connection,$query);
              $set=mysqli_fetch_array($result);

              return array_shift($set);
           }

           //deleting from database
           public function delete_by_id($table,$column,$id){
                $query="DELETE FROM ".$table." WHERE ".$column."=".$id;
                $results=mysqli_query(parent::$connection,$query);

               return $results?true:false;

           }


           //running the search filter
           public function run_search($per_page,$offset){
              $by_first=mysqli_real_escape_string(parent::$connection,$_POST['first_name']);
              $by_last=mysqli_real_escape_string(parent::$connection,$_POST['last_name']);
              $by_country=$_POST['country'];
              $by_institution=$_POST['institution'];
              $by_faculty=$_POST['faculty'];
              $by_department=$_POST['department'];
              $by_status=$_POST['status'];
              $by_year=$_POST['year'];
              $by_gender=$_POST['gender'];

              $query="SELECT * FROM POTOUSERS ";
              $conditions=array();

              if($by_first!=""){
                $conditions[]="FIRSTNAME LIKE '%{$by_first}%' ";
              }
              if($by_last!=""){
                $conditions[]="LASTNAME LIKE '%{$by_last}%' ";
              }
              if($by_country!="default"){
                 $conditions[]="CO_ID=".$by_country." ";

              }
               if($by_institution!="default"){
                 $conditions[]="IN_ID=".$by_institution." ";
              }
              if($by_faculty!="default"){
                 $conditions[]="FA_ID=".$by_faculty." ";
              }

              if($by_department!="default"){
                 $conditions[]="DEPT_ID=".$by_department." ";
              }
              if($by_status!="default"){
                $conditions[]="STATUS='{$by_status}' ";
              }
              if($by_year!="default"){
                $conditions[]="YEAR_GROUP='{$by_year}' ";
              }
               if($by_gender!="default"){
                $conditions[]="GENDER='{$by_gender}' ";
              }

              $sql=$query;

              if(count($conditions)>0){
                $sql.="WHERE ".implode(' AND ',$conditions)." LIMIT ".$per_page." OFFSET ".$offset;;
              }

            $result=mysqli_query(parent::$connection,$sql);

            //echo $result?"setttt":"not settt".mysqli_error(parent::$connection);
            
            return $result;

           }//function ends here

                //running the search filter
           public function run_project_search($per_page,$offset){
              $by_first=mysqli_real_escape_string(parent::$connection,$_POST['project_name']);
              $by_country=$_POST['country'];
              $by_institution=$_POST['institution'];
              $by_faculty=$_POST['faculty'];
              $by_department=$_POST['department'];
              $by_year=$_POST['year'];

              $query="SELECT * FROM PROJECTS ";
              $conditions=array();

              if($by_first!=""){
                $conditions[]="PROJECT_HEADER LIKE '%{$by_first}%' OR PROJECT_DESCRIPTION LIKE '%{$by_first}%'  ";
              }
             
              if($by_country!="default"){
                 $conditions[]="COUNT_ID=".$by_country." ";

              }
               if($by_institution!="default"){
                 $conditions[]="INSTITU_ID=".$by_institution." ";
              }
              if($by_faculty!="default"){
                 $conditions[]="FACUL_ID=".$by_faculty." ";
              }

              if($by_department!="default"){
                 $conditions[]="DEP_ID=".$by_department." ";
              }
            
              if($by_year!="default"){
                $conditions[]="YEAR_GROUP='{$by_year}' ";
              }

              $sql=$query;

              if(count($conditions)>0){
                $sql.="WHERE ".implode(' AND ',$conditions)." LIMIT ".$per_page." OFFSET ".$offset;
              }

            $result=mysqli_query(parent::$connection,$sql);

            //echo $result?"setttt":"not settt".mysqli_error(parent::$connection);
            
            return $result;

           }//function ends here


           public function update_portfolio($column,$value,$id){
              
              $query="UPDATE POTOUSERS SET ".$column."='{$value}' WHERE POTO_ID=".$id;
              $results=mysqli_query(parent::$connection,$query);

              return $results?true:false;

           }

           public function success_message($value,$level=""){

            if($level==""){
            $success=" <div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>
            <span aria-hidden='true'><i class='fa fa-times-circle'></i></span><span class='sr-only'>Close</span>
            </button><br/>
             {$value} Successfully Changed!
            </div>";}

            else if($level=="2"){
              $success=" <div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>
            <span aria-hidden='true'><i class='fa fa-times-circle'></i></span><span class='sr-only'>Close</span>
            </button><br/>
             {$value} Successfully Uploaded!
            </div>";

            }

             else if($level=="3"){
              $success=" <div class='alert alert-danger' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>
            <span aria-hidden='true'><i class='fa fa-times-circle'></i></span><span class='sr-only'>Close</span>
            </button><br/>
             {$value} Upload Failed! Make sure all fields marked with ** are not empty and file with the proper extensions are uploaded
            </div>";

            }

              else if($level=="4"){
              $success=" <div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>
            <span aria-hidden='true'><i class='fa fa-times-circle'></i></span><span class='sr-only'>Close</span>
            </button><br/>
             {$value} removed! Changes will be seen on page refresh.
            </div>";

            }

               return $success;
           }
     

     }


     ?>