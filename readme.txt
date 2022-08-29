Created in 2019 => For Experience
Description of the Database
Location
The database was made using xampp phpmyadmin. The location of the database can be found when searched “localhost/phpmyadmin” in the web browser. The database name is “Library”. The database “Library” consists of 4 tables which are Toys, Loaned, Reserved and User. To be able to connect to the website, you will need to connect to the local database and import “library.sql “to it. Afterwards, you will be required to move all of the content to “xampp/htdocs.” The website begins using “localhost/toylibrary.php”.

 
User (Table)
The user table consists of field username, password, email, number( Contact Number). This table was created to store the registered accounts from the website and set a login system for the staff and users. The staff has a staff account ( Username: admin, password: admin) to access staff control on the website.

Toys (Table)
The toys table has all of the toys that are in the library. With the field consisting of the toy name, toy id, toy status ( 2= loaned, 3= reserved or 1= available) and the image directory.

Loaned (Table)
The loaned table consists of all records of toys that are being loaned and by who. The fields being username ( of the borrower), toy, id, loan until date, when was it loaned, date, the term ( how many times the item has been renewed by the user)  and status of the toy which would always be 2 ( 2 is for loaned). 

Reserved( Table)
Reserved table has information about the toys and users who have reserved them. The fields being username ( of the user who reserved them), toy id ( which was reserved), reserved until date, when was it reserved.

The capability of the Library website

The application is able to 

-	Keep an inventory of all the toys owned by the library.
-	Each user can borrow up to three toys at any time.
-	A toy on loan can be reserved by another user. Hence cannot be reserved unless it was loaned.
-	The loan period of all toys is seven days. 
-	If the toy has not been reserved by any other users, the borrower can renew a borrowed toy for up to three times. The borrower can renew the item after 5 days has passed on his loaned period for the toy to stop the user from renewing it way early, giving no chance to other users to reserve the item.
-	The status of a reserved toy will be changed to available for loan if the toy is not collected by the requested user within three days.
-	Once 7 days have passed the status of the loaned toy will be changed to available since all users are expected to return the toy on the due date. However, users can return the toy before the deadline and staff are able to return it by using the staff account.

User Login for customers
The users are able to login and click “my account” to find their loaned or reserved items, they are able to loan and reserve items by searching for them in the search bar or going to the collection page. They are also able to cancel their reservation request through my account once they have reserved. The users are able to register on the website to have an account.

User Login for Staff
The staff is able to access the staff account by using the admin account which is “ Username: admin, Password: admin)”. Once logged in to the staff account, the user can go to “my account” to access all records of loaned and reserved items on the system. The staff is able to return loaned items when the loaner returns it to the shop. And once the items that were loaned are picked up by his reserver. The staff is able to use the “pick up” button to change the status of the toy from reserved to loaned and also put the item on loan and start its loan period.

Search Bar
The Users and staff are able to search for toys using the toy name ( can be a few letters of the name) and toy id ( currently there are 20 toys in the system). No login is required. If the item is not found, there will be an alert message notifying the user that the toy they were looking for is not in the library and they will be redirected to the collection page to choose another instead.


Update Record
The loan, reservation and inventory record when a user borrows/renews/returns a toy from the library are all updated when they are done.

Inventory Record
If the staff wants to add more toys, they can do it simply by adding the information of the toy in the database ( note: Toy ID should always be the same as image directory and images should be stored in jpg format.). The staff can add unlimited numbers of toys to the inventory just by using basic SQL.  The website is so well integrated with the database that a person with no coding background can update the website.

How the website works
My Account System
When the user logs in to the website. The system takes the username and puts it in a session variable named “$_SESSION[‘loggedinusername’]”. This is how a website knows all the time which user is logged in and keeps a record of it for the process described below.


