#Deploy

## Clone project
`git clone https://github.com/tutv95/employee`

## Install dependency package
`composer update`

## Config .env
- Config databases

- Config mail

## Config storage
- Create directory: storage/app/uploads

- Symlink: storage/app/uploads -> public/uploads

------------------------

php artisan optimize

php artisan config:cache

php artisan route:cache

php artisan view:clear

php artisan config:clear

#Seeder
###Run

`php artisan db:seed`

###Acount admin:

email: tutv95@gmail.com

password: 123456

## Demo
[http://dev.blogk.xyz/](http://dev.blogk.xyz/)

Account: tutv.cntt@gmail.com

Pass: *****