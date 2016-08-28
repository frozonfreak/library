@extends('layouts.dashboard')

@section('title', 'Books')

@section('content')
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Author</th>
        <th>Available</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td><img class="avatar" src="{{$book->image_url}}"></td>
        <td><a href="{{URL::route('admin.books.show', array($book->id))}}">{{$book->title}}</a></td>
        <td>{{$book->author}}</td>
        <td>{{$book->quantities - $book->users()->count()}}  / {{$book->quantities}}</td>
        <td>
          {!! Form::open(['route' => ['admin.books.delete', $book->id], 'method' => 'delete']) !!}
            <button type="submit" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">delete</i>
            </button>
          {!! Form::close() !!}
        </td>      
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $books->render() !!}
@endsection