@extends('layouts.dashboard')

@section('title', 'Books')

@section('content')
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Author</th>
        <th>Borrowed date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($user->books()->get() as $book)
      <tr>
        <td><img class="avatar" src="{{$book->image_url}}"></td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->pivot->created_at}}</td>
        <td>
          {!! Form::open(['route' => ['users.books.submit', $book->id], 'method' => 'put']) !!}
            <button type="submit" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">done</i>
            </button>
          {!! Form::close() !!}
        </td>      
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection