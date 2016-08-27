@extends('layouts.master')

@section('title', 'Login')

@section('content')
  {!! Form::open(['url' => 'login']) !!}
    <div class="group">
      <input type="email" name="email" required><span class="highlight"></span><span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">
      <input type="password" name="password" required><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
    <button type="submit" class="button buttonBlue">Login
    </button>
  {!! Form::close() !!}
@endsection