jQuery(function($){
			// Set all variables to be used in scope
		  		var frame,
			      metaBox 		= $('#wpg-term-thumb'), // Your meta box id here
			      inside		= metaBox.find( '.inside'),
			      addImgLink 	= metaBox.find( '#add-term-image'),
			      delImgLink 	= metaBox.find('#remove-term-image'),
			      submit_term 	= $('#submit'),
			      imgContainer 	= metaBox.find( '#thumb'),
			      imgIdInput 	= metaBox.find( '#wpg-term-thumb-id' );

			// ADD IMAGE LINK
			addImgLink.on( 'click', function( event ){

		    	event.preventDefault();

			    // If the media frame already exists, reopen it.
			    if ( frame ) {
			      frame.open();
			      return;
			    }

			    // Create a new media frame
			    frame = wp.media({
			      title: wpg_post_manager.title_frame,
			      library: { type: 'image' },
			      button: {
			        text: wpg_post_manager.use_button
			      },
			      multiple: false  // Set to true to allow multiple files to be selected
			    });

			    // When an image is selected in the media frame...
			    frame.on( 'select', function() {

			      // Get media attachment details from the frame state
			      var attachment = frame.state().get('selection').first().toJSON();

				  // Add only if image
			      if (attachment.type == 'image') {

			      	 if (imgIdInput.val().length !== 0) {
				    	imgIdInput.val('');
				    	imgContainer.html( '' );
				     }

			      	 // Hide the add image link
				     inside.addClass( 'hidden' );
				     // Send the attachment URL to our custom image input field.
				     imgContainer.append( '<img src="'+attachment.url+'" alt="" />' );
				     // Send the attachment id to our hidden input
				     imgIdInput.val( attachment.id );
				     // Unhide the remove image link
				     delImgLink.removeClass( 'hidden' );
			      }

		    	});

		    // Finally, open the modal on click
		    frame.open();
			});



			// DELETE IMAGE LINK
			delImgLink.on( 'click', function( event ){

			   	event.preventDefault();

		    	// Clear out the preview image
		    	imgContainer.html( '' );
		    	// Un-hide the add image link
		    	inside.removeClass( 'hidden' );
		    	// Hide the delete image link
		    	delImgLink.addClass( 'hidden' );
		    	// Delete the image id from the hidden input
		    	imgIdInput.val( '' );
			});

            if ($('#addtag').length) {

    			submit_term.on( 'click', function( event ){
    	
                        // Clear out the preview image
                        imgContainer.html( '' );
                        // Un-hide the add image link
                        inside.removeClass( 'hidden' );
                        // Hide the delete image link
                        delImgLink.addClass( 'hidden' );
                        // Delete the image id from the hidden input
                        imgIdInput.val( '' );                
          
    		    	
    			});
			
			}

});