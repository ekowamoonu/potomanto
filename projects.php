<?php
ob_start();
session_start();

  $nav_link=isset($_COOKIE['log'])?"<a href=\"poto-dashboard\">Dashboard</a>":"<a href=\"login\">Login</a>";

//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');
include('classes'.DS.'pagination.php');
//get the list of all countries from the database
$query_guy=new DataQuery();
$form_man=new FormDealer();

/****************pagination****************************/
//1.the current page number($current_page)
$page=!empty($_GET['page'])?(int)$_GET['page']:1;

//2.records per page($per_page)
$per_page=21;

//find number of all photos
$total_count=$query_guy->countNumber("PROJECTS");

$pagination=new Pagination($page,$per_page,$total_count);

$p_links="";//variable for pagination links

$number_of_results=$total_count;

/******************************************************/

//select all countries
$results=$query_guy->find_all("COUNTRY");
$country="";


while($countries=mysqli_fetch_assoc($results)){
     $value=$countries['COUNTRY_NAME'];
     $country_id=$countries['COUNTRY_ID'];

     $country.="<option value='{$country_id}'>".$value."</option>";

}

//select all year groups
$year_results=$query_guy->find_all("YEARS");
$year="";

while($years=mysqli_fetch_assoc($year_results)){
     $value=$years['YEAR_GROUP'];
     $year_id=$years['YEAR_GROUP'];

     $year.="<option value='{$year_id}'>".$value."</option>";

}

//select all faculties from database
$faculty_results=$query_guy->find_all("FACULTY");
$faculty_var="";

while($faculties=mysqli_fetch_assoc($faculty_results)){
     $f_value=$faculties['FACULTY_NAME'];
     $f_id=$faculties['FACULTY_ID'];

     $faculty_var.="<option value='{$f_id}'>".$f_value."</option>";

}


//firstly, list all the projects in the database

//these code is what runs the search filter
if(isset($_POST['project_search'])){
   
   $results=$query_guy->run_project_search($per_page,$pagination->pagination_offset());
   $vals="";

   if(mysqli_num_rows($results)==0){$number_of_results=0; $vals="<span><i class='fa fa-plug fa-5x fa-fw'></i></span> Oops! No Projects Fit Your Search Description!";}

   else{
          
     while($ret=mysqli_fetch_assoc($results)){
             

             $project_head=$ret['PROJECT_HEADER'];
             $project_description=strlen($ret['PROJECT_DESCRIPTION'])>215?substr($ret['PROJECT_DESCRIPTION'],0,215).'...':$ret['PROJECT_DESCRIPTION'];
             $project_id=$ret['PROJECT_ID'];
             $project_availability=$ret['PROJECT_AVAILABILITY'];
             $project_status=$ret['PROJECT_STATUS'];
             $project_school=$ret['FACUL_ID'];

             //get school name if project
             $p_faculty=$query_guy->find_by_id("FACULTY","FACULTY_ID",$project_school);
             $final_faculty=$p_faculty['FACULTY_NAME'];


           $vals.='   <div class="row nested-row">
                      <a href="project_detail?details='.$project_id.'">
                      <div class="col-md-4 col-sm-4">
                      <img src="images/doc.png" style="max-width:100%;"/>
                      </div>
                      <div class="col-md-8 col-sm-8 nested-col">
                      <h3 class="project-header"><b>'.strtoupper($project_head).'</b></h3>
                       <p>'.$project_description.'</p>
                      <h4><b>PROJECT STATUS:</b>'.strtoupper($project_status).'</h4>
                      <h4><b>PROJECT AVAILABILITY:</b>'.strtoupper($project_availability).'</h4>
                      <h4><b style="color:black;">'.strtoupper($final_faculty).'</b></h4>
                      </div></a>
                      </div>';             
      }

       
      //pagination here
      include('inc'.DS.'projects_pagination.php');



   }//end else which runs if search filter is empty

  

}//end if
else{//start else

  $results=$query_guy->projects_pagination_by_sql("PROJECTS",$per_page,$pagination->pagination_offset());
  //$results=$query_guy->find_all("PROJECTS");
  $vals="";
  $image="";

   while($ret=mysqli_fetch_assoc($results)){
             
             $project_head=$ret['PROJECT_HEADER'];
             $project_description=strlen($ret['PROJECT_DESCRIPTION'])>215?substr($ret['PROJECT_DESCRIPTION'],0,215).'...':$ret['PROJECT_DESCRIPTION'];
             $project_id=$ret['PROJECT_ID'];
             $project_availability=$ret['PROJECT_AVAILABILITY'];
             $project_status=$ret['PROJECT_STATUS'];
             $project_school=$ret['FACUL_ID'];
             $project_file=explode(".",$ret['PROJECT_FILE']);
             $extension= end($project_file);

             /*appropriate image*/
             if($extension=="ppt"||$extension=="pptx"){$image="ppt.png";}
             else if($extension=="pdf"){$image="pdf.png";}
             else if($extension=="zip"){$image="zip.jpg";}
             else if($extension=="mp4"||$extension=="flv"||$extension=="avi"){$image="video.png";}
             else{$image="doc.png";}

             //get school name if project
             $p_faculty=$query_guy->find_by_id("FACULTY","FACULTY_ID",$project_school);
             $final_faculty=$p_faculty['FACULTY_NAME'];

           $vals.='   <div class="row nested-row">
                      <a href="project_detail?details='.$project_id.'">
                      <div class="col-md-4 col-sm-4">
                      <img src="images/'.$image.'" style="max-width:100%;"/>
                      </div>
                      <div class="col-md-8 col-sm-8 nested-col">
                      <h3 class="project-header"><b>'.strtoupper($project_head).'</b></h3>
                       <p>'.$project_description.'</p>
                      <h4><b>PROJECT STATUS:</b>'.strtoupper($project_status).'</h4>
                      <h4><b>PROJECT AVAILABILITY:</b>'.strtoupper($project_availability).'</h4>
                      <h4><b style="color:black;">'.strtoupper($final_faculty).'</b></h4>
                      </div></a>
                      </div>';             
      }//end while for else statement


      //pagination here
      include('inc'.DS.'projects_pagination.php');


}//end else





