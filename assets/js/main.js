var filesForm = {
    'nameUser': 'Nombre ',
    'email': 'email',
    'Message': 'Teléfono',
};

$(function () {
    var $erros = $('.content-p'),
        $file = $('#file'),
        fileName;
    /* Form */
    $('#form').on("submit", function (e) {
        e.preventDefault();

        //$('.loading').addClass('show');
        var fields = $(this).serializeArray();
        $.post($(this).attr('action'), fields, responseForm, 'json');

    });

    function responseForm(r) {
       // $('.loading').removeClass('show');

        if (!r.success) {
            var res = r.errors.split("**"),
                html = '';
            $("input").css({'border-color': '#e0e0e0'});
            $("textarea").css({'border-color': '#e0e0e0'});



            $('.content-error').addClass('show');

            for (var i = 0; i < res.length - 1; i++) {
                var str = res[i].trim();
                html += " " + str + " ";
                /*$("input[name='" + str + "']").css({'border-color': '#D60C41'}, {'background-color': 'red'});
                html += "<li> El valor del campo " + filesForm[str] + " no es valido</li>";*/
            }
            alert("Tienes errores en los campos" + html);
        }
        else {
            $('main').append(" <span class='thanks'>Gracias por inscribirte, en cuanto verifiquemos los datos te confirmaremos vía correo electrónico tu participación en Red Bull.</span>");
            $('#form').slideUp("slow");
        }
    }





});