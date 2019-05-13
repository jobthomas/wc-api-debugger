 jQuery( document ).ready(function( $ ) {

    // Check that all fields are filled in and grab the values

    $( '#search_form' ).on( 'submit', function(e) {

        // Prevent the form from executing
        e.preventDefault();

        // Set break variable
        var $empty_value;

        // Run value to checks to make sure they're not empty
        $( '#search_form input[type="text"]' ).each( function() {

            if ( $(this).val() != '' ) {
                console.log ( 'Nice! All values are set.' );
                
            } else {
                console.log( 'Error. Missing Values. ' );
                //$empty_value = true;
            }

        });

        var $search_domain  = $( '#search_form .search_domain' ).val();
        var $search_key     = $( '#search_form .search_key' ).val();
        var $search_secret  = $( '#search_form .search_secret' ).val();

        // Build up the entire domain to search including the consumer key and secret
        var $api_domain = $search_domain + '/wp-json/wc/v3/system_status?' + 'consumer_key=' + $search_key + '&consumer_secret=' + $search_secret;

        // Forward the query to cors-anywhere to prevent CORS errors from Chrome; It's essentially a proxy forwarder
        // See https://github.com/Rob--W/cors-anywhere/ for more details
        var $api_result_forwarder = "https://cors-anywhere.herokuapp.com/" + $api_domain;

        $.ajax({
          url: $api_result_forwarder,
          method: "GET",
          dataType: "json",
          headers: {
            "x-requested-with": "xhr" 
          }
        }).done( function( data ) {
            
            console.log( data );

            var $api_store_success = 
                '<div class="woocommerce-notices-wrapper">' +
                    '<ul class="woocommerce-info" role="alert">' +
                        '<li>Success! We managed to connect to that site</li>' +
                    '</ul>' +
                '</div>';

            $( $api_store_success ).prependTo( '#search_container' );

            $( '.inactive' ).addClass( 'active' ).removeClass( 'inactive' );

            $( '.woocommerce-api-data .woocommerce-api-environment-homeurl').html( data.environment.home_url );
            $( '.woocommerce-api-data .woocommerce-api-environment-apienabled').html( data.settings.api_enabled );
            $( '.woocommerce-api-data .woocommerce-api-environment-domain').html( $search_domain + '/wp-json/wc/v3/' );
            $( '.woocommerce-api-data .woocommerce-api-environment-serverinfo').html( data.environment.server_info );
            $( '.woocommerce-api-data .woocommerce-api-environment-phpversion').html( data.environment.php_version );
            $( '.woocommerce-api-data .woocommerce-api-environment-phpmaxtime').html( data.environment.php_max_execution_time );
            $( '.woocommerce-api-data .woocommerce-api-environment-maxvars').html( data.environment.php_max_input_vars );
            $( '.woocommerce-api-data .woocommerce-api-environment-remotepost').html( data.environment.remote_post_successful );
            $( '.woocommerce-api-data .woocommerce-api-environment-remoteget').html( data.environment.remote_get_successful );
            $( '.woocommerce-api-data .woocommerce-api-environment-debug').html( data.environment.wp_debug_mode );

        }).fail(function(jqXHR, textStatus) { 
          
            console.error(textStatus);
            var $api_store_fail = 
                '<div class="woocommerce-notices-wrapper"><ul class="woocommerce-error" role="alert"><li>Bummer! We couldn\'t connect to that site</li></ul></div>';
            $( $api_store_fail ).appendTo( '#search_container' );

        }) 
    });   
});