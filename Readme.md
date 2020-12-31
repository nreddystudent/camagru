## Setup instructions

Step 1: install XAMPP and start apache and mySQL 
Step 2 : clone project in htdocs folder    
Step 3 : open xampp launch apache and go to localhost/camagru/config/setup.php  
Step 4: open localhost/camagru


## Documentation

This project uses MVC:
Model folder - contains DB related things
View - contains html related files
Controller - contains sending and receiving of requests

The MVC folders are contained in the app folder
The Core folder contains all the base files that are used by the files
contained in the app folder. These files include all the base clases 
and some configuration.

Global variables are set in config/config.php. All traffic begins and ends in
Router.php where it will call the appropriate controller and action. Controller
is a class and action is a method in that class

Images are stored locally profilePics contain all users profile pictures and 
images are pictures that have been taken or uploaded by a user. Stickers contain
all stickers a user can apply and have to be in png format. htacess contains some
url rewrite rules the keep the url clean.

ACL.json is used to determine which pages a user can visit and menu_acl.json is
used to determine what the navbar displays in different states of the app.

DB credentials can be edited in database.php. All file names are in CamelCase.


# Test cases:

1) Can anything be SQL or HTML injected (check PDO and sanitization is present everywhere)
2) Can a user Register
3) Can a user Login after verifying their account
4) Can a user post a picture using webcam
5) Can a user comment on a post
6) Can a user like a post
7) A user can change their profile details
8) Can a user view the feed whether logged in or not
9) can a user logout
10) can a user view the feed while logged out
11) can a user go to the upload page forcefully while logged out
    
# Expected Outcomes:
1) All input is sanitized with relavant functions
2) A user can register correctly
3) A user can login after verifying their account
4) A user can post a picture using their camera
5) A user can comment on a post
6) A user can like a post
7) A user can change their profile details
8) A user can view the feed regardless of being logged in
9) A user can logout
10) A user cannot go to the upload page forcefully will be redirected to error page
