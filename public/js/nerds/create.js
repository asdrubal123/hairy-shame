    jQuery( document ).ready( function( $ ) {
        $('#create').click(function() {
            $.ajax({
                url: BASE + "nerds/create",
                type: 'GET',
                success: function (data) {
                $("div#for-form").html(data);
            }
            });



        $( '#form-create-nerd' ).on( 'submit', function() {
     
            //.....
            //show some spinner etc to indicate operation in progress
            //.....
     
            $.post(
                $( this ).prop( 'action' ),
                {
                    "_token": $( this ).find( 'input[name=_token]' ).val(),
                    "name": $( '#name' ).val(),
                    "email": $( '#email' ).val(),
                    "nerd_level": $( '#nerd_level' ).val()
                },
                function( data ) {
                    //do something with data/response returned by server
                },
                'json'
            );
     
            //.....
            //do anything else you might want to do
            //.....
     
            //prevent the form from actually submitting in browser
            return false;
        } );
     
    } );

