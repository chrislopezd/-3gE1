{literal}
<style type="text/css">
 .margin-top-50 {
    margin-top: 50px;
}
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
.table-widthB{
    width: 48%;
}
.table-widthA{
    width: 49.8%;
}
.bg{
    background-color: white;
}
.tablescroll {
    overflow-y: auto;
    overflow-x: hidden;
    height: 189px;
    margin-right: 1px;
}
.marginTop30{
    margin-top:30px;
}
.radio,
.checkbox {
  margin-top: 0px;
  margin-bottom: 0px;
}
.checkbox,.radio{
  margin-top:0px;
  margin-bottom:0px
}
.radio-margin{
    margin-left: -13px;
    margin-top: 7px;
}
.radio-margin{
    margin-left: -13px;
    margin-top: 7px;
}
/*
.EU_DataTable td, th {
  padding: 6px;
  border: 1px solid #ccc;
  text-align: left;
  height: 50px;
}
th {
  background: #e5e5e5;
  color: #454545;
  font-weight: bold;
  height: 40px;
}*/
/*Radio and Checkbox START*/
.checkbox label:after,
.radio label:after {
    content: '';
    display: table;
    clear: both;
}
.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}
.radio .cr {
    border-radius: 50%;
}
.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}
.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}
.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}
.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}
.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
.panel {
    margin-bottom: 20px !important;
    background-color: #fff !important;
    border: 1px solid transparent !important;
    border-radius: 4px !important;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05) !important;
    box-shadow: 23 1px 1px rgba(0,0,0,.05) !important;
}
.panel-success {
    border-color: #d6e9c6 !important;
}
.panel-heading {
    padding: 10px 15px !important;
    border-bottom: 1px solid transparent !important;
    border-top-left-radius: 3px !important;
    border-top-right-radius: 3px !important;
}
.panel-success>.panel-heading {
    color: #3c763d !important;
    /*background-color: #dff0d8 !important;*/
    border-color: #d6e9c6 !important;
}
.panel-body {
    padding: 15px !important;
}
.filterable .panel-heading .pull-right {
    margin-top: -32px !important;
}
</style>
{/literal}
{if $LISTADO|@count gt 0}
<div class="panel panel-success filterable">
    <div class="panel-heading">
        <h3 class="panel-title">&nbsp;</h3>
        <div class="pull-right">
            <button type="button" class="btn btn-round btn-success btn-xs btn-filter"><i class="material-icons">filter_list</i> Filtrar</button>
        </div>
    </div>
    <table class="col-md-12">
        <table>
            <tr class="filters">
            <th style="width:60px !important;">
                <div class="checkbox radio-margin">
                    <label style="margin-left:18px;">
                        <input type="checkbox" onclick="marcar(this);">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                </div>
            </th>
            <th style="width: 30%">
                <div class="form-group label-floating is-empty has-success">
                    <input type="text" class="form-control upper" placeholder="CURP" maxlength="18" disabled>
                </div>
            </th>
            <th style="width: 40%">
                <div class="form-group label-floating is-empty has-success">
                    <input type="text" class="form-control upper" placeholder="Nombre" disabled>
                </div>
            </th>
            <th style="width: 10%">
                <div class="form-group label-floating is-empty has-success">
                    <input type="text" class="form-control upper" placeholder="Grado" maxlength="1" disabled>
                </div>
            </th>
             <th style="width: 10%">
                <div class="form-group label-floating is-empty has-success">
                    <input type="text" class="form-control upper" placeholder="Grupo" maxlength="1" disabled>
                </div>
            </th>
            </tr>
        </table>
        <div class="bg tablescroll">
            <table class="table table-bordered table-striped">
                <tbody id="tbodyList">
                {foreach from=$LISTADO key=key item=v}
                <tr>
                    <td style="width:60px !important;">
                        <div class="checkbox radio-margin">
                            <label style="margin-left:10px;">
                                <input type="checkbox" class="mIcheck">
                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                            </label>
                        </div>
                    </th>
                    <td style="width: 30%">{$v['curp']}</th>
                    <td style="width: 40%">{$v['nombreCompleto']}</th>
                    <td style="width: 10%">{$v['grado']}</th>
                    <td style="width: 10%">{$v['grupo']}</th>
                </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </table>
</div>
{else}
<div class="alert alert-danger" data-background-color="rose">
    <h4 class="card-title"> No hay resultados para mostrar.</h4>
</div>
{/if}
{literal}
<script type="text/javascript">
    function marcar(source){
        checkboxes= $(".mIcheck");
        $(".mIcheck").each( function(i,v){
            if($(this).parent().parent().parent().parent().is(':visible')){
                checkboxes[i].checked=source.checked;
            }
        });
    }
    $(document).ready(function(){
        var _init = 0;
        $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        $tbody.find('tr').show();
        if ($filters.prop('disabled') == true || _init == 0){
            _init++;
            $filters.prop('disabled', false);
            $filters.first().focus();
        }else{
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });
    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No hay resultados</td></tr>'));
        }
    });
    });
</script>
{/literal}