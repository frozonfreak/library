@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Role</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($members as $member)
      <tr>
        <td><a href="{{URL::route('admin.users.show', array($member->id))}}">{{$member->first_name}} {{$member->last_name}}</a></td>
        <td>{{$member->age}}</td>
        <td>{{$member->email}}</td>
        <td>{{$member->roles()->lists('name')}}</td>
        <td>
          {!! Form::open(['route' => ['admin.users.delete', $member->id], 'method' => 'delete']) !!}
            <button type="submit" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">delete</i>
            </button>
          {!! Form::close() !!}
        </td>      
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $members->render() !!}
@endsection


@section('sidebar')
  <a href="{{URL::route('admin.users.create')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Create new user
    </a>
@endsection