// JavaScript source code
$('.first-name-class').on('input', function() {
    // do something
    if(String($('.first-name-class').val()).length > 0){
        $('#start-fisrt-name').hide();
        
    }else{
        $('#start-fisrt-name').show();
    }
});
    $('.name-class').on('input', function() {
        // do something
        if(String($('.name-class').val()).length > 0){
            $('#start-name').hide();
            
        }else{
            $('#start-name').show();
        }
    });
    
    $('.mail-class').on('input', function() {
        // do something
        if(String($('.mail-class').val()).length > 0){
            $('#start-mail').hide();
            
        }else{
            $('#start-mail').show();
        }
    });    
