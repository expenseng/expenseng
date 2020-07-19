<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About Us', route('about'));
});

// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact Us', route('contact'));
});

// Home > Expense_Report
Breadcrumbs::for('expense.reports', function ($trail) {
    $trail->parent('home');
    $trail->push('Expense_Report', route('expense.reports'));
});

// Home > Expense_Ministry
Breadcrumbs::for('expense.ministry', function ($trail) {
    $trail->parent('home');
    $trail->push('Expense_Ministry', route('expense.ministry'));
});

// Home > Ministries
Breadcrumbs::for('ministries', function ($trail) {
    $trail->parent('home');
    $trail->push('Ministries', route('ministries'));
});

// Home > Ministries > [Ministry]
Breadcrumbs::for('ministry', function ($trail, $ministry) {
    $trail->parent('ministries');
    $trail->push($ministry->name, route('ministries.single', $ministry->id));
});

// Home > Contractors
Breadcrumbs::for('contractors', function ($trail) {
    $trail->parent('home');
    $trail->push('Contractors', route('contractors'));
});

// Home > Contractors > [Contractor]
Breadcrumbs::for('contractor', function ($trail, $company) {
    $trail->parent('contractors');
    $trail->push($company->name, route('contractors.single', $company->id));
});
