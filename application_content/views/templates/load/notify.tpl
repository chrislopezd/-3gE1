{if !empty($LISTADO)}
	{foreach from=$LISTADO item=res}
    <li>
    	<a href="javascript:void(0);" onclick="editarNotificacion({$res['idSol']},{$res['idEstatus']},{$res['id_hist']})">
			<div style="height:20px;">
            	<span>
            		<i class="fa fa-user" aria-hidden="true"></i>
            		<b>{$res['nombre']}</b>
            	</span>
            </div>
            <div style="height:20px;">
                <small>
                	<i class="fa fa-file-text-o" aria-hidden="true"></i> {$res['folio']}
                    [  <span class="text-muted" style="font-style:italic;">{$res['estatus']}</span>  ]
                </small>
            </div>
            <div style="height:20px;">
            	<small class="text-muted" style="color:#1ab394 !important;">
            		<i class="fa fa-clock-o" aria-hidden="true"></i>Fecha: {$res['fecha']} {$res['hora']}
            	</small>
            </div>
             <div style="height:20px;">
            	 <small>
                	{*<i class="fa fa-tasks" aria-hidden="true"></i>
                	<span class="label label-info">{$res['estatus']}</span>*}
                </small>
            </div>
            <div style="clear:both"></div>
    	</a>
	</li>
	<li class="divider"></li>
	{/foreach}
{/if}
