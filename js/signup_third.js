$(document).ready(function(){

     //ajax call to select all insitutions in specific country
     $("#country").change(function(){
             
             var country=$("#country").val();

             if(country!="default"){
                 
                $(".form-head").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{country:country},function(data){
                   
                   $("#institution").html('<option value="default" class="institution">Name Of Your University</option>'+data);
                   //alert(data);
                   $(".form-head").html("A Little Info About Your Academic Life");

             	});
             }

     });

      //ajax call to select all faculties in specific institution
/*     $("#institution").change(function(){
             
             var institution=$("#institution").val();

             if(institution!="default"){
                 
                $(".form-head").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{institution:institution},function(data){
                   
                   $("#faculty").html('<option value="default">School/Faculty You Belong To</option>'+data);
                   //alert(data);
                   $(".form-head").html("A Little Info About Your Academic Life");

             	});
             }

     });*/

       //ajax call to select all departments in specific faculty
     $("#faculty").change(function(){
             
             var faculty=$("#faculty").val();

             if(faculty!="default"){
                 
                $(".form-head").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
             	$.post("parsers/signup_third_parser.php",{faculty:faculty},function(data){
                   
                   $("#department").html(' <option value="default">Your Specific Department</option>'+data);
                   //alert(data);
                   $(".form-head").html("A Little Info About Your Academic Life");

             	});
             }

     });

});