?>

<?php include("inc/header.php"); ?>
<title>Poto-Library</title>
<link rel="stylesheet" href="css/projects.css"/>
</head>


<body>

  <div class="container-fluid">
       <section class="row nav-row">

    <div class="col-md-4 col-lg-3 logo"><!--site logo-->
      <a  href="index"><img class="img-responsive pull-left animated wow bounceInDown " src="images/poto.png"/></a>
    </div>

    <div class="nav-div col-md-7 col-lg-offset-2 col-md-offset-0"><!--site navigation-->
          <div class="navbar-header">
                        <button style="border-radius:0;" type="button" class="navbar-toggle collapsed" data-target="#collapsemenu" data-toggle="collapse">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                        </button>
            </div>
      <nav class="navbar collapse navbar-collapse cl-effect-18 pull-right" id="collapsemenu">
          <a href="signup_first" >Register</a>
          <!-- <a href="poto-gallery" >The Faces</a> -->
           <a href="projects" >All documents</a>
          <?php echo $nav_link; ?>
          <a href="#" data-toggle="modal"  data-target="#search_filter"><i class="fa fa-search"></i> Search Library<!-- <span class="icon"><i class="fa fa-search fa-2x"></i></span> --></a>
      </nav>
    </div>
     </section>
  </div>

  <div class="container search-category-display-container">
    <section class="row search-category-display">
       <div class="suitcase col-md-9 text-left">
          <span><i class="fa fa-search" ></i></span>
          Click on 'search library' in the navigation to search for a document or filter the library
      </div>
       <div class="suitcase col-md-3 visible-md-block visible-lg-block text-right">
          <span><i class="fa fa-book"></i></span> <?php echo $number_of_results; ?> documents
      </div>
    </section>

  </div>

<div class="container"><!--image gallery container-->
  <div class="row top-row">

      
    <div class="col-md-12 results-contain">
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
                            <h3 class="modal-title">Search Through The Collection Of Projects</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                             <form class="form actual-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                               
                               <!--search by the person's name-->
                               <input type="text" name="project_name" placeholder="Document Name, Key Words etc"/>

                               <!-- <input type="text" name="last_name" placeholder="Search By Person's Last Name"/> -->

                               <!-- <input type="hidden" name="me" value="changed"/> -->
                               <!--search by country-->
                               <select class="form-control" name="country" id="country">
                                <option value="default">Country Institution Is Located</option>
                                <?php echo $country; ?>
                               </select>
                              <!--search by institution-->
                                <select class="form-control" name="institution" id="institution">
                                <option value="default" class="institution">Institution Attended</option>
                                </select>  
                              <!--search by school/faculty-->
                              <select class="form-control" name="faculty" id="faculty">
                              <option value="default">School Or Faculty</option>
                              <?php echo $faculty_var; ?>
                              </select> 

                                <!--search by specific department-->
                              <select class="form-control" name="department" id="department">
                              <option value="default">Search Through The Departments</option>
                              </select>  

                               <select class="form-control" name="year">
                                <option value="default">Search Year Groups</option>
                                <?php echo $year; ?>
                              </select>
                  
                              
                                <!--search by gender-->
                             <!--   <select class="form-control" name="gender">
                                <option value="default">Search By Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                               </select>  -->      

                               <input type="submit" name="project_search" class="btn btn-block btn-info" value="Search For Projects"/>
                        
                            </form>
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

                    <div class="container pagination-container text-center">
                      <div class="row pagination-row">
                        <nav class"pagination-nav">
                          <ol class="pagination pagination-lg">

                          <?php echo $p_links; ?>

                          </ol>
                        </nav>
                      </div>
                    </dvi>


<a href="login" title="upload a document"><span class="quick_add"><i class="fa fa-plus-circle fa-5x"></i></span></a>



 


<div class="container-fluid copyright">
   <a href="login"> <section class="row">
        <div class="col-md-12" style="height:40px;">
            <h5><b>Share A Document<b></h5>
        </div>
    </section></a>
</div>




<?php include("inc/footer.php"); ?>
<script type="text/javascript" src="js/projects_search_filter.js"></script>
<script>
        new WOW().init();
</script>
</body>
</html>