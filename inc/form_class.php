 <?php 
      
      /*include database class*/
     include('../conn/db_connection.php');
    

      class FormDealer extends DB_Connection{

          //check whether field is empty
     	  public function emptyField($value){
			  	    if(empty($value)||$value==""||$value=="default"){return true;}
			       else{return false;}
               }

          //clean form input
          public function cleanString($val){
				     $cleaned= mysqli_real_escape_string(parent::$connection,$val);
				     $final=strip_tags($cleaned);

				     return $final;
               }

           public function illegalExt($sample){
		          if(end(explode(".",$sample))=="bat"||end(explode(".",$sample))=="exe"){return true;}
		          else{return false;}
		      }


     }
   
 ?>