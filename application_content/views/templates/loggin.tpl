<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" value="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>{$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" media="all" type="image/x-icon" href="{$raiz}resources/favicon/favicon.ico" />
    <link rel="apple-touch-icon" href="{$raiz}resources/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{$raiz}resources/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{$raiz}resources/favicon/apple-touch-icon-114x114.png" />
    <link href="{$raiz}resources/theme/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{$raiz}resources/theme/css/material-dashboard.css" rel="stylesheet" />
    <link href="{$raiz}resources/theme/css/estilo.css" rel="stylesheet" />
    <link href="{$raiz}resources/plugs/captcha.css" rel="stylesheet" />
    <link href="{$raiz}resources/theme/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{$raiz}resources/theme/css/css.css?family=Roboto:300,400,500,700|Material+Icons" />
</head>
<body>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="green" data-image="{$raiz}resources/theme/img/bg-profile.png">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form name="loginform" id="loginform" method="post" action="iniciarSession" class="form-horizontal animated fadeInUp" role="form">
                                <input type="hidden" name="csrf_segey_tok_name" id="token" value="{$token}" />
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <img src="{$raiz}resources/theme/img/logo.png" style="max-width:250px;">
                                    </div>
                                   <div id="login-alert" class="alert alert-danger animated flash col-sm-12 {if $rem eq 0}hide{/if}">{$msg}</div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating has-success">
                                                <label class="control-label">Usuario</label>
                                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control upper" autofocus autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating has-success">
                                                <label class="control-label">Contraseña</label>
                                                <input type="password" name="txtPass" id="txtPass" class="form-control"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="input-group text-center" style="margin-left:20px;">
                                            <div class="ajax-fc-container"></div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" id="btnLogIn" class="btn btn-success btn-round">
                                        <span class="btn-label"><i class="material-icons">check</i></span> Ingresar al sistema</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright text-center">
                        &copy;
                        2017
                        <a href="http://www.educacion.yucatan.gob.mx/" target="_blank">Secretaría de Educación del Gobierno del Estado de Yucatán</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>{literal}
<script type="text/javascript">var _raiz = {/literal}'{$raiz}'{literal};</script>{/literal}
{*<!--   Core JS Files   -->*}
<script src="{$raiz}resources/theme/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="{$raiz}resources/theme/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{$raiz}resources/theme/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$raiz}resources/theme/js/material.min.js" type="text/javascript"></script>
<script src="{$raiz}resources/theme/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
{*<!-- Forms Validations Plugin -->*}
<script src="{$raiz}resources/theme/js/jquery.validate.min.js"></script>
{*<!--  Plugin for Date Time Picker and Full Calendar Plugin-->*}
<script src="{$raiz}resources/theme/js/moment.min.js"></script>
{*<!--  Charts Plugin -->*}
<script src="{$raiz}resources/theme/js/chartist.min.js"></script>
{*<!--  Plugin for the Wizard -->*}
<script src="{$raiz}resources/theme/js/jquery.bootstrap-wizard.js"></script>
{*<!--  Notifications Plugin    -->*}
<script src="{$raiz}resources/theme/js/bootstrap-notify.js"></script>
{*<!--   Sharrre Library    -->*}
<script src="{$raiz}resources/theme/js/jquery.sharrre.js"></script>
{*<!-- DateTimePicker Plugin -->*}
<script src="{$raiz}resources/theme/js/bootstrap-datetimepicker.js"></script>
{*<!-- Vector Map plugin -->*}
<script src="{$raiz}resources/theme/js/jquery-jvectormap.js"></script>
{*<!-- Sliders Plugin -->*}
<script src="{$raiz}resources/theme/js/nouislider.min.js"></script>
{*<!-- Select Plugin -->*}
<script src="{$raiz}resources/theme/js/jquery.select-bootstrap.js"></script>
{*<!--  DataTables.net Plugin    -->*}
<script src="{$raiz}resources/theme/js/jquery.datatables.js"></script>
{*<!-- Sweet Alert 2 plugin -->
<script src="{$raiz}resources/theme/js/sweetalert2.js"></script>
{*<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->*}
<script src="{$raiz}resources/theme/js/jasny-bootstrap.min.js"></script>
{*<!-- TagsInput Plugin -->*}
<script src="{$raiz}resources/theme/js/jquery.tagsinput.js"></script>
{*<!-- Material Dashboard javascript methods -->*}
<script src="{$raiz}resources/theme/js/material-dashboard.js"></script>
{*<!-- Material Dashboard DEMO methods, don't include it in your project! -->*}
<script src="{$raiz}resources/theme/js/js.js"></script>
<script src="{$raiz}resources/plugs/pace/pace.min.js"></script>
<script type="text/javascript" src="{$raiz}resources/plugs/jquery.touch.js"></script>
<script type="text/javascript" src="{$raiz}resources/plugs/jquery.captcha.js"></script>{literal}
<script type="text/javascript">$().ready(function(){$("#captcha").show();$(".ajax-fc-container").captcha();});</script>{/literal}
<script src="{$raiz}resources/js/web/loggin.js"></script>
</body>
</html>