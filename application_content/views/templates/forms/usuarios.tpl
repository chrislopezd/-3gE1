{include file="design/header.tpl"}
<style type="text/css">
    .moving-tab{
        width: 100%;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form action="" method="">
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#info" data-toggle="tab">{$bread}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="info">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de perfil</label>
                                                 <select name="perfil" id="perfil" class="form-control" data-style="select-with-transition" data-size="10">
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
                                                <label class="control-label">Tipo de beneficiado</label>
                                                 <select name="perfil" id="perfil" class="form-control" data-style="select-with-transition" data-size="10">
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
                                                <label class="control-label">Breve descripción del programa
                                                    <small style="color:red">*</small>
                                                </label>
                                                <textarea class="form-control" name="observaciones" id="observaciones"  rows="2"></textarea>
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
                                                <input name="usuario" id="usuario" maxlength="20" autocomplete="off" type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena" id="contrasena"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Repetir contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena" id="contrasena"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                           <div class="text-center">
                                <button type='button' class='btn btn-finish btn-fill btn-rose btn-wd btn-lg' name='finish'><i class="material-icons">save</i> Guardar</button>
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
<script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
