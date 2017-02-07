{include file="design/header.tpl"}
<input type="hidden" name="{$token['token_name']}" id="token" value="{$token['token']}">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">home</i>
                    </div>
                    <div class="card-content">
                         <hr/>
                        <h2 class="card-title">Bienvenido al sistema <strong>{$st_programa}</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {if $st_idPerfil eq 2}
            <div class="col-md-6">
                <div class="card card-chart">
                    <a href="beneficiarios">
                    <div class="card-header text-center" data-background-color="rose" data-header-animation="true">
                        <br/>
                        <h1><i class="material-icons">supervisor_account</i> Beneficiarios</h1>
                    </div>
                    </a>
                    <div class="card-content"></div>
                </div>
            </div>
            {/if}
            {if $st_idPerfil eq 1}
            <div class="col-md-6">
                <div class="card card-chart">
                    <a href="usuarios">
                    <div class="card-header text-center" data-background-color="rose" data-header-animation="true">
                        <br/>
                        <h1><i class="material-icons">account_circle</i> Usuarios</h1>
                    </div>
                    </a>
                    <div class="card-content"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-chart">
                    <a href="reportes">
                    <div class="card-header text-center" data-background-color="green" data-header-animation="true">
                        <br/>
                        <h1><i class="material-icons">insert_chart</i> Reportes</h1>
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