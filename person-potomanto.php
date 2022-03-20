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

$project_list="";//this vairable will store the list of all the projects the person has done
$completion_status_alert="";


if(isset($_GET['poto987xyzpotyuisid'])){
    
    $id=$form_man->cleanString($_GET['poto987xyzpotyuisid']);

    $results=$query_guy->find_by_id("POTOUSERS","POTO_ID",$id);

    if(isset($_COOKIE['completion'])&&isset($_COOKIE['completion_id'])&&$_COOKIE['completion_id']==$id){
      //check to see if there are any incompleted fields in user profile
    foreach($results as $key=>$value){
          if($value=="Not Added Yet"||$value=="Not Specified Yet"||$value=="avatar.png"){

               setcookie("completion","stillnotcomplete",time()+91556926);
               $c_name=$results['FIRSTNAME'];
                  if($c_name!="Not Added Yet"){
                     
                      $completion_status_alert='<div class="container completion-state-container">
                                                <div class="alert alert-danger" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert">
                                                  <span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span>
                                                   </button><br/> Awesome! '.$c_name.'
                                                    ,You can now share your files to your colleagues and reach them really easily, but it looks like your potomanto is not complete. Some of your details have therefore been set to their default values.
                                                     <a href="login">Login Here</a>
                                                  to complete your profile. <br/> All the same, you can still share your files from your user dashboard once you login.
                                               </div>
                                              </div>';
                                            
                  }//end nested if
                  else{
                                         $completion_status_alert='<div class="container completion-state-container">
                                                <div class="alert alert-danger" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert">
                                                  <span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span>
                                                   </button><br/>Awesome! 
                                                   You can now share your files to your colleagues and reach them really easily, but it looks like your potomanto is not complete. Some of your details have therefore been set to their default values. <a href="login">Login Here</a>
                                                  to complete your profile.<br/> All the same, you can still share your files from your user dashboard once you login.
                                               </div>
                                              </div>';
                                  

                  }//end nested else

                  break;

          }else{
            setcookie("completion","complete",time()-91556926);
          }
    }//end foreach llop

    }//end if isset cookie

    else     {
                $completion_status_alert="";
            }//end else if !isset

    $firstname=ucfirst($results['FIRSTNAME']);
    $lastname=ucfirst($results['LASTNAME']);
    $email=$results['EMAIL'];
    $call_line=$results['CALL_LINE'];
    $whatsapp_line=$results['WHATSAPP_LINE'];
    $facebook_name=$results['FACEBOOK_NAME'];
    //$gender=strtoupper($results['GENDER']);
    $country=$results['CO_ID'];
    $institution=$results['IN_ID'];
    $faculty=$results['FA_ID'];
    $department=$results['DEPT_ID'];
    $status=ucfirst($results['STATUS']);
    $year_group=$results['YEAR_GROUP'];
    $speciality=$results['SPECIALITY'];
    $currently=$results['CURRENTLY'];
    $mmt=$results['MMT'];
    $mct=$results['MCT'];
    $fc=$results['FAVORITE_COURSE'];
    $ambitions=$results['AMBITIONS'];
    $team_work=$results['TEAM_WORK'];
    $human_relations=$results['HUMAN_RELATIONS'];
    $personality=$results['PERSONALITY_ATTITUDE'];
    $openess=$results['OPENESS'];
    $profile_photo=$results['PROFILE_PHOTO'];

    //$project=$results['FINAL_YR_DOC'];
    //$cv=$results['CV'];

    /*we are also goin to select all projects in the project table owned by the use*/
    $pro_results=$query_guy->find_by_col("PROJECTS","USER_POSTING_ID",$id);
    $p_number=mysqli_num_rows($pro_results);

    while($p_list=mysqli_fetch_assoc($pro_results)){
           
           $project_id=$p_list['PROJECT_ID'];
           $project_head=ucfirst($p_list['PROJECT_HEADER']);

           $project_list.=' <li><a href="project_detail?details='.$project_id.'">'.$project_head.'</a><li>';

    }


    //read phots folder and pick users profile photo
    /*reading candidate images*/
                         
                      /*    $location="user_photos".DS;
                          $handle=opendir($location);
                          if($handle)
                          {

                             while($file=readdir($handle))
                              {
                                   
                                if($file!='.'&&$file!='..'&&$file==$profile_photo)
                                    {

                                        $image=$file;
                                        break;
                          
                                    }
                                
                              }
                                  

                           }*///end handle

     

      //selecting country,institution faculty and department
      $country_query=$query_guy->find_by_id("COUNTRY","COUNTRY_ID",$country);
      $institution_query=$query_guy->find_by_id("INSTITUTION","INSTITUTION_ID",$institution);
      //$faculty_query=$query_guy->find_by_id("FACULTY","FACULTY_ID",$faculty);
      $department_query=$query_guy->find_by_id("DEPARTMENT","DEPARTMENT_ID",$department);


    
     //$department_query['DEPARTMENT_NAME'];

}

