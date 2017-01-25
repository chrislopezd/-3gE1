{include file="design/header.tpl"}
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
                            <a href="inicio" class="dropdown-toggle" data-toggle="tooltip" title="Inicio" data-toggle="dropdown">
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">language</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Bienvenido al sistema.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{include file="design/footer.tpl"}
