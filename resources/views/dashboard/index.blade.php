@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_home') }}
@endsection

@section('content')
<h3>Content</h3>
@endsection