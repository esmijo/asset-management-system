@extends('layouts.main-layout')

@section('title')
Home
@endsection

@section('content')
  <h1>Welcome, {{ session('userName') }}</h1>
  <form action="/" method="post">
    
  </form>
@endsection