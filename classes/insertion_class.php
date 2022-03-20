  <?php  
  
     class Insertion extends DB_Connection{

               //these insert function is specially for the admin panel
               //normal insert function
               public function insert_this($table,$column,$value){
                   
                   $insert_query="INSERT INTO ".$table."(".$column.") VALUES('{$value}')";
                   $results=mysqli_query(parent::$connection,$insert_query);

                   return $results?true:false;//.mysqli_error(parent::$connection);

               }

                //insert function for tables with foreign keys
                public function insert_this_foreign($table,$column,$value,$foreign_column,$foreign_value){
                   
                   $insert_query="INSERT INTO ".$table."(".$foreign_column.",".$column.") VALUES('{$foreign_value}','{$value}')";
                   $results=mysqli_query(parent::$connection,$insert_query);

                   return $results?true:false;//.mysqli_error(parent::$connection);

               }

     }


   ?>