$(document).ready(function() {
    $('.load').fadeOut('slow', function(){
        $('#simulator').text('Calcular');
    });

    checkOriginSelected();
});

$('#simulator').on('click', function(){
    $(this).prop('disabled', true);
    $(this).text('Calculando...');
    $(this).prepend(`<span id="load-button" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> `);
    $('form').submit();
});

function checkOriginSelected()
{
    let origin = $('#origin').val();
 
    if (origin === null) {
        $("#destination option[value='']").text('Selecione uma origem');
        $("#destination option").hide();
    }
}

$(document).on('change', '#origin', function(){
    let origin = $(this).val();
    
    if (origin != '011') {
        $("#destination option[value!='011']").hide();
        $("#destination option[value='011']").show();
    }else{
        $("#destination option[value='011']").hide();
        $("#destination option[value!='011']").show();
    }

    $("#destination option[value='']").text('Selecione...');
});
