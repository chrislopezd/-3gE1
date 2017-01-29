{include file="design/header.tpl"}
<style type="text/css">
hr {
  height: 4px;
  margin-left: 15px;
  margin-bottom:-3px;
}
.hr-danger{
  background-image: -webkit-linear-gradient(left, rgba(233,30,99,.8), rgba(233,30,99,.6), rgba(0,0,0,0));
}
.breadcrumb {
  background: rgba(245, 245, 245, 0);
  border: 0px solid rgba(245, 245, 245, 1);
  border-radius: 25px;
  display: block;
  padding: 0px;
  margin-bottom: 0px;
}
</style>
<div class="content">
    <div class="row">
            <hr class="hr-danger" />
            <ol class="breadcrumb bread-success">
                <li><a href="usuarios" class="btn btn-simple btn-danger"><i class="material-icons">account_box</i> Listado de usuarios</a></li>
                <li><a href="nuevoUsuario" class="btn btn-simple btn-success"><i class="material-icons">add</i> Nuevo usuario</a></li>
                {if  $edit eq 1}
                <li class="active">{$bread}</li>
                {/if}
            </ol>
        </div>
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form name="formUser" id="formUser" method="post">
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#info" data-toggle="tab">{$bread}</a>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="csrf_segey_tok_name" id="token" value="{$token}" />
                        <input type="hidden" name="id" id="id" value="{$idUsuario}" />
                        <div class="tab-content">
                            <div class="tab-pane" id="info">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de perfil
                                                    <small style="color:red">*</small>
                                                </label>
                                                 <select name="perfil" id="perfil" class="selectpicker" data-style="select-with-transition btn" data-size="10">
                                                 <option disabled {if $ifPerfil eq 0}selected{/if}>Elija el perfil</option>
                                                  {foreach from=$PERFILES key=k item=res}
                                                      <option value="{$res['idPerfilUsuario']}" {if $res['idPerfilUsuario'] eq $idPerfil}selected{/if}>{$res['nombrePerfilUsuario']}</option>
                                                    {/foreach}
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de beneficiado
                                                    <small style="color:red">*</small>
                                                </label>
                                                 <select name="tipo" id="tipo" class="selectpicker" data-style="select-with-transition" data-size="10">
                                                 <option disabled {if $idTipo eq 0}selected{/if}>Elija el tipo</option>
                                                  {foreach from=$BENEFICIADOS key=k item=res}
                                                      <option value="{$res['idTipo']}" {if $res['idTipo'] eq $idTipo}selected{/if}>{$res['tipo']}</option>
                                                    {/foreach}
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                             <div class="form-group label-floating">
                                                <label class="control-label">Breve descripción del programa</label>
                                                <textarea class="form-control" name="observaciones" id="observaciones" rows="2">{$observaciones}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                             <div class="form-group label-floating">
                                                <label class="control-label">Usuario
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input name="usuario" id="usuario" maxlength="20" autocomplete="off" type="text" value="{$usuario}" class="form-control upper"  maxlength="30" />
                                                <input name="userV" id="userV" maxlength="20" autocomplete="off" type="hidden" value="{$usuario}" class="form-control upper"  maxlength="30" />
                                            </div>
                                        </div>
                                    </div>


                                    {if $edit eq 1}
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cambiar contraseña</label>
                                                <div class="checkbox checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" name="iCheck" id="iCheck">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/if}
                                    <div class="col-sm-{if $edit eq 1}3{else}4{/if} pass {if $edit eq 1}hide{/if}">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena" id="contrasena" maxlength="25"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-{if $edit eq 1}3{else}4{/if} pass {if $edit eq 1}hide{/if}">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Repetir contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena2" id="contrasena2"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                           <div class="text-center">
                                <button type='button' class='btn btn-finish btn-fill btn-rose btn-wd btn-lg' name='btnGuardar' id="btnGuardar"><i class="material-icons">save</i> Guardar</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{include file="design/footer.tpl"}
{literal}
<script type="text/javascript">
var _existe = 0;
var _edit = {/literal}'{$edit}'{literal};
var _url = {/literal}'{$url}'{literal};
var _raiz = {/literal}'{$raiz}'{literal};
</script>{/literal}
{literal}

