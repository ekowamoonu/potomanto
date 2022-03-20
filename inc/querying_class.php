 <?php

     include('../conn/db_connection.php');//includes database connection class

      /*main querying class*/
     class DataQuery extends DB_Connection{

             //find all returns the whole table record
     	   public function find_all($table){//selects everything from table
     	   	  $query="SELECT * FROM ".$table;
     	   	  $results=mysqli_query(parent::$connection,$query);
               
     	   	  return $results;
     	   }
             
             //find by id returns just one row as an associative array
     	   public function find_by_id($table,$id){//selects everything from table by id
     	   	$query="SELECT * FROM ".$table." WHERE $id=".$id;
     	   	$results=mysqli_query(parent::$connection,$query);
     	   	$results_set=mysqli_fetch_assoc($results);

               return $results_set;
     	   }
     }


     ?>