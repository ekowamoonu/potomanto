$(document).ready(function(){

	//hide all content but show stats
	$(".statistics-content").show();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();

   /*poto users toggle*/
 $(".pusers").click(function(){

    $(".statistics-content").hide();
	$(".poto-users").show();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });


 $(".stats").click(function(){
    $(".statistics-content").show();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });
 /*$(".pusers").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").show();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });*/

 $(".pschools").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").show();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });

 $(".pualerts").click(function(){

    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").show();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });
 $(".pemployers").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").show();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });
 $(".pjalerts").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").show();
	$(".poto-quick-mail").hide();
	$(".poto-admins").hide();
  	 
  });

 $(".pmail").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").show();
	$(".poto-admins").hide();
  	 
  });



 $(".padmin").click(function(){
    $(".statistics-content").hide();
	$(".poto-users").hide();
	$(".poto-schools").hide();
	$(".poto-user-alerts").hide();
	$(".poto-employers").hide();
	$(".poto-job-alerts").hide();
	$(".poto-quick-mail").hide();
	$(".poto-admins").show();
  	 
  });



});