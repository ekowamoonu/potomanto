<?php

//firstname update
if(isset($_POST['firstname_submit'])){
  if(!$form_man->emptyField($_POST['firstname'])){ 
    $firstname=$form_man->cleanString($_POST['firstname']);
    $query_guy->update_portfolio("FIRSTNAME",$firstname,$id);

    $success= $query_guy?$query_guy->success_message("Firstname"):"Update Failed ";
  

  }
}

//lastname update
if(isset($_POST['lastname_submit'])){
  if(!$form_man->emptyField($_POST['lastname'])){ 
    $lastname=$form_man->cleanString($_POST['lastname']);
    $query_guy->update_portfolio("LASTNAME",$lastname,$id);

    $success= $query_guy?$query_guy->success_message("Lastname"):"Update Failed ";
  

  }
}

//email update
if(isset($_POST['email_submit'])){
  if(!$form_man->emptyField($_POST['email'])){ 
    $email=$form_man->cleanString($_POST['email']);
    $query_guy->update_portfolio("EMAIL",$email,$id);

    $success= $query_guy?$query_guy->success_message("Email"):"Update Failed ";
  

  }
}

//call_line
if(isset($_POST['call_line_submit'])){
  if(!$form_man->emptyField($_POST['call_line'])){ 
    $call_line=$form_man->cleanString($_POST['call_line']);
    $query_guy->update_portfolio("CALL_LINE",$call_line,$id);

    $success= $query_guy?$query_guy->success_message("Call Line"):"Update Failed ";
  

  }
}

//whatsapp line update
if(isset($_POST['whatsapp_submit'])){
  if(!$form_man->emptyField($_POST['whatsapp'])){ 
    $whatsapp=$form_man->cleanString($_POST['whatsapp']);
    $query_guy->update_portfolio("WHATSAPP_LINE",$whatsapp,$id);

    $success= $query_guy?$query_guy->success_message("Whatsapp Line"):"Update Failed ";
  

  }
}


//facebook name update
if(isset($_POST['facebook_submit'])){
  if(!$form_man->emptyField($_POST['facebook'])){ 
    $facebook=$form_man->cleanString($_POST['facebook']);
    $query_guy->update_portfolio("FACEBOOK_NAME",$facebook,$id);

    $success= $query_guy?$query_guy->success_message("Facebook Name"):"Update Failed ";
  

  }
}


//status update
if(isset($_POST['status_submit'])){
  if(!$form_man->emptyField($_POST['status'])){ 
    $status=$form_man->cleanString($_POST['status']);
    $query_guy->update_portfolio("STATUS",$status,$id);

    $success= $query_guy?$query_guy->success_message("Institution Status"):"Update Failed ";
  

  }
}

//speciality update
if(isset($_POST['speciality_submit'])){
  if(!$form_man->emptyField($_POST['speciality'])){ 
    $speciality=$form_man->cleanString($_POST['speciality']);
    $query_guy->update_portfolio("SPECIALITY",$speciality,$id);

    $success= $query_guy?$query_guy->success_message("Your Speciality"):"Update Failed ";
  

  }
}

//mmt update
if(isset($_POST['mmt_submit'])){
  if(!$form_man->emptyField($_POST['mmt'])){ 
    $mmt=$form_man->cleanString($_POST['mmt']);
    $query_guy->update_portfolio("MMT",$mmt,$id);

   header("Refresh: 0.5;url='profile-settings'");
  

  }
}

//mct update
if(isset($_POST['mct_submit'])){
  if(!$form_man->emptyField($_POST['mct'])){ 
    $mct=$form_man->cleanString($_POST['mct']);
    $query_guy->update_portfolio("MCT",$mct,$id);

    header("Refresh: 0.5;url='profile-settings'");
  

  }
}

//favorite course update
if(isset($_POST['fc_submit'])){
  if(!$form_man->emptyField($_POST['fc'])){ 
    $fc=$form_man->cleanString($_POST['fc']);
    $query_guy->update_portfolio("FAVORITE_COURSE",$fc,$id);
  

  }
}

//ambitions update
if(isset($_POST['ambitions_submit'])){
  if(!$form_man->emptyField($_POST['ambitions'])){ 
    $amb=$form_man->cleanString($_POST['ambitions']);
    $query_guy->update_portfolio("AMBITIONS",$amb,$id);

    header("Refresh: 0.5;url='profile-settings'");

  }
}

//profile photo
if(isset($_POST['photo_submit'])){
  if(!$form_man->emptyField($_FILES['photo']['name'])){ 

    //check whether file is legal
    //open user photos folder and delete the old photo
    //update database table with new photo
    //move new photo to user folder

    if(!$form_man->illegalExt($_FILES['photo']['name'])){

        $new_photo=$form_man->cleanString($_FILES['photo']['name']);
        $new_details=$_FILES['photo']['tmp_name'];
         /*reading user image*/
                          $locate="user_photos".DS;

                          //immediately update view with new pic
                          $query_guy->update_portfolio("PROFILE_PHOTO",$new_photo,$id);
                          if(move_uploaded_file($new_details, $locate.$new_photo)){

                             /*$success= $query_guy?$query_guy->success_message("Poto Face"):"Update Failed ";*/
                              header("Refresh: 0.5;url='profile-settings'");
                           }//end if move_uploaded_file

        
        
    }
  }
}

/*changing country institution and other values*/
//country update
if(isset($_POST['country_submit'])){
  if(!$form_man->emptyField($_POST['co'])||!$form_man->emptyField($_POST['institution'])
    ||!$form_man->emptyField($_POST['faculty'])||
    !$form_man->emptyField($_POST['deparment'])){ 

    $coun=$_POST['co'];
    $ins=$_POST['institution'];
    $fac=$_POST['faculty'];
    $dep=$_POST['department'];

    $query_guy->update_portfolio("CO_ID",$coun,$id);
    $query_guy->update_portfolio("IN_ID",$ins,$id);
    $query_guy->update_portfolio("FA_ID",$fac,$id);
    $query_guy->update_portfolio("DEPT_ID",$dep,$id);

    $success= $query_guy?$query_guy->success_message("Academic Profile"):"Update Failed ";
  

  }
}

//personality update
if(isset($_POST['personality_submit'])){
  if(!$form_man->emptyField($_POST['team_work'])||!$form_man->emptyField($_POST['human_relations'])
    ||!$form_man->emptyField($_POST['personality'])||
    !$form_man->emptyField($_POST['openess'])){ 

    $team=$_POST['team_work'];
    $hum=$_POST['human_relations'];
    $pers=$_POST['personality'];
    $ope=$_POST['openess'];

    $query_guy->update_portfolio("TEAM_WORK",$team,$id);
    $query_guy->update_portfolio("HUMAN_RELATIONS",$hum,$id);
    $query_guy->update_portfolio("PERSONALITY_ATTITUDE",$pers,$id);
    $query_guy->update_portfolio("OPENESS",$ope,$id);

    $success= $query_guy?$query_guy->success_message("Personality Details"):"Update Failed ";
  

  }
}


?>