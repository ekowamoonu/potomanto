$(document).ready(function(){

   //hide search fields till a higher filter category is clicked
    $("#institution").hide();
    $("#faculty").hide();
    $("#department").hide();

    

     //ajax call to select all insitutions in specific country
     $("#country").change(function(){
             
             var country=$("#country").val();
             $("#institution").slideDown();

             if(country!="default"){
                 
              $(".modal-title").html("Retreiving Insitutions... <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{country:country},function(data){
                   
                   $("#institution").html('<option value="default" class="institution">Institution Of Project</option>'+data);
                   //alert(data);
                   $(".modal-title").html("Further search by the specific institution");

             	});
             }

     });

      //ajax call to select all faculties in specific institution
     $("#institution").change(function(){
             
           /*  var institution=$("#institution").val();*/
             $("#faculty").slideDown();

           /*  if(institution!="default"){
                 
             $(".modal-title").html("Retreiving Faculties... <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{institution:institution},function(data){
                   
                   $("#faculty").html('<option value="default">School Or Faculty Project Is Found</option>'+data);
                   //alert(data);
                   $(".modal-title").html("You can be more specific with the faculty...");

             	});
             }*/

     });

       //ajax call to select all departments in specific faculty
     $("#faculty").change(function(){
             
             var faculty=$("#faculty").val();
             $("#department").slideDown();

             if(faculty!="default"){
                 
              $(".modal-title").html("Getting the departments... <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{faculty:faculty},function(data){
                   
                   $("#department").html(' <option value="default">Specific Department</option>'+data);
                   //alert(data);
                   $(".modal-title").html("And the department as well...");

             	});
             }

     });


       //ajax call to select change header on department chnage
     $("#department").change(function(){
             
             var department=$("#department").val();

             if(department!="default"){
                 
              $(".modal-title").html("Cool!");
          
             }
     });



});