<script type="text/javascript">
function verUsuario(tipo){
    var _user = $.trim($("#usuario").val());
    var _user2 = $.trim($("#userV").val());
    var _go = 0;
    if(_edit > 0){
        if(_user == _user2){
            _go = 1;
        }
    }
    if(_go == 0){
        $.post('ajax/valiUsuario',{csrf_segey_tok_name: $("#token").val(),user:_user}, function (r){
            if(parseInt(r) > 0){
                swal({
                      title: 'Error',
                      text: 'El <strong>Usuario</strong> ya existe',
                      type: 'error',
                      confirmButtonText: 'Aceptar',
                      confirmButtonClass: "btn btn-danger",
                      buttonsStyling: false
                    }).then(function() {
                        $("#usuario").focus().select();
                    });
                _existe = 1;
            }
            else{
                _existe = 0;
            }
        });
    }
}
function validarPass(form){
    var p = $("#info").find('input[type="password"]');
    var p1 = p.first();
    var p2 = p.last();
    return (p1.val() != p2.val()) ? false : true;
}
$().ready(function(){
    demo.initMaterialWizard();
    if(_edit == 1){
        $("#iCheck").click( function(){
            if($(this).prop('checked')){
                $(".pass").removeClass("hide");
            }else{
                $(".pass").addClass("hide");
            }
        });
    }
    $("#usuario").blur( function(){
        if($.trim($(this).val()).length > 2){
            verUsuario(0);
        }
    });
    if(_edit == 0){
        setTimeout( function(){
            $('*[data-id="perfil"]').click();
        },100);
    }

    $("#btnGuardar").click( function(){
        if($.trim($("#usuario").val()).length > 5){
            verUsuario(1);
            if(_existe > 0){
                return false;
            }
        }
        var _data = new FormData();
        var _pp = ($("#contrasena").length > 0) ? $.trim($("#contrasena").val()) : '';
        _data.append('csrf_segey_tok_name', $("#token").val());
        _data.append('id', $("#id").val());
        _data.append('perfil', $("#perfil").val());
        _data.append('tipo', $("#tipo").val());
        _data.append('observaciones', $.trim($("#observaciones").val()));
        _data.append('usuario', $.trim($("#usuario").val()));
        _data.append('pass', _pp);
        var _si = ($("#iCheck").prop('checked') && $("#iCheck").length > 0) ? 1 : 0;
        _data.append('is',_si);
        if($.trim($("#perfil").val()).length == 0){
            demo.showNotificacion('top','center','error','danger','El campo <strong>Perfil</strong> es obligatorio');
            return false;
        }
        if($.trim($("#tipo").val()).length == 0){
          demo.showNotificacion('top','center','error','danger','El campo <strong>Tipo</strong> es obligatorio');
          return false;
        }
        if($.trim($("#usuario").val()).length == 0){
          demo.showNotificacion('top','center','error','danger','El campo <strong>Usuario</strong> es obligatorio');
          return false;
        }
        if($.trim($("#usuario").val()).length < 3){
             demo.showNotificacion('top','center','error','danger','El campo <strong>Usuario</strong> debe contener al menos 3 caracteres');
            return false;
        }
        if(_edit == 0 || ($("#iCheck").prop('checked') && $("#iCheck").length > 0)){
            if($.trim($("#contrasena").val()).length == 0){
              demo.showNotificacion('top','center','error','danger','El campo <strong>Contraseña</strong> es obligatorio');
              return false;
            }
            if($.trim($("#contrasena").val()).length < 3){
                 demo.showNotificacion('top','center','error','danger','El campo <strong>Contraseña</strong> debe contener al menos 3 caracteres');
                return false;
            }
            if(!validarPass()){
                swal({
                      title: 'Error',
                      text: 'Las <strong>Contraseñas</strong> no coinciden, verifique la información',
                      type: 'error',
                      confirmButtonText: 'Aceptar',
                      confirmButtonClass: "btn btn-danger",
                      buttonsStyling: false
                    }).then(function() {
                        $("#contrasena").focus();
                    });
                return false;
            }
        }
        $("#btnGuardar").prop('disabled',true);
        $("#btnGuardar").addClass("disabled");
            $.ajax({
            url: 'ajax/'+_url,type: 'POST',data: _data,cache: false,contentType: false,processData: false,
                beforeSend: function(){
                  $.blockUI({ message: '<div class="alert alert-success"><h5> Guardando, por favor espere un momento...</h5></div><div><img src="resources/images/loadAjax.gif" /><br/><br/></div>',});
                },
                success: function(data){
                  if(parseInt(data) > 0){
                        $.unblockUI();
                        swal({
                            title: "Mensaje",
                            text: "Información guardada correctamente",
                            buttonsStyling: false,
                            confirmButtonText: 'Aceptar',
                            confirmButtonClass: "btn btn-success",
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            type: "success"
                        }).then(function () {
                              var token = $('#token').val();
                              var div = $("<div><form name='_form' id='_formulario' method='post' action='editaUsuario'><input type='hidden' name='id' id='id' value='"+data+"' /><input type='hidden' name='csrf_segey_tok_name' value='"+token+"' /></form></div>");
                              $('body').append(div);
                              $('body').find("#_formulario").submit();
                        });
                  }else{
                    $.unblockUI();
                    $("#btnGuardar").prop('disabled',false);
                    $("#btnGuardar").removeClass('disabled');
                    swal(
                      'Errror',
                      'Intente más tarde.',
                      'error'
                    );
                  }
                },
                error: function(d){
                  $.unblockUI();
                   $("#btnGuardar").prop('disabled',false);
                   $("#btnGuardar").removeClass('disabled');
                   swal(
                      'Errror',
                      'Intente más tarde.',
                      'error'
                    );
                }
                });
            });
    });
</script>{/literal}
<style type="text/css">
    .moving-tab{
        width: 100% !important;
    }
</style>
