$().ready(function(){
	demo.checkFullPageBackgroundImage();
    setTimeout(function(){
        $('.card').removeClass('card-hidden');
    }, 700);
	$("#btnLogIn").click(function(){
		var user = $.trim($("#txtUsuario").val());
		var pass = $.trim($("#txtPass").val());
		var ii = 0;
		if(user == ""){
			$("#txtUsuario").parent().removeClass('has-success').addClass('has-error');
			$("#txtUsuario").focus();
			demo.showNotificacion('top','center','error','danger','El campo <strong>Usuario</strong> es obligatorio');
			ii++;
		}else{
			$("#txtUsuario").parent().removeClass('has-error').addClass('has-success');
		}
		if(pass == ""){
			$("#txtPass").parent().removeClass('has-success').addClass('has-error');
			if(ii == 0){
				demo.showNotificacion('top','center','error','danger','El campo <strong>Contraseña</strong> es obligatorio');
				$("#txtPass").focus();
			}
			ii++;
		}else{
			$("#txtPass").parent().removeClass('has-error').addClass('has-success');
		}
		if(ii > 0){
			return false;
		}
		if($("#captcha").length == 0){
			demo.showNotificacion('top','center','error','danger','Debe arrastrar la <strong>imagen</strong> al círculo');
			return false;
		}
		$("#loginform").submit();
	});
	$("#txtUsuario").keypress(function(event){
		if($("#txtUsuario").parent().hasClass('has-error') && $.trim($("#txtUsuario").val()).length > 0){
			$("#txtUsuario").parent().removeClass('has-error').addClass('has-success');
		}
	});
	$("#txtPass").keypress(function(event){
		if($("#txtPass").parent().hasClass('has-error') && $.trim($("#txtPass").val()).length > 0){
			$("#txtPass").parent().removeClass('has-error').addClass('has-success');
		}
	});
});