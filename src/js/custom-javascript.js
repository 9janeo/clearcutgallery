// Add your custom JS here.
import '../../block-templates/gallery-blocks'

(function($) {
    // Add your custom JS here.

    console.log("why can I log from here?...");

    $(function(){            

        $('#home-carousel').carousel({
            interval: 4000,
            pause: false
        });
    
        $('#home-carousel').on('slide.bs.carousel', function(){
            // console.log('Ha! gotchya bish!... from the carousel sliding');
        });

    });

    // Add auto pan for fullscreen images when larger than container


})(jQuery);
