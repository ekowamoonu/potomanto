<?php
ob_start();
session_start();
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
$per_page=18;

//find number of all photos
$total_count=$query_guy->countNumber("POTOUSERS");

$pagination=new Pagination($page,$per_page,$total_count);

$p_links="";//variable for pagination links

$number_of_results=$total_count;

/******************************************************/

//firstly, list all the countries in the database
//secondly, list all the year group
//use the ajax methods in signup third to populate the right fields


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


//these code is what runs the search filter
if(isset($_POST['poto_search'])){
   
   $results=$query_guy->run_search($per_page,$pagination->pagination_offset());
   $vals="";

   if(mysqli_num_rows($results)==0){$number_of_results=0;$vals="<span><i class='fa fa-plug fa-5x fa-fw'></i></span> Oops! No Potomanto Users Fit Your Search Description!";}

   else{

     while($ret=mysqli_fetch_assoc($results)){
             
             $first=$ret['FIRSTNAME'];
             $last=$ret['LASTNAME'];
             $poto_id=$ret['POTO_ID'];
             $imag=$ret['PROFILE_PHOTO'];

                /*reading user images*/
                       /*   $locate="user_photos".DS;
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

             $vals.='<div class="col-md-4 wow animated fadeInUp  top first">
                    <a href="person-potomanto?poto987xyzpotyuisid='.$poto_id.'"><h3>'.ucfirst($first)." ".ucfirst($last).'<span><i class="fa fa-hand-pointer-o fa-fw"></i></span></h3></a>
                    <img src="user_photos/'.$imag.'" onclick="toDo();" class="im  img-fluid img-responsive center-block"/>
                    </div>';              
      }

      //pagination here
      include('inc'.DS.'gallery_pagination.php');



   }//end else which runs if search filter is empty

  

}//end if
else{//start else

  $results=$query_guy->pagination_by_sql("POTOUSERS",$per_page,$pagination->pagination_offset());
  $vals="";

   while($ret=mysqli_fetch_assoc($results)){
             
             $first=$ret['FIRSTNAME'];
             $last=$ret['LASTNAME'];
             $poto_id=$ret['POTO_ID'];
             $imag=$ret['PROFILE_PHOTO'];


                /*reading user images*/
                      /*    $locate="user_photos".DS;
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


             $vals.='<div class="col-md-4 top first">
                    <a href="person-potomanto?poto987xyzpotyuisid='.$poto_id.'"><h3>'.ucfirst($first)." ".ucfirst($last).'<span><i class="fa fa-hand-pointer-o fa-fw"></i></span></h3></a>
                    <img src="user_photos/'.$imag.'" onclick="toDo();" class="im  img-fluid img-responsive center-block"/>
                    </div>';              
      }//end while for else statement


      //pagination here
      include('inc'.DS.'gallery_pagination.php');


}//end else





?>

<?php include("inc/header.php"); ?>
<title>Poto Gallery</title>
<link rel="stylesheet" href="css/poto-gallery.css"/>
<script type="text/javascript">
function toDo(){alert("Click on the person's name to see more")}
</script>
</head>


<body>

  <div class="container-fluid">
      <?php include('inc/poto_gallery_nav.php'); //site navigation ?>
  </div>

  <div class="container search-category-display-container">
    <section class="row search-category-display">
       <div class="suitcase col-md-7 text-left">
          <span><i class="fa fa-group" ></i></span>
          <?php echo $number_of_results." potomanto faces in total"; ?>
      </div>
       <div class="suitcase col-md-5 visible-md-block visible-lg-block text-right">
          <span><i class="fa fa-suitcase fa-5x " ></i></span>
      </div>
    </section>

  </div>

  <div class="container all-images-container"><!--image gallery container-->
     <div class="row top-row">

      <?php echo $vals; ?>
     
    </div>
</div>


            <!--search filter modal-->
                    <div class="modal fade" id="search_filter" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">More Filtering Results In More Specific Results</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                             <form class="form actual-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                               
                               <!--search by the person's name-->
                               <input type="text" name="first_name" placeholder="Search By Person's First Name"/>

                               <input type="text" name="last_name" placeholder="Search By Person's Last Name"/>

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

                                <!--search by current status-->
                               <select class="form-control" name="status">
                                 <option value="default">Status At The Institution</option>
                                  <option value="first year">First Year</option>
                                  <option value="sophomore">Sophomore</option>
                                  <option value="third year">Third Year</option>
                                  <option value="fourth year">Fourth Year</option>
                                  <option value="fifth year">Fifth Year</option>
                                  <option value="sixth year">Sixth Year</option>
                                  <option value="seventh year">SeventhYear</option>
                                  <option value="masters">Masters</option>
                                  <option value="m.phil">M.Phil</option>
                                  <option value="alumni">Alumni</option>
                                  <option value="alumni and current employee">Alumni And Current Employee There</option>
                               </select>  

                               <select class="form-control" name="year">
                                <option value="default">Search Year Groups</option>
                                <?php echo $year; ?>
                              </select>
                  
                              
                                <!--search by gender-->
                               <select class="form-control" name="gender">
                                <option value="default">Search By Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                               </select>       

                               <input type="submit" name="poto_search" class="btn btn-block btn-info" value="Poto-Search Gallery"/>
                        
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



 


<div class="container-fluid copyright">
   <a href="signup_first.php"> <section class="row">
        <div class="col-md-12">
            <h5><b>Add My Potomanto<b></h5>
        </div>
    </section></a>
</div>




<?php include("inc/footer.php"); ?>
<script type="text/javascript" src="js/search_filter.js"></script>
<script>
        new WOW().init();
</script>
</body>
</html>