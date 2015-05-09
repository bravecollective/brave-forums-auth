$(function(){
    $('#password').on('keypress change blur', function(){
        // Reset strength indicator
        $('.password-strength div').css('background-color', '');

        if($(this).val() == '')
            return;

        var result = zxcvbn($(this).val());

        console.log(result.score);

        var color = '#d43f3a';

        if(result.score >= 2){
            color = '#f0ad4e';
        }

        if(result.score == 4 ){
            color = '#5cb85c';
        }


        for(var i=0; i<=result.score; i++){
            $('.strength-'+ i).css('background-color', color);
        }
    });
});