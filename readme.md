### Artisan Command

- php artisan make:controller PageController
- php artisan make:model Post -m
- php artisan make:model Post --migration
- php artisan migrate
- php artisan make:auth
- php artisan serve
- php artisan serve --port=3000

```
php artisan make:controller Backend/PostController -r
```

### Git 

git init
git add .
git commit -m "sample crud"
git remote add origin https://github.com/bm-member/bm-blog-2.git
git push -u origin master

### Installation 

- git clone
- copy .env.example to .env
- config db setting 
- composer install
- php artisan key:generate
- php artisan serve
- done.

Pagination
----------
postcontroller=>paginate()
index.php =>{{$post->links()}}


Middleware
------------
create middle=> php artisan make:middleware AuthWare
kernel.php
web
AuthWare.php => !Auth::check()



Seeder  //str_random()
-----------------------

php artisan make:seeder PostSeeder
postseeder  => function run() {  for()  }
dataseeder  => $this->call(PostSeeder::class);
php artisan migrate:fresh --seed
php artisan serve 
registerController.php  =>  protected $redirectTo = '/admin/post';//home
master.blade.php =>url admin/post
<!-- http://localhost:8000/admin/post -->

profile
-------
controller
web
view=>

re clone
----------
desktop/bm-test
localhost:8000/admin/post
php artisan serve
git pull 
php artisan serve
composer dump-autoload -o     //seeder
php fresh --seed
php artisan serve

>php artisan make:request PostRequest

error
------



request
--------
create
postRequest=>true 
>php artisan make:request PostRequest
page/error.blade.php=>@include




packgist
--------
https://packagist.org/gates


json 
auto import
laravel/validation

laravel password compare=>stack overflow=>hash::



image upload
--------------




role
----
migrate>colum
seeder=>array
authserviceprovider->boot
blade=>@can method
post=>side.blade.php=>@can is(admin)
controller=>gate::allow=>if else
web=>middeleware()

----------

logincontro, regicontro



abort in laravel

email validation in laravel security

img delete
middle
user crud







echo "# lara" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/bm-member/lara.git
git push -u origin master