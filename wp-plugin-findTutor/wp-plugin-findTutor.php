<?php
/*
Plugin Name: WP Plugin findTutor
Plugin URI: http://fyaconiello.github.com/wp-plugin-findTutor
Description: findTutor is the main page for students searching for a tutor where they fill out a form and it is submitted to the requests database.
Version: 1.0
Author: Lucas Bullen
Author URI: http://www.leggettBuilds.ca
License: GPL2
*/
/*
Copyright 2015  Lucas Bullen  (email : 13lb45@queensu.ca)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js">
   <head>
     	 <meta charset="utf-8">
     	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
     	 <title>EngLinks</title>
     	 <meta name="description" content="">
     	 <meta name="viewport" content="width=device-width, initial-scale=1">

     	 <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

      	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   		<style type="text/css">
      body{
          margin: 0px 0px 0px 0px;
          padding: 0px 0px 0px 0px;
          font-family: 'Open Sans', sans-serif;
          color: #000;
      }
      #formSection{
        position: relative;
        top:44px;
        left:50px;
        width: 100%;
        height: 100%;
      }
      #formTitle{
        font-size: 200%;
        font-weight: 900;
      }
      #formTutorLogIn{
        color: blue;
        text-decoration: underline;
      }
      #formDescriptions{
        width:300px;
        font-size:70%;
      }
      .error{
        color: red;
      }
  		</style>
   </head>
   <body>
      <?php
        $nameErr=$emailErr=$courseErr=$commentsErr="";
        $name=$email=$course=$comments="";
        $nameGood=$emailGood=$courseGood=false;
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
          if (empty($_POST["name"])) {
            $nameErr="Name is required";
            $nameGood=false;
          } else{
            $name = test_input($_POST["name"]);
            $nameGood=true;
            //confirm that only whitespace and letters
            if (!preg_match("/^[a-zA-Z]*$/",$name)){
              $nameErr = "Only letters and white space allowed";
              $nameGood=false;
            }
          }
          if (empty($_POST["email"])) {
            $emailErr="Email is required";
            $emailGood=false;
          } else{
            $email = test_input($_POST["email"]);
            $emailGood=true;
            //confirm that valid queens email
            //if(!strpos($email,'@queensu.ca') || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(substr($email,-strlen("@queensu.ca"))!="@queensu.ca" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
              $emailErr = "Must be valid Queens Email"; 
              $emailGood=false;
            }
          }
          if (empty($_POST["course"]) || $_POST["course"]=="0") {
            $courseErr="Course Code is required";
            $courseGood=false;
          } else{
            $course = test_input($_POST["course"]);
            $courseGood=true;
          }
          if (!empty($_POST["comments"])) {
            $comments = test_input($_POST["comments"]);
            $commentsGood=true;
          }
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        if ($nameGood==true && $emailGood==true && $courseGood==true){
          $date = new DateTime();        }
      ?>
      	<div id="formSection">
      		<div id="formTitle">FIND A TUTOR</div>
      		<a id="formTutorLogIn" href="http://stream1.gifsoup.com/view7/3626802/anakin-its-working-o.gif">Tutors Log In</a>
      		<div id="formDescriptions">Fill in this form and we will put you in contact with potential tutors</div>
      		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div id="formNameTitle">Name:</div>
            <input type="text" id="formNameInput" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <div id="formEmailTitle">Email (@queens.ca):</div>
            <input type="text" id="formEmailInput" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <div id="formCourseTitle">Select your course:</div>
            <select id="formCourseInput" name="course">
              <option value="0">Choose a course</option>
              <option value="1">CISC 121</option>
              <option value="2">CISC 124</option>
              <option value="3">CISC 666</option>
            </select>
            <span class="error">* <?php echo $courseErr;?></span>
            <div id="formCommentTitle">Comments:</div>
            <textarea name="comments" id="formCommentInput" rows="5" cols="40"><?php echo $comments;?></textarea></br>
            <input type="submit" name="submit" value="Submit"> 
          </form>
      	</div>
        <?php
echo "<h2>Your Input TESTING:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $course;
echo "<br>";
echo $comments;
echo "<br>";
?>
      </div>
   </body>
</html>