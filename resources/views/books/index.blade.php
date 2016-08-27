@extends('layouts.master')

@section('title', 'Books')

@section('content')
  <div class="mdl-grid">
    @foreach($books->chunk(3) as $arr_books)
      @foreach($arr_books as $book)
        <div class="mdl-cell mdl-cell--4-col">
          <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title" style="background:url({{$book->image_url}}) center / cover;">
              <a href="{{URL::route('books.show',[$book->id])}}">
                <h2 class="mdl-card__title-text">{{$book->title}}</h2>
                <p> by {{$book->author}} </p>
              </a>
            </div>
            <div class="mdl-card__supporting-text">
              {{$book->description}}
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <p class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Available - {{$book->quantities}}
              </p>
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <p class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                location - {{$book->location}}
              </p>
            </div>
            <div class="mdl-card__menu">
              <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                <i class="material-icons">add</i>
              </button>
            </div>
          </div>
        </div>
      @endforeach
    @endforeach
    {!! $books->render() !!}
  </div>
@endsection