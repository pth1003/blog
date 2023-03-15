<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('frontend.index'));
});

// Home > category
Breadcrumbs::for('cat', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('frontend.page', ['id', $category->id]));
});

Breadcrumbs::for('post', function ($trail) {
    $trail->parent('home');
    $trail->push('Post');
});
