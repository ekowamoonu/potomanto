<?php include("inc/header.php"); ?>
 <title>Potomanto</title>
<link rel="stylesheet" href="css/index.css"/>
</head>

<script type="text/javascript">
function yscroll()
    {
      var landing=document.getElementById("land-page");
      var wrapper=document.getElementById("wrapper");
      var navigation=document.getElementById("navi");
      var ysize=window.pageYOffset;
        
        if(ysize>20)
        {
            landing.style.opacity="0.3";
        
        }
        
        else{ 

             landing.style.opacity="1";
      
            }
    
    
    }
    
    window.addEventListener("scroll",yscroll);
</script>

<body>
<!--landing page section-->
<div class="container-fluid landing" id="land-page">
    <?php include("inc/nav.php"); ?>
<!--end navigation-->
 <div class="clearfix"></div>

 <section class="row hidden-xs">
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 slider">
    	<div class="carousel slide" id="featured" data-ride="carousel" data-interval="10000">
    		
    		<div class="carousel-inner">

    			 <?php include("inc/carousel_items.php"); ?>

    		</div><!--carousel inner-->

    		<a class="left carousel-control" href="#featured" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left"></span>
            
    		</a>

    		<a class="right carousel-control" href="#featured" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right"></span>
    		</a>
    	</div><!--carousel-->
    </div>
 </section>

</div><!--end of landing-->


  <!--secondary smaller screen size navigation-->
 <div class="container-fluid text-center secondary-nav  hidden-md hidden-lg">
  <section class="row">
    <div class="col-xs-3">
          <a href="index"> 
          <h5><i class="fa fa-home"></i></h5>
          <p>Home</p>
          </a>
        </div>
        <div class="col-xs-3">
          <a href="projects"> 
          <h5><i class="fa fa-book"></i></h5>
          <p>Library</p>
          </a>
        </div>
         <div class="col-xs-3">
          <a href="mall">
            <h5><i class="fa fa-file-o"></i></h5>
            <p>Passco</p>
          </a>
        </div>
          <div class="col-xs-3">
            <a href="login"> 
            <h5><i class="fa fa-user"></i></h5>
            <p>Login</p>
          </a>
        </div>
  </section>
 </div>

<div class="container-fluid history"><!--history-->
    <div class="container">
    <section class="col-md-12 cog-spin">
    <h3><span><i class="fa fa-clipboard fa-3x"></i></span></h3>
   </section>
    </div>
 
    <div class="container">
   <section class="col-md-12 hist-text">
      <h1>Potomanto Is An Open Platform</h1>
      <h3>Easy download and access of files and other documents without even registering or logging in to any portal.</h3>
      <h3>Easily find the details of the person who uploaded a document you are interested in</h3>
   </section>
   </div>
   
</div><!--end of history-->

<div class="container-fluid objectives">
   <?php include("inc/objectives.php"); ?>
</div><!--objectives end-->

<div class="container-fluid class-pic"><!--classpic-->
    <section class="row">
        <div class="col-md-8 col-md-offset-2 class-pic-col">
            <h2>You can now all have all your course materials</h2> 
            <h2>uploaded by your colleagues into the library in one place</h2>
            <h2>Easy document uploads, Easy document downloads, Seamless User Experience... </h2>
            <h2>Righ From Start, to finish!</h2>
        </div>
    </section>
</div><!--classpic ends-->

<div class="container-fluid testimonials"><!--testimonials begin-->
    <div class="container slide_container">
    <section class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 testi-container">
                <div class="carousel slide" id="testi-slide" data-ride="carousel" data-interval="20000">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-lg-3 person"><img src="images/aya.jpg" alt="testimonial image"/>
                            </div>
                            <div class="col-lg-8 col-lg-offset-1 col-sm-6 words">
                                <blockquote>
                                    I think Potomanto is an innovative concept. It has an amount of social networking 
                                    sprinkled in it combined with a really cool document sharing system but <br/>its more open than a
                                    social network and does a greater job of removing so much restrictions on file sharing on the web.
                                    <footer style="margin-top:3%;">Winnefred (Marketting Student, Pentecsot University College)</footer>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                           <div class="col-lg-3 person"><img  src="images/mike.jpg" alt="testimonial image"/></div>
                           <div class="col-lg-8 col-lg-offset-1 words">
                            <blockquote>
                                  We as engineering students do lots of document sharing. Usually to send a file or lecture slides 
                                  to a colleague, you get his email and send it. With potomanto, we can upload these files without bothering about
                                  who has what email. <br/> We can also access lecture slides
                                  and books uploaded by students from other institutions.
                                    <footer style="margin-top:3%;">Manuel, Ken &amp; Mike (Computer Engineering Students)</footer> 
                                </blockquote>
                           </div>
                        </div>
                        <div class="item">
                           <div class="col-lg-3 person"><img  src="images/lydia.jpg" alt="testimonial image"/>
                           </div>
                           <div class="col-lg-8 col-lg-offset-1 words">
                             <blockquote>
                                   The Poto-Forum is really a great help. I can ask my most pertinent questions concerning my 
                                   course and have students from my school and other school help me out. This is awesome!<br/></br>
                                   Potomanto is also like a knowledge base for me now. I can simply browse through the library
                                   and download documents that catch my interest on the fly.
                                    <footer style="margin-top:3%;">Lydia (Student, UG)</footer>
                              </blockquote>
                           </div>
                        </div>
                        <div class="item">
                           <div class="col-lg-3 person"><img  src="images/atwee.jpg" alt="testimonial image"/>
                           </div>
                           <div class="col-lg-8 col-lg-offset-1 words">
                             <blockquote>
                                  Potomanto is super easy to use. It hides all complications from the user but still demonstrates
                                  its functionality. Its easy, signup, upload a document, or better still go straight to
                                  downloading that important course e-book.<br/><br/>
                                  How much more simple can it get?
                                    <footer style="margin-top:3%;">Stephie (Student)</footer>
                              </blockquote>
                           </div>
                        </div>

                           <div class="item">
                           <div class="col-lg-3 person"><img  src="images/dna.jpg" alt="testimonial image"/>
                           </div>
                           <div class="col-lg-8 col-lg-offset-1 words">
                             <blockquote>
                                    I can access so many project ideas and files on potomanto. See what other students are learning and reading.<br/><br/>
                                    Its pretty cool, especially when I can filter the projects and files to see which was uploaded by students in my department.
                                    Potamanto = project &amp; file sharing where I can find useful materials. Awesome concept! 
                                    <footer style="margin-top:3%;">DNA (Student)</footer>
                                </blockquote>
                           </div>
                        </div>
                     
                    </div><!--carousel inner ends-->  
                    <a class="right carousel-control" href="#testi-slide" role="button" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div><!--main carousel ends-->

        </div>
     </section>
  </div>

</div><!--test. ends-->

<div class="container locate-head hidden-xs hidden-sm"><!--locate heading-->
   <section class="row">
    <div class="col-md-12">
        <h1 class="wow animated fadeInLeft"><span><i class="fa fa-street-view"></i></span>Potomanto Origins</h1>
    </div>
   </section>
</div><!--locate heading ends-->

<div class="container-fluid hidden-xs hidden-sm" style="background-color:#eee;"><!--maps-->
    <section class="row">
        <div class="col-md-12">
             <?php include("inc/maps.php"); ?>
        </div>
    </section>

</div><!--maps end-->

<div class="container-fluid action"><!--call to action-->
    <section class="row">
        <div class="col-md-12 col-lg-6   some-words">
           <h1>Connect and share files with Students <br/>all over Ghana.</h1>
           <h1>Add your potomanto and help<br/>someone with a file.</h1>
        </div>
        <div onclick="window.location='signup_first';" class="col-md-12 col-lg-3  add-portfolio">
            <h2>Register</h2>
            <h1><span><i class="fa fa-suitcase"></i></span></h1>
        </div>
        <div onclick="window.location='projects';" class="col-md-12 col-lg-3 see-faces" data-wow-delay="0.5s">
             <h2>Open Library</h2>
            <h1><span><i class="fa fa-file"></i></span></h1>
        </div>

    </section>
</div><!--end call to action-->


            <!--search filter modal-->
                    <div class="modal fade" id="search_filter" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title"><a href="poto-gallery">See The Faces</a> And Click The Search Faces Link</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                           
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->


<div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?> <a href="about#support">User Support &amp; Feedback</a></h5>
        </div>
    </section>
</div>




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>