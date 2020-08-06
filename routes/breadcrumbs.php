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

// Home > Teams
Breadcrumbs::for('teams', function ($trail) {
    $trail->parent('home');
    $trail->push('Our Team', route('teams'));
});

// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact Us', route('contact'));
});

// Home > Search
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push('search', route('search'));
});

// Home > Expense_Report
Breadcrumbs::for('expense.reports', function ($trail) {
    $trail->parent('home');
    $trail->push('Reports', route('expense.reports'));
});

// Home > Expense_Ministry
Breadcrumbs::for('expense.ministry', function ($trail) {
    $trail->parent('home');
    $trail->push('Ministry Expenses', route('expense.ministry'));
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

//Home > FOIA
Breadcrumbs::for('FOIA', function ($trail) {
    $trail->parent('home');
    $trail->push('FOIA', route('FOIA'));
});

//Home > Accessibility
Breadcrumbs::for('accessibility', function ($trail) {
    $trail->parent('home');
    $trail->push('Accessibility', route('accessibility'));
});

//Home > FAQ
Breadcrumbs::for('FAQ', function ($trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});

//Home > Privacy_Policy
Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('home');
    $trail->push('Privacy', route('privacy'));
});

//Home > Gov. Handles
Breadcrumbs::for('handles', function ($trail) {
    $trail->parent('home');
    $trail->push('Handles', route('handles'));
});


//Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blogetc.index'));
});
