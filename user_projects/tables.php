<?php

include ('../conn/db_connection.php');

echo "<style type='text/css'>body{background-color:black;}</style>";
//FIRSTEXEC Table
 $query9="CREATE TABLE IF NOT EXISTS FIRSTEXEC( ";
 $query9.="CODE VARCHAR(200) ";
 $query9.=" )";
 
 $result9=mysqli_query($connection,$query9);
 
if($result9)
 {
   echo "<h2 style='color:red'>F TABLE CREATED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }
 
 //SECONDEXEC Table
 $query8="CREATE TABLE IF NOT EXISTS SECONDEXEC( ";
 $query8.="CODE VARCHAR(200) ";
 $query8.=" )";
 
 $result8=mysqli_query($connection,$query8);
 
if($result8)
 {
   echo "<h2 style='color:red'>S TABLE CREATED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }

 //THIRDEXEC Table
 $query1="CREATE TABLE IF NOT EXISTS THIRDEXEC( ";
 $query1.="CODE VARCHAR(200) ";
 $query1.=" )";
 
 $result1=mysqli_query($connection,$query1);
 
if($result1)
 {
  echo "<h2 style='color:red'>T TABLE CREATED</h2>";
}
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }


  //SYSTEMCODE TABLE
 $query2="CREATE TABLE IF NOT EXISTS SYSCODE( ";
 $query2.="CODE VARCHAR(200), ";
 $query2.="ID VARCHAR(3), ";
 $query2.="PRIMARY KEY(ID) ";
 $query2.=")";
 
 $result2=mysqli_query($connection,$query2);
 
 if($result2)
 {
   echo "<h2 style='color:red'>SYSCDE CREATED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }
 

 //ANSWER ONE TABLE
  $queryx="CREATE TABLE IF NOT EXISTS ANONE( ";
  $queryx.="CODE VARCHAR(200) ";
  $queryx.=")";
 
 $resultx=mysqli_query($connection,$queryx);
 
 if($resultx)
 {
   echo "<h2 style='color:red'>ANONE TABLE CREATED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }
 

 //ANSWER TWO TABLE
  $querym="CREATE TABLE IF NOT EXISTS ANTWO( ";
  $querym.="CODE VARCHAR(200) ";
  $querym.=")";
 
 $resulty=mysqli_query($connection,$querym);
 
 if($resulty)
 {
   echo "<h2 style='color:red'>ANTWO TABLE CREATED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }
 
 /*hashing system passcodes*/
 $ms="xetyvpom34";
 $ms1="36zwqdmot";
 $ms2="qlowizyghi72";
 $sq="whatisthedifferenceofmand12";
 $anone="evana278";
 $antwo="pyt34wmy";

 $ms_final=password_hash($ms,PASSWORD_BCRYPT,['cost'=>8]);
 $ms1_final=password_hash($ms1,PASSWORD_BCRYPT,['cost'=>8]);
 $ms2_final=password_hash($ms2,PASSWORD_BCRYPT,['cost'=>8]);
 $sq_final=password_hash($sq,PASSWORD_BCRYPT,['cost'=>8]);
 $anone_final=password_hash($anone,PASSWORD_BCRYPT,['cost'=>8]);
 $antwo_final=password_hash($antwo,PASSWORD_BCRYPT,['cost'=>8]);
 
 
 //CODE INSERTIONS 
  $query3="INSERT INTO SYSCODE(CODE,ID) VALUES ";
  $query3.="('{$ms_final}','ms'),";
  $query3.="('{$ms1_final}','ms1'),";
  $query3.="('{$ms2_final}','ms2'),";
  $query3.="('{$sq_final}','sq') ";
 
 $result3=mysqli_query($connection,$query3);
 
 if($result3)
 {
   echo "<h2 style='color:red'>SYSCDES ESTABLISHDED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }

//ANONE INSERTIONS
$query6="INSERT INTO ANONE(CODE) VALUES ";
$query6.="('{$anone_final}')";

$result6=mysqli_query($connection,$query6);
 
 if($result6)
 {
   echo "<h2 style='color:red'>ANONE CDE ESTABLISHDED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }


 //ANTWO INSERTIONS
$queryo="INSERT INTO ANTWO(CODE) VALUES ";
$queryo.="('{$antwo_final}')";

$resulto=mysqli_query($connection,$queryo);
 
 if($resulto)
 {
   echo "<h2 style='color:red'>ANTWO CDE ESTABLISHDED</h2>";
 }
 
 else
 {
   echo "failed!".mysqli_error($connection);
 }

?>