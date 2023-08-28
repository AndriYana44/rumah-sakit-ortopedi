<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// ============ Dashboard Admin ============
// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('dashboard_home', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Home', route('dashboard'));
});

// Home > Dokter
Breadcrumbs::for('dashboard_dokter', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dokter', route('dokter'));
});

// home > doker > jadwal
Breadcrumbs::for('dashboard_dokter_jadwal', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard_dokter');
    $trail->push('Jadwal', route('dokter.jadwal'));
});

// home > doker > create
Breadcrumbs::for('dashboard_dokter_create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard_dokter');
    $trail->push('Tambah', route('dokter.create'));
});

// home > jadwal > create
Breadcrumbs::for('dashboard_dokter_jadwal_create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard_dokter_jadwal');
    $trail->push('Tambah', route('dokter.jadwal.create'));
});

// home > user
Breadcrumbs::for('dashboard_user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user'));
});

// home > user > create
Breadcrumbs::for('dashboard_user_create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard_user');
    $trail->push('Tambah', route('user.create'));
});