@extends('layouts.master')

@section('title', 'Books')

@section('content')
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
      <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
        <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url({{$book->image_url}}) center / cover;">
          <div class="mdl-card__title mdl-card--expand"></div>
          <div class="mdl-card__actions">
          </div>
        </div>
      </header>
      <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card__supporting-text">
          <h4>{{$book->title}}</h4> by <h5>{{$book->author}}</h5>
          {{$book->description}}
        </div>
        <div class="mdl-card__actions">
          <a href="#" class="mdl-button">Read our features</a>
        </div>
      </div>
    </section>
  </div>
@endsection