else if($_GET['poto987xyzpotyuisid']==""||!isset($_GET['poto987xyzpotyuisid'])){header("Location: poto-gallery");}


  //selecting 6 other random people from the same department
      $random="SELECT * FROM POTOUSERS WHERE DEPT_ID=".$department." AND POTO_ID !=".$id;
      $random.=" ORDER BY RAND() LIMIT 6";
      $random_query=mysqli_query(DB_Connection::$connection,$random);
      $vals="";

     // if(!$random_query){echo mysqli_error(DB_Connection::$connection);}

      if(mysqli_num_rows($random_query)==0){$vals="No poto users from same department!";}
      else{
      while($ret=mysqli_fetch_assoc($random_query)){
             
             $first=$ret['FIRSTNAME'];
             $last=$ret['LASTNAME'];
             $poto_id=$ret['POTO_ID'];
             $imag=$ret['PROFILE_PHOTO'];
                /*reading user images*/
                        /*  $locate="user_photos".DS;
                          $hand=opendir($locate);
                          if($hand)
                          {
                             while($img=readdir($hand))
                              {

                                if($img!='.'&&$img!='..'&&$img==$imag)
                                    {
                                        $final_img=$img;

                                         break;
                          
                                    }
                                
                              }


                           }*///end handle
   
             $vals.='<div class="col-md-4 top bottom first">
                    <a href="person-potomanto?poto987xyzpotyuisid='.$poto_id.'"><h3>'.ucfirst($first)." ".ucfirst($last).'<span><i class="fa fa-hand-pointer-o fa-fw"></i></span></h3></a>
                    <img src="user_photos/'.$imag.'" onclick="toDo();" class="imb  img-fluid img-responsive center-block"/>
                    </div>';              
      }

    }


?>

<?php include("inc/header.php"); ?>
<title><?php echo $firstname; ?><?php echo " ".$lastname; ?></title>
<link rel="stylesheet" href="css/person-potomanto.css"/>
<script type="text/javascript">
function toDo(){
  alert("Click on person's name to see more!");
}
</script>
</head>

<body>

  <div class="container-fluid">
      <?php include('inc/poto_gallery_nav.php'); //site navigation ?>
  </div>

  <div class="container poto-person-container"><!--image gallery container-->
     <div class="row top-row">
         <div class="col-md-6 top first">
             <h3><?php echo $firstname; ?><?php echo " ".$lastname; ?><span><i class="fa fa-dot-circle-o fa-fw"></i></span></h3>
             <img src="user_photos/<?php echo $profile_photo; ?>" class="im  img-fluid img-responsive center-block"/>
         </div>

         <div class="suitcase  col-md-6 visible-md-block visible-lg-block text-center">
          <span><i class="fa fa-suitcase fa-5x " title="This image signifies the potomanto(suitcase) containing the documents of <?php echo $firstname; ?>"></i></span>
         </div>

    </div>
 </div>


