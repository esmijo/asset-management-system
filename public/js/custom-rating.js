if(location.pathname.indexOf('/ratings/') == 0) {

  $(document).ready( function() {

    $('#submitRatingBtn').attr('disabled', true)

    $('.my-rating').starRating({
      totalStars: 5,
      starShape: 'rounded',
      starSize: 30,
      emptyColor: 'gray',
      hoverColor: '#43a6c9',
      activeColor: 'blue',
      useGradient: false,
      useFullStars: true,
      ratedColors: ['#2596be', '#2596be', '#2596be' ,'#2596be' ,'#2596be'],
      minRating: 1,
      callback: function(currentRating, $el){
        $('#user_rating').val(currentRating)
        $('#submitRatingBtn').attr('disabled', false)
      }
    });

    $('.user-rating').starRating({
      totalStars: 5,
      starShape: 'rounded',
      starSize: 18,
      emptyColor: 'gray',
      hoverColor: '#43a6c9',
      activeColor: '#2596be',
      useGradient: false,
      useFullStars: true,
      readOnly: true,
      ratedColors: ['#2596be', '#2596be', '#2596be' ,'#2596be' ,'#2596be'],
    });

  })

}