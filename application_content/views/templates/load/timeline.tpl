<div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
    {if $DATOS|count eq 0}
    <div class="alert alert-warning" role="alert">
        <strong><i class="fa fa-warning" aria-hidden="true"></i> </strong>  &nbsp;&nbsp;No hay resultados para mostrar.
    </div>
    {/if}
    {$back = ""}
    {foreach from=$DATOS item = arrayVal key = key}
        {if $key == 0}{$back = $arrayVal.tipo}{/if}

        {if $back == $arrayVal.tipo && $arrayVal.tipo == 'Planeación'}
            <div class="vertical-timeline-block">
            </div>
        {/if}
        {if $back == $arrayVal.tipo && $arrayVal.tipo == 'Trámite y Control'}
            <div class="vertical-timeline-block">
            </div>
        {/if}
        {$back = $arrayVal.tipo}
    <div class="vertical-timeline-block">
        {if $arrayVal.estatus == 'Iniciado'}
            <div class="vertical-timeline-icon lazur-bg">
                <i class="fa fa-file-text"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'Enviado'}
            <div class="vertical-timeline-icon blue-bg">
                <i class="fa fa-undo"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'Justifica'}
            <div class="vertical-timeline-icon navy-bg">
                <i class="fa fa-thumbs-up"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'Finalizado'}
            <div class="vertical-timeline-icon gray-bg">
                <i class="fa fa-check-square-o"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'Cancelado'}
            <div class="vertical-timeline-icon" style="background:#f44336">
                <i class="fa fa-ban" aria-hidden="true"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'No Justifica'}
            <div class="vertical-timeline-icon yellow-bg">
                <i class="fa fa-thumbs-down"></i>
            </div>
        {/if}
        {if $arrayVal.estatus == 'No Procede'}
            <div class="vertical-timeline-icon" style="background:#f44336">
                <i class="fa fa-times"></i>
            </div>
        {/if}
        <div class="vertical-timeline-content">
            <div><b>{$arrayVal.nombre}</b></div>
           <small>{$arrayVal.observaciones}
            </small>
            <span class="vertical-date">
                <div class="date" style="color:#676a6c">{$arrayVal.estatus}</div>
                {$arrayVal.fecha} <br>
                <small>{$arrayVal.hora}</small>
            </span>
        </div>
    </div>
    {/foreach}
</div>