# phomod
Hi, thanks for your intereset in PHOMOD.<br>
PHOMOD is an online freelance portal for photographers and models.<br>
Photographers and Models can be searched based on location, or PHOMOD can access your device GPS coordinates and suggest photographers and models based on your current location.<br>

<h2>FEATURES OF PHOMOD</h2>
<ul>
<li><b>Sign up and Login feature</b></li>
<li><b>Google OAuth login</b></li>
<li><b>Ratings</b> : Photographers and Models can be rated from 1 - 5 stars</li>
<li>Find freelancers based on <b>GPS coordinates</b></li>
<li><b>Mobile Responsive</b></li>
</ul>
<br>


<h2>ACCOUNT SETTINGS</h2>
<h3>Reset Password</h3>
<p>For a user to reset his / her password, you'll need to send a verification code to the user's email (PHOMOD uses PHPMailer for sending mails)</p>
<p>SMTP settings is located here, <b>PHOMOD / reset / reset.php</b></p>
<p>NB:// You'll need to setup an email server to send mails, you can setup a google SMTP server for this purpose, read on how to setup SMTP <a href ="https://www.hostinger.com/tutorials/how-to-use-free-google-smtp-server">here</a></p>
 
 <h2>DATABASE SETUP</h2>
 <ul>
 <li>Create a Database in phpmyadmin (XAMPP, or any other local server, or on a web host) and name the Database <b>phomod</b></li>
 <li>After creating the <b>phomod</b> Database, go to where you have your <b>PHOMOD</b> repo(it should be in the <b>htdocs</b> folder of XAMPP or <b>www</b> in other local servers), in the root directory, you'll find <b>phomod.sql</b> and import it to your database</li>
 </ul>
