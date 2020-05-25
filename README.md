# WomenSafety
This is a Website for Women's Safety. https://women--safety.herokuapp.com/

Functionalities :
1) Registration and Login for individuals.
2) Common complaint forum for interacting with other members and sharing their experiences.
3) A page consisting of Safety Tips that every women can follow.
4) SOS button which can be used in emergency situations where they have an option to either book a cab or alert the police with the current    location through SMS services(TextLocal API).*
5) A forgot password page which has been implemented using PHPMailer.*

Tools and technologies used : HTML5, CSS, Bootstrap, PHP, MySQL, Javascript, Ajax, Textlocal API, PHPMailer.

Installation and Requirements :
1) Click on clone or download ZIP.
2) Extract the ZIP folder.
3) Download XAMPP server, PHP, phpMyAdmin.
4) Move the extracted files to htdocs folder in the XAMPP folder.
5) In the XAMPP control panel start the Apache and MySQL servers.
6) Go to you web browser and type http://localhost/women_safety/index.php. Then start exploring.

Note :

*The TextLocal API gives only 10 free credits per account created.(10 free SMS's)

*The forgot password page accepts email from the user and then uses PHPMailer to send the password to the user Email Id but Google has identified it as a Less Secure Application. So if the user has to use it he/she has the change his/her google accounts security settings accordingly to try it. It has been tested and it is working perfectly fine. It also requires the owner email ID and password. So I have disabled it temporarily.
