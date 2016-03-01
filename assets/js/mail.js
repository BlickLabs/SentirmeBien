$(document).ready(function() {
    $("#ok").hide();

    $("#formid").validate({
        rules: {
            name: { required: true, minlength: 2},
            email: { required:true, email: true},
            msg: { required:true, minlength: 2}
        },
        messages: {
            name: "Debe introducir su nombre.",
            email : "Debe introducir un email válido.",
            msg : "El campo Mensaje es obligatorio.",
        },
        errorHandler: function (element) {
            $(element).parent().addClass('error');
        },
        submitHandler: function(form){
            var dataString = 'name='+$('#name').val()+'&email='+$('#email').val()+'&msg='+$('#msg').val();
            $.ajax({
                type: "POST",
                url:"model/contacto_mail.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#send-sb").hide();
                    document.getElementById('formid').reset();
                 
                }
            });
        }
    });
});