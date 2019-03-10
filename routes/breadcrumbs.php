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

Breadcrumbs::for('quienes-somos', function ($trail) {
    $trail->parent('home');
    $trail->push('Quienes somos', '/quienes-somos');
});

Breadcrumbs::for('trabaja-con-nosotros', function ($trail) {
    $trail->parent('home');
    $trail->push('Trabaja con nosotros', '/trabaja-con-nosotros');
});






    // Home  > [set]

 Breadcrumbs::for('set', function ($trail, $set) {
    $trail->parent('home');
    $trail->push($set->title, $set->slug);
});

 


