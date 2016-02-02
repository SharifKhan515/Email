<?php
session_start();
require('connect.inc.php');
?>


<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<title>Compose</title>
<body>

<div id="container">
<div id="header"><div id ="image">
<img height="600%" src="images/ll.jpg"></img></div>
<div  height="600%" id="image2"><img src="header.png" ></img></div>

</div>



<div id="horizontalnav">
<?php
$id=$_SESSION['name'];
$query="SELECT  `username` FROM `email_user` WHERE id='$id' ";
$query_run = mysql_query($query);
while($query_row=mysql_fetch_assoc($query_run))
{$user=$query_row['username'];

echo "<h1>$user</h1>";}
?>
<div class="navlinks">

<ul>
<link rel="stylesheet" href="mbcsmb7zbs.css" type="text/css" />
<div id="mb7zbsebul_wrapper" style="max-width: 184px;">
  <ul id="mb7zbsebul_table" class="mb7zbsebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient34"><a href="index.html">Sign-Out</a></div></li>
  <li><div class="buttonbg gradient_button gradient34" style="width: 60px;"><a>Help<br /></a></div></li>
  </ul>
</div>




</div>

</div>




<div id="leftnav">
<link rel="stylesheet" href="mbcsmbrfzq.css" type="text/css" />

<div id="mbrfzqebul_wrapper" style="width: 148px;">
  <ul id="mbrfzqebul_table" class="mbrfzqebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient44"><a>Compose</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a href="inbox.php">Inbox</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a href="sent.php">Sent-Mail</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a class="button_4" href="profile.php">Profile</a></div></li>
  </ul>
</div>

<script type="text/javascript" src="mbjsmbrfzq.js"></script>

</div>





<div id="body"><div >
<FORM action="compose2.php" method="post" enctype="multipart/form-data">

<DIV >
<TABLE CELLSPACING="2" CELLPADDING="5" WIDTH="90%" BORDER="1">
   <TR>
      <TH ALIGN="CENTER" WIDTH="16%"><font color="black">To</font></TH>
      <TD WIDTH="84%" colspan="2"><INPUT NAME="mail_to" SIZE="81"></TD>
   </TR>
   <TR>
      <TH ALIGN="CENTER" WIDTH="16%"><font color="black">Subject</font></TH>
      <TD WIDTH="84%" colspan="2"><INPUT SIZE="81" NAME="mail_subject"></TD>
   </TR>
   <TR>
      <TD WIDTH="84%" colspan="2"><TEXTAREA NAME="mail_body" ROWS="16"
         COLS="70"></TEXTAREA></TD>
   </TR>
    <TR>
      <TH ALIGN="CENTER" WIDTH="16%"><font color="black">Attachment</font></TH>
      <TD WIDTH="84%" colspan="2"><INPUT TYPE="FILE" NAME="userfile"></TD>
   </TR>
   <TR>
      <TH WIDTH="100%" COLSPAN="3" ALIGN="CENTER">
         <INPUT TYPE="SUBMIT" VALUE="Send" NAME="SUBMIT">
         <INPUT TYPE="RESET" VALUE="Reset" NAME="RESET">
      </TH>
   </TR>
</TABLE>
</DIV>
</FORM>


</div></div>

<div id="footer"><h2 align="middle" >This site is developed as a php project.</h2>


</div></div>


</body>
</html>
