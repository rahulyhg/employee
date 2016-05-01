#Requirement

[rikkeisoft/php-training/projects/employee-directory](https://github.com/rikkeisoft/php-training/blob/master/projects/employee-directory/01.Requirement.md)

#Technologies

- Laravel Framework 5.2 (http://laravel.com/)

- Bootstrap v3.3.6 (http://getbootstrap.com)

- jQuery v1.12.3 (https://jquery.com)

- SendGrid - Mail service (https://sendgrid.com/)

- CSS Preprocessor - SASS (http://sass-lang.com/)

#Deploy

## Clone project
`git clone https://github.com/tutv95/employee`

## Install dependency package
`composer update`

## Config .env
- Config databases (require)

- Config mail (require)

- Config paging (optional)

## Config storage
- Create directory: `storage/app/uploads`

- Symlink: `storage/app/uploads -> public/uploads`


#Seeder
###Run

`php artisan db:seed`

###Acount admin:

email: tutv95@gmail.com

password: 123456

# Demo
[http://dev.blogk.xyz/](http://dev.blogk.xyz/)