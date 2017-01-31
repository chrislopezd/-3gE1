 <option disabled selected>Elija la localidad</option>
{foreach from=$LOCALIDADES key=k item=res}
<option value="{$res['LOCALIDAD']}">{$res['NOMBRELOC']}</option>
{/foreach}