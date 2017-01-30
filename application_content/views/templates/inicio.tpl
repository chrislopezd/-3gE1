{include file="design/header.tpl"}
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <a href="beneficiados">
                            <div class="card-header text-center" data-background-color="rose" data-header-animation="true">
                                <br/>
                                <h1><i class="material-icons">supervisor_account</i> Beneficiados</h1>
                            </div>
                            </a>
                            <div class="card-content"></div>
                        </div>
                    </div>
                    {if $st_idPerfil eq 1}
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <a href="beneficiados">
                            <div class="card-header text-center" data-background-color="green" data-header-animation="true">
                                <br/>
                                <h1><i class="material-icons">account_circle</i> Usuarios</h1>
                            </div>
                            </a>
                            <div class="card-content"></div>
                        </div>
                    </div>
                    {/if}
                    {*<div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header" data-background-color="blue" data-header-animation="true">
                            </div>
                            <div class="card-content"></div>
                        </div>
                    </div>*}
                </div>
            </div>
        </div>
{include file="design/footer.tpl"}
