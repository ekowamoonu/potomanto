<?php ob_start();
session_start();
//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');


//$signup_id=$_SESSION['id'];
//make sure to check if the get id is set else redirect the page

$query_guy=new DataQuery();
$form_man=new FormDealer();

$document="";

if(isset($_GET['details'])){
    
    $id=$form_man->cleanString($_GET['details']);
    $results=$query_guy->find_by_id("PROJECTS","PROJECT_ID",$id);

    $project_head=strtoupper($results['PROJECT_HEADER']);
    $project_description=$results['PROJECT_DESCRIPTION'];
    $project_status=$results['PROJECT_STATUS'];
    $project_availability=$results['PROJECT_AVAILABILITY'];
    $project_file=$results['PROJECT_FILE'];
    $project_faculty=$results['FACUL_ID'];
    $project_owner=$results['USER_POSTING_ID'];

     

    //read projects documents from user projects
    /*reading project documents*/
                     /*     $location="user_projects".DS;
                          $handle=opendir($location);
                          if($handle)
                          {

                             while($file=readdir($handle))
                              {
                        
                                if($file!='.'&&$file!='..'&&$file==$project_file)
                                    {
                                        echo $file;
                                        $p_file=$file;
                                    
                                        break;
                             
                                    }
                                
                              }


                           }*///end handle


      //selecting project onwer details
     $p_owner=$query_guy->find_by_id("POTOUSERS","POTO_ID",$project_owner);
     $owner_first_name=ucfirst($p_owner['FIRSTNAME']);
     $owner_last_name=ucfirst($p_owner['LASTNAME']);
     $owner_phone=$p_owner['CALL_LINE'];
     $owner_email=$p_owner['EMAIL'];
     
     if($project_availability=="open"){
      $document='<a href="user_projects/'.$project_file.'" download="'.$project_file.'" class="btn btn-success">Get Document<span><i class="fa fa-download fa-fw"></i></span></a>';
    }
    else{
      $document='<a onclick="availability_alert(\''.$owner_phone.'\',\''.$owner_email.'\');" class="btn btn-danger">Get Document <span><i class="fa fa-download fa-fw"></i></span></a>';
  }

//
      //selecting project faculty details
     $fac=$query_guy->find_by_id("FACULTY","FACULTY_ID",$project_faculty);
     $faculty_name=strtoupper($fac['FACULTY_NAME']);

}

//else if($_GET['details']==""||!isset($_GET['details'])){header("Location: projects.php");}


    //selecting 6 other random projects from the same faculty
      $random="SELECT * FROM PROJECTS WHERE FACUL_ID=".$project_faculty." AND PROJECT_ID !=".$id;
      $random.=" ORDER BY RAND() LIMIT 3";
      $random_query=mysqli_query(DB_Connection::$connection,$random);
      $vals="";

      if(mysqli_num_rows($random_query)==0){$vals="No other projects from same faculty!";}
      else{

     // if(!$random_query){echo mysqli_error(DB_Connection::$connection);}

      while($ret=mysqli_fetch_assoc($random_query)){
             
             $other_head=$ret['PROJECT_HEADER'];
             $other_description=strlen($ret['PROJECT_DESCRIPTION'])>215?substr($ret['PROJECT_DESCRIPTION'],0,215).'...':$ret['PROJECT_DESCRIPTION'];
             $other_id=$ret['PROJECT_ID'];
             $other_availability=$ret['PROJECT_AVAILABILITY'];
             $other_status=$ret['PROJECT_STATUS'];
   

             $vals.='  <div class="row nested-row">
                      <a href="project_detail?details='.$other_id.'">
                      <div class="col-md-4 col-sm-4">
                      <img src="images/pro_img.png" style="max-width:100%;"/>
                      </div>
                      <div class="col-md-8 col-sm-8 nested-col">
                      <h3 class="project-header"><b>'.strtoupper($other_head).'</b></h3>
                       <p>'.$other_description.'</p>
                      <h4><b>PROJECT STATUS:</b>'.strtoupper($other_status).'</h4>
                      <h4><b>PROJECT AVAILABILITY:</b>'.strtoupper($other_availability).'</h4>
                      </div></a>
                      </div>';   
     }

  }//end no empty else


?>

<?php include("inc/header.php"); ?>
<title><?php echo ucfirst($project_head); ?></title>
<link rel="stylesheet" href="css/project_detail.css"/>
<script type="text/javascript">
function availability_alert(phone,email){
  alert("Sorry! But the owner of this project has made it a closed project. You can call the owner on: "+phone+" or email: "+email+" to discuss this");
}
</script>
</head>

<body>

  <div class="container-fluid">
      <?php include('inc/poto_gallery_nav.php'); //site navigation ?>
  </div>

<div class="container project-head"><!--project-header -->
  <div class="row">
    <div class="col-md-10">
      <h1><b><?php echo $project_head; ?><b></h1>
    </div>
    <div class="col-md-2 visible-md-block visible-lg-block">
      <h1><span><i class="fa fa-folder-open"></i></span></h1>
    </div>
  </div>
</div>


<div class="container project-extra">
  <div class="row">
    <div class="col-md-12">
      <h3><span><i class="fa fa-archive"></i></span><b> Project Description</b></h3>
      <blockquote>
      <?php echo $project_description; ?>
       
      </blockquote>
      <h3><span><i class="fa fa-key"></i></span><b> Project Availability:</b></h3>
      <blockquote>
        Project is <?php echo $project_availability; ?>
      </blockquote>
      <h3><span><i class="fa fa-edit"></i></span><b> Project Status:</b></h3>
       <blockquote>
        This Project is currently <?php echo $project_status; ?>
      </blockquote>
      <h3><span><i class="fa fa-tasks"></i></span><b> Project Faculty:</b></h3>
       <blockquote>
        <?php echo $faculty_name; ?>
      </blockquote>
      <h3><span><i class="fa fa-user"></i></span><b> See Details Of Who Shared This File:</b></h3>
       <blockquote>
        <a href="person-potomanto?poto987xyzpotyuisid=<?php echo $project_owner; ?>"><?php echo $owner_first_name; ?> <?php echo $owner_last_name; ?></a>
      </blockquote>
      <h3><span><i class="fa fa-file"></i></span><b> Project Documentation:</b></h3>
       <blockquote>
        <?php echo $document; ?>
      </blockquote>
    </div>
  </div>
</div>
  

<div class="container bottom-container"><!--image gallery container-->
     <div class="row bottom-row">
        <h3 class="text-center" id="bh3" >Other Documents From The Same Faculty</h3>    
        </div> 
    </div>
</div>

<div class="container">
  <div class="row top-row">

      
    <div class="col-md-12">
      <?php echo $vals; ?>
      
    </div><!--end md-12-->

     
  </div><!--end main row-->
</div><!--end container-->

                   <!--search filter modal-->
                    <div class="modal fade" id="search_filter" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Please <a href="poto-gallery">See The Faces</a> And Click The Search Faces Link</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                           
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->


<?php  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

 
<a href="whatsapp://send?text=Quickly%20download%20the%20file%20<?php echo $actual_link; ?>" data-action="share/whatsapp/share" title="upload a document"><span class="quick_add"><i class="fa fa-whatsapp fa-5x"></i></span></a>

<div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?></h5>
        </div>
    </section>
</div> 




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>