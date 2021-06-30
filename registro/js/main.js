hello.init(
{
	facebook: '497024374838759',
	google: '765741832465-gcsp9otgc0a2g4gn49pa4u1fdbsr5mal.apps.googleusercontent.com'
}, {redirect_uri: 'https://thewhiskers.club/perfil'});

hello.on('auth.login', function(auth)
{
	// Call user information, for the given network
	hello(auth.network).api('me').then(function(r)
    {
	});
});

$(document).on("click", '#logout', function ()
{
    hello('google').logout().then(function()
    {
        window.location.href="/";
    }, function(e)
    {
        console.log('Signed out error: ' + e.error.message);
    });
});

$(document).on("click", '#google', function ()
{
    initOAuth('google');
});

$(document).on("click", '#facebook', function ()
{
    initOAuth('facebook');
});

function initOAuth(network, force = false)
{
    // Make a login call and handle the response using promises
	var hi = hello(network);
	hi.login({display: 'popup', popup: {resizable: 0}, scope: 'email', force: force}).then(function()
    {
		console.log('fullfilled', 'making api call');
		// Reurn another promise to get the users profile.
		return 	hi.api( 'me' );
	}).then(function(p)
    {
		// Print it to console.
		console.log('hello.api(me) was fullfilled', p);
		return p;
	}).then(function(p)
    {
        // p.first_name
        // p.last_name
        // p.email
        // p.name
        // p.thumbnail
        // p.id
        $.ajax({ type: 'POST',
            url: 'userdata.php',
            data: {
                method: 'oauth',
                network: network,
                firstname: p.first_name,
                lastname: p.last_name,
                email: p.email,
                thumbnail: p.thumbnail
            },
            success: function (result)
            {
                $("#email-in-use").html(result);
            }
        });
    }).then(null, function(e)
    {
		// Uh oh
		console.error(e);
	});
}

// Registro check if non of the inputs are empty
    
function checkform()
{
    var error = true;
    document.getElementById('registry-button').disabled = true;
    $('input').each(function(index)
    {
        if (index == 0 || index == 1)
        {   // checks if input fields are not empty
            if ($(this).val() == null || $(this).val() == "")
            {
                error = false;
            }
        }
        if($("#phone").attr("hidden"))
        {
            error = $("#email").val() != null && $("#email").val() != "";
        }
        else
        {
            error = $("#phone").val() != null && $("#phone").val() != "";   
        }
    });
    document.getElementById('registry-button').disabled = !error;
    return error;
}

$('input[type=text], input[type=password], input[type=email], input[type=date], input[type=tel]').each(function (index)
{
    $(this).focus(function()
    {
        $(this).removeClass("is-invalid");
    });

    $(this).keyup(function()
    {
        $('#verification-form input[type=text]').each(function (index)
        {
            let str = $(this).val();
            $(this).val(str.toUpperCase());
        });
        checkform();
    });
});

$('#use-phone').on("click",function()
{
    $("#use-email").attr("hidden",false);
    $("#email-label").attr("hidden",true);
    $("#email").attr("hidden",true);
    $("#use-phone").attr("hidden",true);
    $("#phone-label").attr("hidden",false);
    $("#phone").attr("hidden", false);
    $("#email").val("");
    checkform();
});

$('#use-email').on("click",function()
{
    $("#phone-label").attr("hidden",true);
    $("#phone").attr("hidden",true);
    $("#email-label").attr("hidden",false);
    $("#email").attr("hidden",false);
    $("#use-email").attr("hidden",true);
    $("#use-phone").attr("hidden", false);
    $("#phone").val("");
    checkform();
});

$(document).on("click", "#next-button", function ()
{ 
    if (!validateForm2())
    {
        let userdata =
        {
            password:   $("#password").val(),
            birthdate:  $("#birthdate").val(),
            gender:     $("#gender-male").is(":checked") ? "Hombre" : "Mujer"
        }
        $.ajax({
            type: "POST",
            url: "userdata.php",
            data: userdata,
            success: function (result)
            {
                $('#script').html(result);
                // $("#script").fadeIn("slow");
                // $('#script').delay(3000).fadeOut("slow");
            }
        });
    }
});

