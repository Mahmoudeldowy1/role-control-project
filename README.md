# Read It for can turn project locally

- I use package called (shanmuga3
  /
  laravel-entrust) for make relations and seeding with users and roles and permissions.
  
        link package :  https://github.com/shanmuga3/laravel-entrust
        
        1- this package used for make roles and permissions and relations between each other and users
        
        (many-to-many relation every user can have many roles and permission && roles can have many permissions && permissions belongs to many roles and users)
        
        2- package make seeding and migrations for (roles and permissions).
        
        
        3- we can use many functions like ($user->attachRole() && $user->roles()->attach() && $user->hasRole() && $user->hasPermission())
        
        4- we can use a middleware to filter routes and route groups by permission or role (Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {}))

- I created 3 models User && Role && Permission. 
- I use Authentication, and you can open dashboard
- dashboard called (AdminLTE).
- I Used Faker to generate date on factory
- make validation and errors message on inputs form
- Use JWT package to hat defines a compact and self-contained way for securely transmitting information between parties as a JSON object
  
    link package :  https://jwt-auth.readthedocs.io/en/develop/laravel-installation

- Used postman to make auth and show products and candidates for specific users 

#steps to can use project locally

1- Composer install

2 - php artisan key:generate

3 - php artisan jwt:secret

4 - php artisan cache:clear

5 - php artisan config:clear

6 - php artisan migrate 

7 - php artisan db:seed


#for open dashboard
link : http://127.0.0.1:8001/admin 

email:admin@gmail.com

password : 123456789

#for create new User
link : http://127.0.0.1:8001/admin/users/create
#for create new Role
link : http://127.0.0.1:8001/admin/roles/create
#for create new Permission
link : http://127.0.0.1:8001/admin/permission/create

#****Api links You can Use Postman\****
# for login service
link : http://127.0.0.1:8001/api/auth/login
# for logout service
link : http://127.0.0.1:8001/api/auth/logout
# for logout service
link : http://127.0.0.1:8001/api/auth/logout
# for can get date with specific user with specific role called operations to can get products service 
http://127.0.0.1:8001/api/products

email:mahmoud@gmail.com

password : 123456789

# another user with another role called HR to can get candidates service
http://127.0.0.1:8001/api/candidates

email:ahmed@gmail.com

password : 123456789
