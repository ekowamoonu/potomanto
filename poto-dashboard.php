<?php ob_start();

/*if(!isset($_SESSION['login_id'])){header("Location: login");}*/
if(!isset($_COOKIE['log'])){header("Location: login");}
else{
  $id=$_COOKIE['log'];
}


//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
include('classes'.DS.'querying_class.php');

$query_guy=new DataQuery();


/*Get firstname and lastname records about user*/
$record=$query_guy->find_by_id("POTOUSERS","POTO_ID",$id);

$firstname=ucfirst($record['FIRSTNAME']); 
$lastname=ucfirst($record['LASTNAME']);
$name=" ".$firstname." ".$lastname;


/*this code passes the user's id to a js funtion which sends this id to doc-upload-parser to be used for 
project submission*/
$submit_link="onclick=\"project_submit('{$id}');\" ";

$refresh_link="onload=\"refresh_doc_list('{$id}');\" ";

/*listing all projects by the user*/

//select all documents posted by user 
//pass id's to a delete link and use js to do the rest
$project_list=$query_guy->find_by_col("PROJECTS","USER_POSTING_ID",$id);
$p_list="";

while($row_set=mysqli_fetch_assoc($project_list)){

  $project_id=$row_set['PROJECT_ID'];
  $original_file=$row_set['PROJECT_FILE'];
  $project_file=strlen($row_set['PROJECT_FILE'])>20?substr($row_set['PROJECT_FILE'],0,20).'...':$row_set['PROJECT_FILE'];
  

  $p_list.='<div id="record-'.$project_id.'" class="recorder-'.$original_file.'">
                   <a href="#" class="delete"><i class="fa fa-file fa-fw"></i>'.$project_file.'<i class="fa fa-times-circle fa-fw"></i></a></div>';


  
  
}


?>



<?php include("inc/header.php"); ?>
 <title><?php echo $firstname."'s Poto-Dashboard"; ?></title>
<link rel="stylesheet" href="css/dashboard.css"/>
</head>

<body <?php //echo $refresh_link; ?>>

	 <nav class="navbar navbar-inverse navbar-fixed-right">
	     <div class="navbar-header"> 
	        <button type="button" class="navbar-toggle collapsed" data-target="#collapsemenu" data-toggle="collapse">
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a href="index" style="margin-top:-7px;"  class="navbar-brand"><img width="200" class="img-responsive pull-left animated wow bounceInDown " src="images/poto.png"/></a>
	       <!--  <a href="#" class="navbar-brand"><span><i class="fa fa-barcode fa-fw"></i></span>Nelson Storm</a> -->
	       <!-- <img src="logo.jpg" class="img-responsive img-circle"/> -->
	     </div>
	    <div class="collapse navbar-collapse pull-right" id="collapsemenu">
        <ul class="nav navbar-nav">
            <li><a href="#" ><i class="fa fa-user"></i> <?php echo $name; ?></a></li>
        </ul>

     </div>

</nav>


<div class="container-fluid">

	<div class="col-md-2">
		<div class="sidebar content-box" style="display: block;">
           <ul class="nav">
                    <!-- Main menu -->
             <li class="current submenu"><a href="#"><i class="fa fa-file"></i> Document Upload <span class="caret pull-right"></span></a>

                    	<ul>
                            <li><a href="#" data-toggle="modal" data-target="#documents"><i class="fa fa-folder"></i> My Uploads</a></li>
                            <li><a href="documents-from-my-department"><i class="fa fa-folder"></i> Documents From My Department</a></li>
                        </ul>
                    </li>
                    <li><a href="profile-settings"><i class="fa fa-gears"></i>Profile Settings</a><li>
                    <li><a href="projects" id="profile_settings"><i class="fa fa-book"></i> Poto-Library</a><li>
                     <li><a href="person-potomanto?poto987xyzpotyuisid=<?php echo $id;  ?>" ><i class="fa fa-user"></i> <span>See My Live Profile</span></a></li>
                    <li><a href="forum-landing"><i class="fa fa-comment"></i> Poto-Forum</a></li>
                     <li><a href="#"><i class="fa fa-calendar"></i> <?php echo date("d/M/y",time()); ?></a></li>
                    <li><a href="logout"><i class="fa fa-exclamation-circle"></i> Logout</a></li>
                     <li><a href="#"  onclick="alert('Feature under construction');"><!-- <i class="fa fa-paper-plane"></i> Send Quick .... --></a></li>
           </ul>
        </div>
	</div><!--end of side bar-->




