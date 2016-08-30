@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
      <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
        <div class="demo-card-image mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title mdl-card--expand"></div>
          <div class="mdl-card__actions">
          </div>
        </div>
      </header>
      <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card__supporting-text">
          <h4>{{$profile->first_name}} {{$profile->last_name}}</h4>
          <p>{{$profile->email}}</p>
        </div>
        <div class="mdl-card__actions">
          <p class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Borrowed books - {{$profile->books()->count()}}
          </p>
        </div>
      </div>
    </section>
    <section>
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th>Title</th>
            <th>ISBN</th>
            <th>Days to return</th>
            <th>Borrowed date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($profile->books()->get() as $book)
          <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{14 - $book->pivot->created_at->diffInDays(Carbon\Carbon::now())}}</td>
            <td>{{$book->pivot->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
@endsection
@section('sidebar')
  <a href="{{URL::route('admin.books.create')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Create new book
    </a>
@endsection