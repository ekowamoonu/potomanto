<?php ob_start();
session_start();
//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');

//get the list of all countries from the database
$query_guy=new DataQuery();
$form_man=new FormDealer();
$error_msg=$form_man->log_error("Choose Your Username & Password","normal");


     if(isset($_POST['submit'])){
                 if($form_man->emptyField($_POST['firstname'])||
                    $form_man->emptyField($_POST['phone'])||
                    $form_man->emptyField($_POST['password'])||
                    $form_man->emptyField($_POST['cpassword'])||
                    !isset($_POST['agree'])
                   ){
                      $error_msg=$form_man->log_error("All Fields Should Be Filled","red");

                 }//end second if

                else{
                      $firstname=$form_man->cleanString($_POST['firstname']);
                      $phone=$form_man->cleanString($_POST['phone']);
                      $password=$form_man->cleanString($_POST['password']);
                      $cpassword=$form_man->cleanString($_POST['cpassword']);

                      //check whether username already exists
                      $query="SELECT * FROM POTOUSERS WHERE CALL_LINE='{$phone}'";
                      $results=mysqli_query(DB_Connection::$connection,$query);
                      
                      $number=mysqli_num_rows($results);

                      if($number>=1){$error_msg=$form_man->log_error("Use A Different Call Number!","red");}//end if
                      else{
                                
                              $final_password=password_hash($cpassword,PASSWORD_BCRYPT,['cost'=>11]);

                              $insert_query="INSERT INTO POTOUSERS(P_PASSWORD,FIRSTNAME,CALL_LINE) VALUES(";
                              $insert_query.="'{$final_password}','{$firstname}','{$phone}');";

                              $rex=mysqli_query(DB_Connection::$connection,$insert_query);

                              if($rex){
                                         $_SESSION['id']=mysqli_insert_id(DB_Connection::$connection);
                                         $i=$_SESSION['id'];
                                         //update person's profile
                                         $query="UPDATE POTOUSERS SET ";
                                         $query.="LASTNAME='...',";
                                         $query.="EMAIL='...',";
                                      /*   $query.="CALL_LINE='...',";*/
                                         $query.="WHATSAPP_LINE='...',";
                                         $query.="FACEBOOK_NAME='...',";
                                         $query.="GENDER='X', ";
                                         $query.="CO_ID='1',";
                                         $query.="IN_ID='1',";
                                         $query.="FA_ID='1',";
                                         $query.="DEPT_ID='1',";
                                         $query.="STATUS='Not Added Yet',";
                                         $query.="YEAR_GROUP='Not Added Yet',";
                                         $query.="SPECIALITY='...',";
                                         $query.="CURRENTLY='...', ";
                                         $query.="MMT='...',";
                                         $query.="MCT='...',";
                                         $query.="FAVORITE_COURSE='...',";
                                         $query.="AMBITIONS='...',";
                                         $query.="TEAM_WORK='50',";
                                         $query.="HUMAN_RELATIONS='50',";
                                         $query.="PERSONALITY_ATTITUDE='50',";
                                         $query.="OPENESS='50', ";
                                         $query.="PROFILE_PHOTO='avatar.png'";
                                         $query.="WHERE POTO_ID=".$i;

                                         $update=mysqli_query(DB_Connection::$connection,$query);
                                      
                                        header("Location: signup_second");

                              }/*else{echo mysqli_error(DB_Connection::$connection);}*/

                              //end if after insert query

                         }//end second else
 
                }//end first else

     }//end main if


?>


<?php include("inc/header.php"); ?>

<title>Authentication</title>
<link rel="stylesheet" href="css/signup_first.css"/>
</head>

<body>

 <div class="container form-main-div"><!--form starts-->
  <section class="row">
      <div class="col-md-5 col-md-offset-3 form-div">
        <?php echo $error_msg; ?>
        <form class="form actual-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="text" name="firstname" class="form-control" placeholder="&#128100; Your Firstname"/>
          <input type="text" name="phone" class="form-control" placeholder="&#128100; Your Phone Number"/>
          <input type="password" name="password" class="form-control" placeholder="&#128274; Your Password" title="You can always change this in your dashboard"/>
          <input type="password" name="cpassword" class="form-control" placeholder="&#128274; Confirm Password"/>
          <div class="input-group">
          <input class="checkbox-inline" name="agree" value="agree" type="checkbox" class="form-control"/><label class="control-label checkbox-inline"><a href="#" data-toggle="modal" data-target="#terms">Agree To Terms &amp; Conditions</a></label>
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success submit-btn" value="Save and Continue"/>
          <input class="form-control btn btn-success submit-btn normal-btn" value="Back To Home Page" onclick="window.location='index';"/>
        </form>
      </div>
  </section><!--form ends-->
 </div>

                 <!--terms and conditions modal-->
                    <div class="modal fade" id="terms" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Potomanto Terms And Conditions</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                             <h3><b>In completing the registration, you are deemed to have read and agreed to the following terms, conditions and privacy policy:</b></h3>
                            <blockquote>
                              The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and any 
                              or all Agreements: "Client", “You” and “Your” refers to you, the person accessing this website and accepting the 
                              Company’s terms and conditions. "The Company", “Ourselves”, “We” and "Us", refers to our Company. “Party”, “Parties”, 
                              or “Us”, refers to both the Client and ourselves, or either the Client or ourselves. All terms refer to the offer, 
                              acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the 
                              most appropriate manner, whether by formal meetings of a fixed duration, or any other means, for the express purpose 
                              of meeting the Client’s needs in respect of provision of the Company’s stated services/products, in accordance with 
                              and subject to, prevailing English Law. Any use of the above terminology or other words in the singular, plural, 
                              capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same...
                            </blockquote>
                          <p><a href="terms">Read Complete Terms And Conditions</a></p>
                           
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
 
   


<!-- <div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?></h5>
        </div>
    </section>
</div> -->




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>