
jQuery(document).ready(function() {
    
    
    
    /*
        Registration Form
    */
    $('.registration-form fieldset:first-child').fadeIn('slow');
    
    $('.registration-form input[type="text"], .registration-form input[type="password"], .registration-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    // next step
    $('.registration-form .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        
        parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                $(this).next().fadeIn();
            });
        }
        
    });
    
    // previous step
    $('.registration-form .btn-previous').on('click', function() {
        $(this).parents('fieldset').fadeOut(400, function() {
            $(this).prev().fadeIn();
        });
    });
    
    // submit
    $('.registration-form').on('submit', function(e) {
        
        $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
    });
    
    
});




jQuery(document).ready(function() {
    
    
    
    /*
        Appointment Form
    */
    $('.appointment-form fieldset:first-child').fadeIn('slow');
    
    $('.appointment-form input[type="text"],  .appointment-form textarea, .appointment-form input[type="password"]').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    // next step
    $('.appointment-form .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        
        parent_fieldset.find('input[type="text"], textarea, input[type="password"]').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                $(this).next().fadeIn();
            });
        }
        
    });

    // waiting list enlistment
    $('.appointment-form .btn-enlist').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        
        parent_fieldset.find('input[type="text"], textarea, input[type="password"]').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                $(this).next().fadeIn();
                var fieldset1 = document.getElementById("fieldset1");
                var fieldset2 = document.getElementById("fieldset2");

                $(fieldset1).hide();
                $(fieldset2).show();
            });
        }
        
    });

    // previous step
    $('.appointment-form .btn-previous').on('click', function() {
        $(this).parents('fieldset').fadeOut(400, function() {
            $(this).prev().fadeIn();
        });
    });
    
    // previous step
    $('.appointment-form .btn-previous-enlist').on('click', function() {

        $(this).parents('fieldset').fadeOut(400, function() {
          $(this).prev().fadeIn();

                var fieldset0 = document.getElementById("fieldset0");
                var fieldset1 = document.getElementById("fieldset1");


                $(fieldset1).hide();
                $(fieldset0).show();
                
        });
    });


    
    
    // submit
    $('.appointment-form').on('submit', function(e) {
        
        $(this).find('input[type="text"], textarea').each(function() {
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
    });
    
    
});
