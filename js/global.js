$('input#name-submit').on('click', function() {
    var name = $('select#country').val();
    if (name != 'none'){
        $.post('ajax/name.php', {name: name}, function(data){
            $('body input#population').val(data);
        }); 
    }
    
});