$(document).on("click", "#registry-button", function ()
{     
    if (ValidationContactForm())
    {
        $.ajax(
        {
            type: "POST",
            url: "userdata.php",
            data: $("#registry-form").serialize(),
            success: function (result)
            {
                $("#email-in-use").html(result);
                $("#email-in-use").fadeIn("slow");
                $('#email-in-use').delay(3000).fadeOut("slow");
            }
        });
    }
});

$('#resend-code').on("click", function () {
    $.ajax({
        type: "POST",
        url: "userdata.php",
        data: { code: "C0D1G0" },
        success: function (result)
        {
            $('#script').html(result);
            // $("#script").fadeIn("slow");
            // $('#script').delay(3000).fadeOut("slow");
        }
    }); 
});

$(document).on("click", "#verify-button", function ()
{
    var otpcode = getOtpCode();
    if (otpcode.length == 6)
    {
        $.ajax({
            type: "POST",
            url: "userdata.php",
            data: { otpcode: otpcode },
            success: function (result)
            {
                $('#script').html(result);
                // $("#script").fadeIn("slow");
                // $('#script').delay(3000).fadeOut("slow");
            }
        });
    }
});

function validatePassword(password)
{
    let Regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return (Regex.test(password) === true);
}

function validateForm2()
{
    let error = false;
    if (!validatePassword($("#password").val()))
    {
        $("#password").addClass("is-invalid");
        error = true;
    }
    if (!$("#birthdate").val() != "")
    {
        $("#birthdate").addClass("is-invalid");
        error = true;
    }
    if (!error && !$("#privacy-policy").is(":checked"))
    {
        alert("Debes aceptar el aviso de privacidad.");
        error = true;
    }

    return error;
}

function getOtpCode()
{
    if ($("#input-box-1").val() != null &&
        $("#input-box-1").val() != "" &&
        $("#input-box-2").val() != null &&
        $("#input-box-2").val() != "" &&
        $("#input-box-3").val() != null &&
        $("#input-box-3").val() != "" &&
        $("#input-box-4").val() != null &&
        $("#input-box-4").val() != "" &&
        $("#input-box-5").val() != null &&
        $("#input-box-5").val() != "" &&
        $("#input-box-6").val() != null &&
        $("#input-box-6").val() != "")
        return "" +
        $("#input-box-1").val() + "" +
        $("#input-box-2").val() + "" +
        $("#input-box-3").val() + "" +
        $("#input-box-4").val() + "" +
        $("#input-box-5").val() + "" +
        $("#input-box-6").val() + "";;
    return "";
}

function ValidationContactForm()
{
        var error = true;
        $("#registry-form input").each(function (index)
        {
            if (index == 0 || index == 1 )
            {
                if ($(this).val() == null || $(this).val() == "") {
                    $("#registry-form").find("input:eq(" + index + ")").addClass("is-invalid");
                    error = false;
                } else {
                    $("#registry-form").find("input:eq(" + index + ")").removeClass("is-invalid");
                }
            }
            else if (index == 2 && $("#phone").attr("hidden"))
            {
                if (!(/(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()))) {
                    $("#registry-form").find("input:eq(" + index + ")").addClass("is-invalid");
                    error = false;
                } else {
                    $("#registry-form").find("input:eq(" + index + ")").removeClass("is-invalid");
                }
            }
            else if (index == 3 && $("#email").attr("hidden"))
            {
                var pattern = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
                let test = pattern.test($(this).val());

                if ((parseInt($(this).val().length) != 10) || (!test || isNaN($(this).val())))
                {
                    $("#registry-form").find("input:eq(" + index + ")").addClass("is-invalid");
                    error = false;
                }
                else
                {
                    $("#registry-form").find("input:eq(" + index + ")").removeClass("is-invalid");
                }
            }

        });
        return error;
    }