<div class="col-md-4">
		<p style="background-color:white;padding:5px;color:red;font-size:12px;font-weight:bold;"><i class="fa fa-exclamation-circle"></i> <?php echo $firstname; ?>, Please add the details of the document you choose in the proceeding form after upload is complete, else the document will not be listed on this platform. Executable files will be denied upload permission. If your document is not allowed, please zip it and try uploading again. Wait for an upload success message before proceeding.</p>
		<div class="upload-box  text-center">
			<label class="btn btn-info btn-file">
     <i class="fa fa-folder-open"></i> Choose Document<input id="fileupload" type="file" name="files[]" multiple style="display:none;"/>
			</label>
	    </div>

	<div class="progress" id="progress">
		<div class="progress-bar  progress-bar-theme progress-bar-striped active" role="progressbar"></div>
     </div>
	<div id="files" class="files"></div>
</div><!--end upload box-->


<div class="col-md-6">
	  <div class="doc-upload-card">
		 <form class="form-horizontal">
			<div class="form-group">
			  <label for="doc_title" class="col-sm-2 control-label">Document Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control"  id="doc_title">
				</div>
			</div>
			<div class="form-group">
			  <label for="doc_description" class="col-sm-2 control-label">Document Description</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="doc_description"  rows="3"></textarea>
				</div>
			</div>
		    <div class="form-group">
			  <label for="doc_availability" class="col-sm-2 control-label">Document Availability</label>
				<div class="col-sm-10">
					<select class="form-control" id="doc_availability">
                        <option value="default">Select Availability Of Project To Other Users</option>
                        <option value="open">Open To Other Users To Download</option>
                        <option value="closed">Closed To Other Users To Download</option>
                    </select>
				</div>
			</div>
			<div class="form-group">
			  <label for="doc_status" class="col-sm-2 control-label">Completion Status</label>
				<div class="col-sm-10">
					<select class="form-control" id="doc_status">
                        <option value="default">Choose the status of project</option>
                        <option value="ongoing">Still Ongoing</option>
                        <option value="paused">Paused</option>
                        <option value="ended">Ended</option>
                    </select>
				</div>
			</div>				

			<input type="text" style="display:none;" id="filename"/>

			<div class="form-group button-div-parent">
			  <div class="col-sm-offset-2 col-sm-10 button-div">
			  <a href="#" class="btn btn-primary" <?php echo $submit_link; ?> id="doc_submit">Add Document Details</a>
              <h6 class="text-center"></h6>
			  </div>
			</div>
		</form>
	  </div>
	</div><!--end project card-->


</div>


			<!--uploaded documents-->
			 <div class="modal fade" id="documents" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">My Uploaded Files</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                          	<ul class="nav">

                          		<?php echo $p_list; ?>
								<!-- <li><i class="fa fa-file fa-fw"></i> jsjword.docx <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> peter.jpg <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> memember.css <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> file.zip <i class="fa fa-trash fa-fw"></i></li> -->
							           </ul>
                            
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
             </div><!--modal div ends-->
   



<?php include("inc/footer.php"); ?>

<script>
        new WOW().init();
</script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>

<script type="text/javascript">
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
/*var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'parsers/handler-index.php';*/
   var url = 'parsers/handler-index.php';

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                 $('<p/>').text(file.name+" upload complete! Please provide document details in the form").appendTo('#files');
                 $('#fileupload').prop("disabled",true);
                 $("#filename").val(file.name);
                 console.log(data);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>

<script type="text/javascript">
   $(function(){
	  $(".submenu > a").click(function(e) {
	    e.preventDefault();
		    var $li = $(this).parent("li");
		    var $ul = $(this).next("ul");

		    if($li.hasClass("open")) {
			      $ul.slideUp(350);
			      $li.removeClass("open");
		    } else {
			      $(".nav > li > ul").slideUp();
			      $(".nav > li").removeClass("open");
			      $ul.slideDown();
			      $li.addClass("open");
	      }
  });
});
</script>

<script type="text/javascript" src="js/layout.js"></script>
</body>
</html>      <!--  progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled'); -->
