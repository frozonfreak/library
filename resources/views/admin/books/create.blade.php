@extends('layouts.dashboard')

@section('title', 'Books')

@section('content')
  @if(@$book)
  {!! Form::open(['method' => 'post', 'route' => array('admin.books.update', $book->id), 'files' => true]) !!}
  @else
    {!! Form::open(['method' => 'post', 'route' => 'admin.books.store', 'files' => true]) !!}
  @endif
  <div class="group">
      <div class="form-group">
        {!! Form::label('Book Image') !!}
        {!! Form::file('image_url', null) !!}
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="title" id="title" @if(@$book) value="{{$book->title}}" @endif required>
        <label class="mdl-textfield__label" for="title">Title</label>
      </div>
    </div>
    <div class="group">
      <textarea name="description" class="mdl-textfield__input" type="text" id="description" rows= "3" id="description" required>@if(@$book){{$book->description}}@endif </textarea><span class="highlight"></span><span class="bar"></span>
      <label>Description</label>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="author" id="author" @if(@$book) value="{{$book->author}}" @endif required>
        <label class="mdl-textfield__label" for="author">Author</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="isbn" id="isbn" @if(@$book) value="{{$book->isbn}}" @endif required>
        <label class="mdl-textfield__label" for="isbn">ISBN</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="number" name="quantities" id="quantities" @if(@$book) value="{{$book->quantities}}" @endif required>
        <label class="mdl-textfield__label" for="quantities">Quantity</label>
      </div>
    </div>
    <div class="group">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="location" id="location" @if(@$book) value="{{$book->location}}" @endif required>
        <label class="mdl-textfield__label" for="location">Location</label>
      </div>
    </div>
    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">@if(@$book) Update Book @else Create Book @endif
    </button>
  {!! Form::close() !!}
@endsection