Adding Loan and Reserve Record
When the user clicks loan, the website takes the toy id and logged in username and makes a new record in the loan table, as well as changing the status of the toy to loaned (2) in the toys table. Same thing happens when the user reserves a toy, just the record is added in the reserve table. Loaned.php and reserved.php holds the code for the above mentioned task respectively.

Renew loaned item
Website first checks if the loaned item's loan due date is 2 days after today’s date. It allows the users to renew the loaned item if it has not been renewed 3 times already and has not been reserved by another user. The file “renew.php” has all of the codes for this task and is executed when a person presses renew.

Disabling Buttons
Item.php checks the status from the toy table using the toy id which it gets from $_GET['id']; as all the “more information” buttons shown on the collection page use the following php code”( <?php  echo "<a href='item.php?id=".$row["toyid"]."'>More Info>></a>";  ?>) “ to send the toy id to item.php. Then it uses the aforementioned id to check the status from the toy table of a toy and disables the loan/reserve/renew button accordingly.

Collection’s Page
Collection.php file loops through all the entries of the toy table to make a grid layout of all the toys available in toy inventory.

Search Bar
The search item bar takes the input and compares it with toy name and toy id and  use feature like “LIKE” which helps it to find records even if when the entered name is not complete or entirely correct.
 
Adding Records
Whenever a user attempts to loan or reserve an item, webpage uses mydate function “$myDate = date('Y/m/d');” to get today’s date and adds a record accordingly, to get a certain future date webpage does calculation as shown in the image below, from “renew.php”
 
 
Return and Pickup Feature
Only staff account has the page where they can see list of all loaned and reserved items. Staff are able to return item by the click of the “return” button which executes the code in the file “return.php” . It finds the record in loan table by using $_GET['id']; function and delete the record of the item that is supposed to be return. Staff can also pickup an reserved item by the “pickup” button which executes the code in pickup.php. It gets the toyid of the item being picked up and deletes the record from reserve and adds a new record in the loan table.
 
My Account
Myaccount.php displays all of the reserved and loaned items by the user logged in which is retrieved from a session variable “$_SESSION[‘loggedinusername’]”. Couple of loops run in this page to display records from loaned and reserved table. Reserved item list sections also include a “cancel” button which allows the user to cancel their reservation request.

Background Activities
 Status Update
Since the website can only be accessed through “localhost/toylibrary.php” this php file includes sql to delete the records in loan table which due date has passed, it also deletes record for item which were not picked up on their reserve due date after doing these steps, it update the status of all toys in the toys table accordingly by  checking if the item are still  in the loaned or reserved table.
Log off system
Toylibrary.php helps to logout previous users that have logged in previously. So that every time the website is accessed, it starts from a logged off system.
TimeZone
As the website has been designed to be used in Hong Kong, it uses its own default timezone to Hong Kong Asia which is set by the code : date_default_timezone_set('Asia/Hong_Kong');.
This eliminates the chances of the php timezone being different from the database which might cause error in some cases.

Usability
Navigation Bar
Every page shows the same navigation bar and header so the user can quickly access any page no matter where they are in the website at a given moment. The search bar is conveniently displayed at the navigation bar so the user can search for a catalogue at any given moment.
Homepage Logo Button
The website logo also serves as the home button. And is displayed clearly for user convenience at every page.
Social Media Icon
Social media icons are displayed at the bottom of every page, so the users can quickly access the library’s social media platform. ( As this is an assignment, they redirect to the social media platform instead of the page).

Added Information
The website has Frequently asked questions, contact us  and about us page that display all the information that a user might require. All the links to accessible pages without logging in in the website are available in the site map for easy navigation of the user.
Replaced Text Input
Whenever possible, the text input has been replaced  by selection to reduce input data error and provide convenience and added usability to the users.  The web interface can detect any obvious input errors (e.g. non-numeric character in contact phone number). 
Buttons
Background color has been set to white and all the colors used in the website are high contrast to aid users with special disabilities. The size of button and clickable links are in the appropriate size for anybody to easily notice, click and access.
