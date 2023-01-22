@extends('layouts.main-layout')

@section('title')
  View Clinics
@endsection

@section('content')
  <div id="clinicRatingsContainer">
    <div class="row clinicName">
      <h1>{{ $clinic->clinicName }}</h1>
      <strong>Average Rating: {{ $clinic->AverageRating }}</strong>
      <strong>Reviews: {{ $clinic->TotalReviews }}</strong>
    </div>
    @if(session('userType') == 'Normal')
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="/ratings/{{ $clinic->id }}" method="post">
            {{ csrf_field() }}
            <hr class="rating-divider">
            <div class="my-rating" data-rating=""></div>
            <hr class="rating-divider">
            <input type="hidden" name="user_rating" id="user_rating" required>
            <input type="hidden" name="clinicID" value="{{ $clinic->id }}">
            <input type="hidden" name="userID" value="{{ session('userID') }}">
            <textarea type="text" class="form-control" id="user_review" name="user_review" rows="3" required></textarea>
            <hr class="rating-divider">
            <button class="btn btn-primary w-100" type="submit" id="submitRatingBtn"><strong>Submit Response</strong></button>
        </form>
        </div>
        <div class="col-md-2"></div>
      </div>
    @endif
    <hr>
    <div class="row user-ratings-container">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        @forelse($ratings as $key => $rating)
          <div class="rating-card card">
            <div class="card-body rating-card-body">
              <div class="user-info">
                  <img src="{{ $rating->user->imagePath }}" class="rating-user-photo" alt="user-photo" height="40px" width="40px">
                  <strong>{{ $rating->user->FullName }}</strong>
              </div>
              <hr class="rating-card-divider">
              <div class="rating-header">
                <div class="user-rating" data-rating="{{ $rating->rating }}"></div>
                {{ $rating->created_at }}
              </div>
              <hr class="rating-card-divider">
              <p>{{ $rating->review }}</p>
            </div>
          </div>
        @empty
          <div class="card">
            <div class="card-body">
              <h3>No data found.</h3>
            </div>
          </div>
        @endforelse
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
@endsection