# Uni Escambo

> Academics have a lot of problems on their day-to-day. We can affirm this because our group belongs to this routine. With this in mind, we are thinking of developing a trade system of materials/documents that we creatively called ”Uni Escambo” (”Uni”: university/academic; ”Escambo”: trade in product or service without using currency).

#### Funcionalities
* Login/SignUp users

#### Hierarchy
Our code is divided by some folders with a name representing its function inside everything:
* "actions" has codes that are called by a page that contain Forms to manipulate the input data capturated by it.
* "classes" has the declarations of all main objects of the system.
* "db" has everything relationed to the database, SQL and PHP code. 
* "media" has images, videos and files that are important to the system.
* "pages" has the HTML code of each page of the system.
* "index.php" is the 'main()' that init the system. It initializes the session variables and load the home page.
This code was planned for the user to only see what is in the "pages" folder. When an operation is called, the actual page calls a particular PHP file that calls another and so on, but, in the end, the result will be shown on the same or another file on the "pages" folder.
