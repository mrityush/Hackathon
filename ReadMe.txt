Solution for Challenge 2

adminPanel.php for fetching user list
sendLocation.php for providing API to get users and their lat long

I have created a database by name Hackathon and stored user details in user_info database
query is written for fetching users in a circular area of the given radius parameter

Example, according to database 
--> lat - 3, long - 2, radius - 1 as filter would fetch mrityu@gmail.com as the user

Enter admin username - abc@test.com
	admin password - admin 

Currently admin login/authentication page is made but logout is not made. Also session is not maintained for now...