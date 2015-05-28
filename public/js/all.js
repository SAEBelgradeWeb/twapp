$('button').on('click', function(){
    var id, text, type;
    var $li = $(this).closest('li');

    id = $li.attr('data-id');
    text = $li.find('.text').text();
    type = $(this).attr("data-type");

    $.ajax({
        method: 'POST',
        url: '/api/rate',
        data: {
            id: id,
            text: text,
            type: type
        },
        success: function(data){
            console.log(data);
        },
        error: function(e) {
            console.log(e);
        }
    });


});
$(document).ready(function(){

    $('.tweet-container').on('hover', function(){
        alert("usao");
    }, function(){
        alert('izasao');
    })

    $('.tweet-container').hover(function(){
        $(this).children('.za-tweet').animate({
            'width' : 80 + "%"
        }, 100);
        // $(this).
    }, function(){
        $('.za-tweet').animate({
            'width' : 100 + "%"
        }, 100);
    });

    $('nav li').click(function(){
        $('nav li').removeClass('active');
        $(this).addClass('active');

    });

    $('.ikonice img').on('click', function(){
        //$(this).animate({ svgFill: 'red' }, 4000);
        //$(this).animate({backgroundColor: '#E4D8B8'});
        $(this).fadeTo("slow", 1);
    })
    

});

//# sourceMappingURL=all.js.map