(function($){


    $(function(){

        //fetch a new quote 
        $('#newQuoteButton').on('click', function(event) {
        event.preventDefault(); 

        $.ajax({
            method: 'GET',
            url: '/qod/wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
            cache: false
        }).done( function(data) {
            const post = data.shift(); //get the first and only post array
            console.log(post);
            const title = post.title.rendered,
                content = post.content.rendered,
                quoteSource = post._qod_quote_source,
                sourceUrl= post._qod_quote_source_url,
                slug = post.slug;

            $('.entry-content').html(content);
            $('.entry-title').html('<p> - ' + title + '<p>'); 
            $('.source').html('<span class="source"><a href="'+sourceUrl+'">'+quoteSource+'</a></span>');

            let url = 'http://localhost:3000/qod/' + post.slug;


            history.pushState(null, null, url)
            
            window.addEventListener('popstate', function(event) {
            let LastPage = document.URL;
            window.location.replace(LastPage);
            })

        });


     });

     $(window).on('popstate', function(){
         window.location.replace(lastPage);
     });

});

    $(function() {
        // Event on submit of the form
        $('#submitQuote').on('submit', function(event) {
            event.preventDefault(); 
            const data = {
                title: $('#update-title').val(),
                content: $('#quote').val(),
                _qod_quote_source: $('#quote-where').val(),
                _qod_quote_source_url: $('#quote-url').val(),
                post_status: 'pending'
              }
            $.ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',
                data, 
                beforeSend: function(xhr) {
                    xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
                    console.log(data);
                }

            }).done(function() {
                    // clear the form fields and hide the form
                    $('#submitQuote')
                      .slideUp()
                      .find('input[type="text"], input[type="url"], textarea')
                      .val('');
                    // show success message
                    $('.submit-success')
                      .text(api_vars.success)
                      .slideDown('slow');
                  })
                  .fail(function() {
                    alert(api_vars.failure);
                  });
        });

    });

    

})(jQuery);