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
<body class="sidebar-mini">
<div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="{$raiz}resources/theme/img/sidebar-3.jpg">
           {* <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->*}
            <div class="logo">
                <a href="javascript:void(0);" class="simple-text">
                  SEGEY
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="javascript:void(0);" class="simple-text">
                    SEGEY
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{$raiz}resources/theme/img/faces/logo.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            {$st_programa}
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="">
                                    <a href="javascript:void(0)" class="editPass">
                                        Cambiar contraseña
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="{if $active == 'inicio'}active{/if}">
                        <a href="inicio">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    {if $st_idPerfil eq 2}
                    <li class="{if $active == 'beneficiados'}active{/if}">
                        <a href="beneficiados">
                            <i class="material-icons">assignment</i>
                            <p>Beneficiados</p>
                        </a>
                    </li>
                    {/if}
                    {if $st_idPerfil eq 1}
                    <li class="{if $active == 'usuarios'}active{/if}">
                        <a href="usuarios">
                            <i class="material-icons">account_box</i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="{if $active == 'reportes'}active{/if}">
                        <a href="reportes">
                            <i class="material-icons">insert_chart</i>
                            <p>Reportes</p>
                        </a>
                    </li>
                    {/if}
                    {*
                    <li class="{if $active == 'usuarios' || $active == 'beneficiados' || $active == 'ciclos'}active{/if}">
                        <a data-toggle="collapse" href="#catalogos" aria-expanded="true">
                            <i class="material-icons">list</i>
                            <p>Catálogos
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="catalogos">
                            <ul class="nav">
                                <li class="{if $active == 'beneficiados'}active{/if}">
                                    <a href="beneficiados">
                                        <i class="material-icons">supervisor_account</i>
                                        Beneficiados
                                    </a>
                                </li>
                                <li class="{if $active == 'usuarios'}active{/if}">
                                    <a href="usuarios">
                                        <i class="material-icons">account_box</i>
                                        Usuarios
                                    </a>
                                </li>
                                <li class="{if $active == 'ciclos'}active{/if}">
                                    <a href="ciclos">
                                        <i class="material-icons">access_time</i>
                                        Ciclos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>*}
                    <li class="">
                        <a href="cerrarSession">
                            <i class="material-icons">exit_to_app</i>
                            <p>Salir</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="main-panel">{*Se cierra en el footer*}
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:void(0);">
                            <i class="material-icons">face</i> {$st_programa}
                            <p class="hidden-lg hidden-md"></p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">access_time</i> Último acceso: {$st_fechaUA}
                                <p class="hidden-lg hidden-md"></p>
                            </a>
                        </li>
                        <li>
                            <a href="inicio" class="dropdown-toggle" data-toggle="tooltip" title="Inicio">
                                <i class="material-icons">home</i>
                                <p class="hidden-lg hidden-md">Inicio</p>
                            </a>
                        </li>
                        <li>
                            <a href="cerrarSession" class="dropdown-toggle" data-toggle="tooltip" title="Salir" data-toggle="dropdown">
                                <i class="material-icons">exit_to_app</i>
                                <p class="hidden-lg hidden-md">Salir</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>