<?php  echo $completion_status_alert;  ?>


 <div class="container more-container">
         <div class="col-md-12 more-details">
          <h2>basic</h2>
          <hr/>
           <h4><b><i class="fa fa-flag fa-fw"></i> Country: </b><span><?php echo $country_query['COUNTRY_NAME']; ?></span></h4>
           <h4><b><i class="fa fa-bank fa-fw"></i> Institution: </b><span><?php echo $institution_query['INSTITUTION_NAME']; ?></span></h4>
           <h4><b><i class="fa fa-square fa-fw"></i> Department: </b><span><?php echo $department_query['DEPARTMENT_NAME']; ?></span></h4>
           <h4><b><i class="fa fa-user-md fa-fw"></i> Status: </b><span><?php echo $status; ?></span></h4>
           <h4><b><i class="fa fa-graduation-cap fa-fw"></i> Class Of: </b><span><?php echo $year_group; ?></span></h4>
           <h4><b><i class="fa fa-envelope fa-fw"></i> Email: </b><span><?php echo $email; ?></span></h4>
           <h4><b><i class="fa fa-whatsapp fa-fw"></i> Phone/Whatsapp: </b><span><?php echo $call_line; ?>/<?php echo $whatsapp_line; ?></span></h4>
            <h4><b><i class="fa fa-facebook fa-fw"></i></b><span><?php echo $facebook_name; ?></span></h4>

          <h2>poto diary</h2>
          <hr/>
           <h4><b>Most Memorable Times On Campus: </b></h4>
           <blockquote><?php echo $mmt; ?>
           </blockquote>
           <h4><b>Most Challenging Times On Campus: </b></h4>
           <blockquote><?php echo $mct; ?>
           </blockquote>
           <h4><b>Favorite Course In All: </b><span><?php echo $fc; ?></span></h4>
          <!--  <h4><b>FINAL YEAR PROJECT BRIEF: </b><span>I designed an online portfolio system</span></h4> -->
           <h4><b>Speciality: </b><span><?php echo $speciality; ?></span></h4>
           <h4><b>Life Ambitions &amp; Goals:</b></h4>
            <blockquote><?php echo $ambitions; ?>
           </blockquote>
          
           <h2>personality</h2>
           <hr/>
         </div>

      
      <div class="col-lg-6 skills-container">

        <h4><b><i class="fa fa-thumbs-up fa-fw"></i>Team Work</b></h4>
        <div class="progress">
          <div class="progress-bar progress-bar-theme progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $team_work; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $team_work."%"; ?>;">
            <?php echo $team_work."%"; ?>
          </div>
        </div>

        <h4><b><i class="fa fa-group fa-fw"></i> Human Relations</b></h4>
        <div class="progress">
          <div class="progress-bar  progress-bar-theme progress-bar-striped active" role="progressbar" aria-valuenow=" <?php echo $human_relations; ?>" aria-valuemin="0" aria-valuemax="100" style="width:  <?php echo $human_relations."%"; ?>;">
            <?php echo $human_relations."%"; ?>
          </div>
        </div>
        
        <h4><b><i class="fa fa-user fa-fw"></i> Personality And Attitude</b></h4>
        <div class="progress">
          <div class="progress-bar progress-bar-theme progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $personality; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $personality."%"; ?>;">
           <?php echo $personality."%"; ?>
          </div>
        </div>

        <h4><b><i class="fa fa-tags fa-fw"></i> Openess To Learn New Stuff</b></h4>
        <div class="progress">
          <div class="progress-bar progress-bar-theme progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $openess; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $openess."%"; ?>;">
          <?php echo $openess."%"; ?>
          </div>
        </div>

        <script type="text/javascript">
            function check(name,type){
              if(name==null||name==""){alert("Document Not Uploaded Yet, Please Cancel The Dialog Box Which Follows");}
              //else if(name!=null&&type=="1"){window.location="user_projects/name";}
              //else if(name!=null&&type=="2"){window.location="user_cvs/name";}
            }
        </script>

        <div>
        <a data-toggle="dropdown" class="btn btn-success dropdown-toggle"><span><i class="fa fa-file fa-fw"></i></span><?php echo $p_number; ?> Projects  <span class="caret"></span></a>
        <!-- <a  href="<?php if($cv!=null){echo "user_cvs/".$cv;} ?>" download="<?php echo $cv; ?>" onclick="check('<?php echo $cv; ?>','2');" class="btn btn-danger">Download CV <span><i class="fa fa-download fa-fw"></i></span></a> -->
        <ul class="dropdown-menu">
        <?php echo $project_list; ?>
       </ul>
        </div>
      </div><!-- /col-lg-6 -->

</div>

    </div>
</div>

<div class="container bottom-container"><!--image gallery container-->
     <div class="row bottom-row">
        <h3 class="text-center" id="bh3" >View The Potomanto Of Others From The Same Department</h3>

        <?php echo $vals; ?>
         
     <!--    <div class="col-md-4 wow animated bounceIn top bottom">
             <a href="#"><h3>Joel Klo <span><i class="fa fa-dot-circle-o fa-fw"></i></span></h3></a>
             <img src="images/poto2.jpg" class="imb  img-fluid img-responsive center-block"/>
        </div>
        <div class="col-md-4 wow animated bounceIn top bottom">
             <a href="#"><h3>Mike Ziwu <span><i class="fa fa-dot-circle-o fa-fw"></i></span></h3></a>
             <img src="images/poto1.jpg" class="imb img-fluid img-responsive center-block"/>
        </div>
        <div class="col-md-4 wow animated bounceIn top bottom">
             <a href="#"><h3>Mike Ziwu <span><i class="fa fa-dot-circle-o fa-fw"></i></span></h3></a>
             <img src="images/poto1.jpg" class="imb img-fluid img-responsive center-block"/>
        </div> -->
    </div>
</div>


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



 
<a href="login" title="upload a document"><span class="quick_add"><i class="fa fa-plus-circle fa-5x"></i></span></a>

<div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?> <a href="about#support">User Support</a></h5>
        </div>
    </section>
</div> 




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>