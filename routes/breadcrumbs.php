<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->push('About', route('about'));
});

// Home > Contact
Breadcrumbs::for('contactUs', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});


// Home > Expense > Reports
Breadcrumbs::for('expense', function ($trail) {
    $trail->parent('home');
    $trail->push('Expense', route('expense.reports'));
});

// Home > Expense > Ministry
Breadcrumbs::for('ministry', function ($trail) {
    $trail->parent('home');
    $trail->push('Ministry', route('expense.ministry'));
});

/* // Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
}); */
?>