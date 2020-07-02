## Style Guide for Frontend Developers

If you are a Frontend dev, please follow me
Like I announced yesterday we will be using Laravel and I believe you should have setup your environment by now This is our new repo: https://github.com/hngi/expenseng

Frontend developers will be working with Laravel's blade.
The link takes you to Laravel's official documentation on Blade. If you have experience of Vue.js, please say so here.
Blade is nothing different from the HTML and CSS you already write, it only allows you to embed server side code into your templates. So you only need to know the basics such:

- [Extending layouts](https://laravel.com/docs/7.x/blade#extending-a-layout)
- [Creating layouts](https://laravel.com/docs/7.x/blade#defining-a-layout) (most of you don't need this)
- [Including views](https://laravel.com/docs/7.x/blade#including-subviews)
- [Stacks](https://laravel.com/docs/7.x/blade#stacks)
- [Forms](https://laravel.com/docs/7.x/blade#forms)

In addition to embedding server side code, you also have super power of including other people's template into yours. For instance, we could have a file called `comment-form.blade.php` and that file can be included everywhere we need a comment form to appear. Without need to copy and paste the code or styling.

Blade naming uses the format: `name.blade.php` and blade files should be kept within the `resources/views folder`. If you check the current repo you'd see we have other folders withing this directory. We have the `pages folder` which will house the pages of the `website: home, about, contact, expenditures, etc`.
And we have the partials folder which will house the partial files like the `comment-form.blade.php` I described above. And lastly we have the layouts folder which will house the layouts of the project.
Most of your work will be in the partials or pages folder.

## STYLING
This project will be using `SCSS`, which is just `CSS` will more control and modular code.
`SCSS` is best for writing smaller pieces of code and compiling them into one large `CSS` file which will be linked to all the pages.
Now if you take a look at the `resources/sass/ folder`, you will find that we have broken down the individual css files you used in your templates into smaller `.scss files`. All of this will imported into the `app.scss` file in the same directory and them compiled with Webpack into a `app.css` file in the `public/css` directory. sass-lang.com

So when you work on `footer.blade.php` which you store in `resources/views/partials` you will also create your footer.`scss` file in `resources/sass/footer.scss.`
And finally you will go to app.scss and your footer.scss file like so: 

````
...
...
@import 'footer;

````

When you do that, it is automatically compiled into the app.css file which will be inserted into the page already so you don't have to link any css file to your templates again.

A typical SCSS code targeting the child element in a ul will look like so:

````
ul{

  li{

     list-style: none;
  }

}
````

The same thing in CSS will look like:

`ul li{ list-style: none; }`

When adding images in your SCSS files, the right way to them is:

````
.header {

  .logo{

     background: url('/img/logo.png'); 
  }

  .logo h2{
     font-family: Lato 'sans-serif'; 
   }
}
````

Please do not do this, it won't work and your `app.css` won't compile  

````
.header{
  .logo{
    background: url('../img/logo.png')
  }
}
````

To get your image showing up properly, make sure that you have it inside the `resources/img folder`.

Anywhere else and your code won't work as expected, secondly your code won't be merged.

## Compiling your code:

Once your project is setup, you should open a terminal where your code will be compiled while you're working:

- Navigate to the project directry:

`cd ../../xampp/htdocs/expenseng`

- Start Laravel Mix

`npm run watch`

`npm run watch` will keep watching your code in the `resources` directory for file changes and automatically compile them to the `public` folder.

So you shouldn't place anything in the public folder yourself.
