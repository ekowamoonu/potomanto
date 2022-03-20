$(document).ready(function(){
 
 //ajax to add new country to database
 $("#country_add_button").click(function(){
    
    var country_value=$("#country_value").val();

    //dont forget to add ajax loading gifs

    if(country_value!=""){
        $.post("parsers/poto_admin_parser.php",{country_value:country_value},function(data){
                
                if(data==true){
                	alert("New Country Added!");
                }
                else{alert("Error");}
               

        });//end ajax call

    }
    else{alert("Empty Field");}//run if country input field is empty

 });


 //ajax to remove country from database
 $("#country_remove").click(function(){
    
     var country=$("#country_list").val();

     $.post("parsers/poto_admin_parser.php",{country:country},function(data){
     	   if(data==true){alert("country removed");}
     	   else{alert(data);}
     });
   
 });


 //ajax to add institution to the database
 $("#institution_add_button").click(function(){
    
     var institution_country=$("#institution_country").val();
     var institution_value=$("#institution_value").val();

     if(institution_value!=""){
     	   
     $.post("parsers/poto_admin_parser.php",{institution_value:institution_value,institution_country:institution_country},function(data){
     	   if(data==true){
     	   	alert("Institution Added");
     	   }
     	   //else{alert(data);}
     });

     }

 });


//ajax to remove institution from the database
 $("#institution_remove_button").click(function(){
      
      var institution= $("#institution_list").val();
      
      if(institution!=""){

      	$.post("parsers/poto_admin_parser.php",{institution:institution},function(data){
                
                if(data==true){alert("institution removed");}

                 /*else{
                 	alert(data);
                 }
*/
      	});
      }

 }); 


 //ajax to add a faculty to the database
 $("#faculty_add_button").click(function(){
      
      var institution= $("#faculty_institution").val();
      var faculty_value=$("#faculty_value").val();


     
      if(faculty_value!=""){

      	$.post("parsers/poto_admin_parser.php",{faculty_value:faculty_value,institution_id:institution},function(data){
                
                if(data==true){alert("Faculty added");}

                 /*else{
                 	alert(data);
                 }*/

      	});
      }

 });

 //ajax to remove faculty from the database
 $("#remove_faculty_button").click(function(){
      
      var faculty= $("#faculty_list").val();
      
      if(faculty!=""){

      	$.post("parsers/poto_admin_parser.php",{faculty:faculty},function(data){
                
                if(data==true){alert("faculty removed");}

                /* else{
                 	alert(data);
                 }*/

      	});
      }

 }); 


//ajax to add a department to the database
 $("#add_department_button").click(function(){
      
      var faculty= $("#department_faculty").val();
      var department_value=$("#department_value").val();

     
      if(department_value!=""){

      	$.post("parsers/poto_admin_parser.php",{department_value:department_value,faculty_id:faculty},function(data){
                
                if(data==true){alert("Department Added");}

                 else{
                 	alert(data);
                 }

     	});
      }

 });

  //ajax to remove department from the database
 $("#remove_department_button").click(function(){
      
      var department= $("#department_list").val();

      if(department!=""){

      	$.post("parsers/poto_admin_parser.php",{department:department},function(data){
                
                if(data==true){alert("department removed");}

                /* else{
                 	alert(data);
                 }*/

      	});
      }

 }); 

 //ajax to add a new year group to the database
 $("#add_year_group_button").click(function(){
      
      var year_group=$("#year_group_value").val();

     
      if(year_group!=""){

      	$.post("parsers/poto_admin_parser.php",{year_group:year_group},function(data){
                
                if(data==true){alert("Year Group Added");}

                 else{
                 	alert(data);
                 }

     	});
      }

 });


  //ajax to remove year group from the database
 $("#remove_year_group_button").click(function(){
      
      var year= $("#year_group_list").val();

      if(year!=""){

      	$.post("parsers/poto_admin_parser.php",{year:year},function(data){
                
                if(data==true){alert("Year Group Removed");}

                /* else{
                 	alert(data);
                 }*/

      	});
      }

 }); 


});