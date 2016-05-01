# 1. Requirement

[rikkeisoft/php-training/projects/employee-directory](https://github.com/rikkeisoft/php-training/blob/master/projects/employee-directory/01.Requirement.md)

# 2. Technologies

- Laravel Framework 5.2 (http://laravel.com/)

- Intervention Image 2.x (http://image.intervention.io/)

- laravelista/Ekko (https://github.com/laravelista/Ekko)

- SendGrid - Mail service (https://sendgrid.com/)

- Bootstrap v3.3.6 (http://getbootstrap.com)

- CSS Preprocessor - SASS (http://sass-lang.com/)

- jQuery v1.12.3 (https://jquery.com)

- jQuery.scrollTo 2.1.2 (https://github.com/flesler/jquery.scrollTo)



# 3. Deploy

## System requirements
- PHP >= 5.5.9

- OpenSSL PHP Extension

- PDO PHP Extension

- Mbstring PHP Extension

- Tokenizer PHP Extension

## Clone project
`git clone https://github.com/tutv95/employee`

## Install dependencies
`composer update`

## Config .env
- Config databases (require)

- Config mail (require)

- Config paging (optional)

## Config storage
- Create directory: `storage/app/uploads`

- Symlink: `storage/app/uploads -> public/uploads`


## Seeder
### Run

`php artisan db:seed`

### Account admin:

email: tutv95@gmail.com

password: 123456

# 4. Demo

[http://dev.blogk.xyz/](http://dev.blogk.xyz/)