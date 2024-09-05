# Laravel_Ebooks_web_APP
this is an online library where users can surf different categories of books, download, and save books to their favorites  
it was developed using laravel 11
php version 8.2 and with Mysql server for the database

you can access the app throw its UI website

for the API:
they are stored in the api.php file
which are : 

:books/  (no auth)
for accessing all books as a json response

:books/{genre}/ (no auth)
for access the books based on a specific gnere

:books/favorites   (auth with personal acccess token)

for accessing user favorite books and you need to supply the personal access token for the authentication
