<div class="wrapper">
    <table style="width:100%" border="0">
        <tr>
            <td style="width:50%;font-size:7pt;" align="left"><i>
               {if $ESTATUS eq 3 || $ESTATUS eq 6 || $ESTATUS eq 7}
               <div style="float:right;font-size:8pt;"><i>Justificado por la Dirección de Planeación</i>&nbsp;&nbsp;&nbsp;<i>Fecha de validación: {$FJUST}</i></div>
               {/if}
            </td>
            <td style="width:40%;font-size:7pt;" align="left"><i>
                {if $iniCaptura neq ''}<span>{$iniCaptura}</span>{/if}{if $iniValida neq ''} / <span>{$iniValida}</span>{/if}</i>
            </td>
            <td style="width:10%;text-align:right;" align="right">
                <div style="float:right;font-size:8pt;"><i>Página {$PAGENO} de {$nb}</i></div>
            </td>
        </tr>
    </table>
</div>