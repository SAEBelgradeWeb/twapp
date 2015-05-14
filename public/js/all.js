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
//# sourceMappingURL=all.js.map