# the name of project
Simple book crud
# step to run the project 
1- add data base name in phpmyadmin
2- add the database name in .env
3- run the project in termial using this step:
   1 . php artisan config:cache
   2. php artisan config:clear
   //we put this step above (1+2) because in my project i put database name but you want to add new data so this is to clear .env and allow you to put your database
   3. php artisan migrate
   4. php artisan db:seed --class=CreateAdminSeeder
# Features
i use JWT package for Api   
# what about this project
this project taking about simple crud and there is two role admin and user
just admin can add and update and delete book
any one can see all the book that available even without token
# doc of postman is 
https://documenter.getpostman.com/view/34555205/2sAXxMft36



