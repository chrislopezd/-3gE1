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
                        <img src="{$raiz}resources/theme/img/faces/logo.png"  />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            {$st_programa}
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">Perfil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="inicio">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="cerrarSession">
                            <i class="material-icons">exit_to_app</i>
                            <p>Salir</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>