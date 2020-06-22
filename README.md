# FG Expense Tracker

An expense tracking app that aims to promote transparency in the handling of public funds by public officers in Nigera. Visit our website at [expenseng.com](https://expenseng.com)

For quick navigation:

-   [Code of Conduct](#coc)
-   [Contribution Guide](#contribute)
-   [Learning Laravel](#learn-laravel)
-   [License](#license)

## <a name="coc"></a> Code of Conduct

Please read FG Expense Tracker's [Code of Conduct](https://github.com/hngi/expenseng/blob/master/CODE_OF_CONDUCT.md). It is important that you follow the code to ensure that we all remain professional and fair to each other.

## <a name="contribute"></a> Contribution Guide

### Setting up your workspace

Before running this app, locally make sure you have the following software installed:

-   XAMPP or it's equivalent
-   NPM
-   Composer

Now, follow this steps to start contributing:

1. Clone this repository with `git clone https://github.com/hngi/expenseng.git`
2. Run `cd expenseng`
3. Run `composer install`
4. Run `npm install`
5. Run `php artisan key:generate --show` to retrieve a base64 encoded string for Laravel's `APP_KEY` in `.env`
6. Run `php artisan serve` from your terminal and the app will be running on `http://127.0.0.1:8000/`
7. This project makes use of Laravel mix, and so all scripts and stylesheets are in the resources folder. When you run `npm run dev`, they will be compiled and written to the `public` folder.

### Frontend Developers

If you are new to Laravel, this [quick guide](https://laravel-news.com/your-first-laravel-application) will help you get started.

#### A few things to note:

-   All your `CSS` or `SASS` or files should be in the `resources/sass` or `resources/css` directory
-   The above applies to images as well, there is a `resources/img` folder which house all images for this project
-   **!Important** References to your images in your Stylesheet should use the format `url('/img/<image-name>')`
-   All links must use the naming convention of `route('name')`, learn more about [Laravel named routes](https://laravel.com/docs/7.x/routing#named-routes)

## <a name="learn-laravel"></a> Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## <a name="license"></a> License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
