@extends('layouts.master')

@section('title', 'Signup')

@section('content')
  {!! Form::open(['url' => 'auth/signup']) !!}
    <div class="group">
      <input type="text" name="first_name" required><span class="highlight"></span><span class="bar"></span>
      <label>First Name</label>
    </div>
    <div class="group">
      <input type="text" name="last_name" required><span class="highlight"></span><span class="bar"></span>
      <label>Last Name</label>
    </div>
    <div class="group">
      <input type="number" name="age" required><span class="highlight"></span><span class="bar"></span>
      <label>Age</label>
    </div>
    <div class="group">
      <input type="email" name="email" required><span class="highlight"></span><span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">
      <input type="password" name="password" required><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
    <button type="submit" class="button buttonBlue">Signup
    </button>
  {!! Form::close() !!}
@endsection