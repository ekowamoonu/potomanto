var project_submit;
var delete_project;
var refresh_doc_list;

$(document).ready(function(){


      project_submit=function(user_id){
      
          var poto_id=user_id;

          //logic here
          /*
              1. disable upload buttonafter file is uploaded to avoid multiple uploads
              2. reset form fields to null and re enable upload button after all details are finally submitteds
          */
          
          //get document details
          var doc_title=$("#doc_title").val();
          var doc_description=$("#doc_description").val();
          var doc_availability=$("#doc_availability").val();
          var doc_status=$("#doc_status").val();
          var file_name=$("#filename").val();

          //doc submit changes html based on current upload status


          if(doc_title==""||doc_description==""||doc_availability=="default"||doc_status=="default"||file_name=="undefined"||file_name==""){
          	alert("Illegal Upload! Please Check that all parameters have been set and your document has been uploaded");
          } 

          else{//code to run if there are no unset form fields and uploads has been completed successfully
                   
		          $(".button-div h6").html("<img src='images/loading.png' class='img-responsive'/>");
		          $("#doc_title,#doc_description,#doc_availability,#doc_status").css("opacity",0.5).prop("disabled",true);
            
          	     //begin ajax request
                $.post("parsers/doc-upload-parser.php",{poto_id:poto_id,doc_title:doc_title,doc_description:doc_description,doc_availability:doc_availability,
                 doc_status:doc_status,file_name:file_name},function(data){
                  
                  if(data==2){
                  	$('#fileupload').prop("disabled",false);
                  	$(".button-div h6").attr("style","color:green;").html(" &#x2713; Upload Successful!");
                  	$("#doc_title,#doc_description,#doc_availability,#doc_status").css("opacity",1).prop("disabled",false);

                     //after that, clear input fields for new upload
                  	setTimeout(function(){
                  		$(".button-div h6").html("");
                  		$("#doc_description,#doc_title").val("");
                  	},4000);
                  }//end if data
                          

            });//end ajax request

          }

         


      }//end function


      
      //deleting a project
      $("a.delete").click(function(e){
           
           e.preventDefault();
           
          var parent=$(this).parent();

          $.ajax({
            type:'get',
            url: 'parsers/delete-file-parser.php',
            data:'ajax=1&delete='+parent.attr('id').replace("record-","")+'&name='+parent.attr('class').replace('recorder-',""),
            beforeSend: function(){
              parent.animate({'backgroundColor':'#fb6c6c'},300)
            },
            success:function(){
              parent.slideUp(350,function(){
                parent.remove();
              });
            }

          });

      });//end click delete function

     
     /*constant refreshing of uploaded documents list*/
   /*  refresh_doc_list=function(user_id){
            
            setInterval(function(){
                    var something=user_id;
                    $.post("parsers/delete-file-parser.php",{something:something},function(data){
                           
                           $("#documents ul").html(data);
                    });
    
            },10000);

     }
*/



});