# Uni Escambo

> Academics have a lot of problems on their day-to-day. We can affirm this because our group belongs to this routine. With this in mind, we are thinking of developing a trade system of materials/documents that we creatively called ”Uni Escambo” (”Uni”: university/academic; ”Escambo”: trade in product or service without using currency).

#### Funcionalities
* Login/SignUp users
* Upload Materials
* Search Materials/Courses/Programs/Universities
* Upload/Download Files
* Subscribe/Unsubscribe Courses
* See/Edit your Profile
* See your Upload History

#### Hierarchy
Our code is divided by some folders with a name representing its function inside everything:
* "actions" has codes that are called by a page that contain Forms to manipulate the input data capturated by it.
* "classes" has the declarations of all main objects of the system.
* "db" has everything relationed to the database, SQL and PHP code. 
* "media" has images, videos and files that are important to the system.
* "pages" has the HTML code of each page of the system. Files whose the name begins with the character "\_" are auxiliary files that exists to shrink the code of the another pages.
* "index.php" is the 'main()' that init the system. It initializes the session variables and load all other pages.
This code was planned for the user to only see the "index.php" file. When an operation is called, the actual page calls a particular PHP file that calls another and so on, but, in the end, the result will be shown in the "index.php" that will call the correct page including it.
