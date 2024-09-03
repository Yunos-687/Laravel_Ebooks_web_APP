// resources/js/app.js

import $ from 'jquery';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.favorite-icon').on('click', function() {
        var $this = $(this);
        var bookId = $this.attr('id');
        var isFavorited = $this.hasClass('favorited');
        var url = isFavorited ? "/favorite/remove" : "/favorite/add";
        var type = isFavorited ? 'DELETE' : 'POST';

        $.ajax({
            url: url,
            type: type,
            data: {
                _token: csrfToken,
                book_id: bookId,
                user_email: '{{ Auth::user()->email }}' // Ensure user email is included
            },
            success: function(response) {
                if (response.success) {
                    if (isFavorited) {
                        $this.removeClass('favorited'); // Remove the class if favorited
                    } else {
                        $this.addClass('favorited'); // Add the class if not favorited
                    }
                    alert(response.message); // Show the response message
                } else {
                    alert(response.message); // Show failure message
                }
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message
                    ? xhr.responseJSON.message
                    : 'An error occurred. Please try again.';

                alert(errorMessage); // Show error message
            }
        });
    });
});