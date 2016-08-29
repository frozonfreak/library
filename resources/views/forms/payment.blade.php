@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
      <form action="/payment" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="book_id" value="{{ $id }}">
              <input type="hidden" name="amount_due" value="{{ $amount_due }}">
              <script
                      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                      data-key="pk_test_t9ZQJqs51XNxhN6OfxL0qQFv"
                      data-amount="{{$amount_due}}"
                      data-name="Library"
                      data-description="Overdue Payment({{$amount_due}})"
                      data-image="/128x128.png">
              </script>
          </form>    
      </section>
@endsection