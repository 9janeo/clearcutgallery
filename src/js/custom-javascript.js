<<<<<<< HEAD
// Add your custom JS here.
=======
(function($) {
    // Add your custom JS here.

    $(function(){
            
        $('#home-carousel').carousel({
            interval: 4000,
            pause: false
        });
        
        // $('#home-carousel').carousel('cycle');
    
        $('#home-carousel').on('slide.bs.carousel', function(){
            // console.log('Ha! gotchya bish!... from the carousel sliding');
        });
    });
    


})(jQuery);
>>>>>>> 4f29457 (Add fullscreen landing page)
