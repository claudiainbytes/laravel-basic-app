$.formUtils.addValidator({
    name : 'cedula',
    validatorFunction : function(value, $el, config, language, $form) {
        var patt = new RegExp("^[0-9]+$");
        if( value.length > 7 && value.length < 13 && patt.test(value) ){
            return true;
        } else {
            return false;
        }
    },
    errorMessage : 'La cédula debe ser númerica y debe contener de 8 a 12 dígitos',
    errorMessageKey: 'badCedulaNumber'
});
$.formUtils.addValidator({
    name : 'telefono',
    validatorFunction : function(value, $el, config, language, $form) {
        var patt = new RegExp("^[0-9]+$");
        if( value.length > 9 && value.length < 13 && patt.test(value) ){
            return true;
        } else {
            return false;
        }
    },
    errorMessage : 'El teléfono debe ser númerico y debe contener de 10 a 12 dígitos',
    errorMessageKey: 'badCedulaNumber'
});
$.formUtils.addValidator({
    name : 'customemail',
    validatorFunction : function(value, $el, config, language, $form) {
        var patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if( value.length > 5 && value.length < 100 && patt.test(value) ){
            return true;
        } else {
            return false;
        }
    },
    errorMessage : 'El e-mail no tiene un formato válido',
    errorMessageKey: 'badCustomEmail'
});
// Initiate form validation
var errores = new Array();
$.validate(
    {
      form : '#registration-form',
      modules : 'date, security',
      lang: 'es',
      onError : function($form) {
        //alert('Validation of form '+$form.attr('id')+' failed!');
      },
      onSuccess : function($form) {
        //alert('The form '+$form.attr('id')+' is valid!');
        //return false; // Will stop the submission of the form
      },
      onValidate : function($form) {
        return errores;
      },
      onElementValidate : function(valid, $el, $form, errorMess) {
        //cedula
        if($el.attr('name') == "cedula"){
            var cedula = $('#cedula').val() || 0;
            var oldcedula = $("#oldcedula").val() || 0;
            $.get("/usuarios/cedula/" + cedula + "/existe", function(data){
                $("#validacedula").val(data);
                errores[0] = {};
                if( (cedula !== oldcedula) && data == "1" ) {
                    errores[0] = {
                         element : $('#cedula'),
                         message : 'Hay un registro existente con esa cédula'
                    };
                }
            });
        }
        //email
        if($el.attr('name') == "email"){
            var email = $('#email').val() || 0;
            var oldemail = $("#oldemail").val() || 0;
            $.get("/usuarios/email/" + email + "/existe", function(data){
                $("#validaemail").val(data);
                errores[1] = {};
                if( (email !== oldemail) && data == "1" ) {
                    errores[1] = {
                         element : $('#email'),
                         message : 'Hay un registro existente con ese email'
                    };
                }
            });
        }
        //
      }
    }
);
//ModalBox
$('.confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});