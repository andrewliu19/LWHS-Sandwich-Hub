# LWHS-Sandwich-Hub
A (mostly) functioning sandwich designer and leaderboard!

In order to use Sandwich Hub, download XAMPP, install it, and do the following:
1. Download these Sandwich Hub files from Github, and place them in /XAMPP/htdocs under their own special folder (for the rest of these instructions, the folder will be called "shub").

2. Run XAMPP, make sure Apache and MySQL are running, and type in "localhost" in the URL bar of the browser of your choice.

3. Go to "phpMyAdmin" by pressing the button in the top right of the page that loads.

4. In phpMyAdmin, create a new database called "sandwich" (case-sensitive). Under that database, create two new tables called "submissions" and "reviews"

5. Under the table labeled submissions, make the following columns with these attributes:
	a. Name: ID Type: int (length: 11), Null: No, Default: None, Extra: check "A_I"
	b. Name: name Type: char (length: 255), Null: Yes, Default: NULL
	c. Name: bread Type: varchar (length: 30), Null: Yes, Default: NULL
	d. Name: meat Type: varchar (length: 30), Null: Yes, Default: NULL
	e. Name: cheese Type: varchar (length: 30), Null: Yes, Default: NULL
	f. Name: condiments Type: varchar (length: 30), Null: Yes, Default: NULL
	g. Name: toppings Type: varchar (length: 255), Null: Yes, Default: NULL
	h. Name: extras Type: varchar (length: 30), Null: Yes, Default: NULL
	i. Name: dates Type: datetime (leave the length field blank), Null: Yes, Default: CURRENT_TIMESTAMP

6. Under the table labeled reviews, make the following columns with these characteristics:
	a. Name: ID Type: int (length: 11), Null: No, Default: None, Extra: check "A_I"
	b. Name: rating Type: int (length: 1), Null: Yes, Default: NULL
	c. Name: review_title Type: char (length: 50), Null: Yes, Default: NULL
	d. Name: review_content Type: char (length: 255), Null: Yes, Default: NULL
	e. Name: review_date Type: datetime (leave the length field blank), Null: Yes, Default: NULL

7. The final step is to input "localhost/shub/index.php" in your URL bar, with "shub" being replaced with whatever you named the new folder in htdocs. You can finally browse SandwichHub!