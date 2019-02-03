<?php

 

    // Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', '/');
});

// Home > contacto
Breadcrumbs::for('contacto', function ($trail) {
    $trail->parent('home');
    $trail->push('Contacto', '/contacto');
});






    // Home  > [set]

 Breadcrumbs::for('set', function ($trail, $set) {
    $trail->parent('home');
    $trail->push($set->title, $set->slug);
});

 


