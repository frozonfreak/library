@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
  @if(@$profile)
  {!! Form::open(['method' => 'post', 'route' => array('admin.users.update', $profile->id), 'files' => true]) !!}
  @else
    {!! Form::open(['method' => 'post', 'route' => 'admin.users.store', 'files' => true]) !!}
  @endif
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="first_name" id="first_name" @if(@$profile) value="{{$profile->first_name}}" @endif required>
        <label class="mdl-textfield__label" for="first_name">First Name</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="last_name" id="last_name" @if(@$profile) value="{{$profile->last_name}}" @endif required>
        <label class="mdl-textfield__label" for="last_name">Last Name</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="email" name="email" id="email" @if(@$profile) value="{{$profile->email}}" @endif required>
        <label class="mdl-textfield__label" for="email">Email</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="number" name="age" id="age" @if(@$profile) value="{{$profile->age}}" @endif required>
        <label class="mdl-textfield__label" for="age">Age</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="password" name="password" id="password" @if(@$profile) value="{{$profile->password}}" @endif required>
        <label class="mdl-textfield__label" for="password">Password</label>
      </div>
    </div>
    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">@if(@$profile) Update User @else Create User @endif
    </button>
  {!! Form::close() !!}
@endsection