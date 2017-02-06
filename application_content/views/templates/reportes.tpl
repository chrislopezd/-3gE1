{include file="design/header.tpl"}
<input type="hidden" name="{$token['token_name']}" id="token" value="{$token['token']}">
<input type="hidden" name="trigger" id="trigger" class="form-control" autocomplete="off" value="0" maxlength="1" />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title"><i class="material-icons">insert_chart</i> Reportes</h4>
                    </div>
                    <div class="card-content">
                        <hr/>
                        <form id="getForm">
                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group label-floating is-empty has-success">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" autocomplete="off" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group label-floating is-empty has-success">
                                    <label class="control-label">Clave del CCT</label>
                                    <input type="text" name="cct" id="cct" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Programas</label>
                                    <select name="programa" id="programa" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el programa</option>
                                      {foreach from=$PROGRAMAS key=k item=res}
                                        <option value="{$res['idUsuario']}">{$res['programa']}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Tipo</label>
                                    <select name="tipo" id="tipo" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el tipo</option>
                                      {foreach from=$TIPOS key=k item=res}
                                        <option value="{$res['idTipo']}">{$res['tipo']}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Municipio</label>
                                    <select name="municipio" id="municipio" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el municipio</option>
                                      {foreach from=$MUNICIPIOS key=k item=res}
                                        <option value="{$res['MUNICIPIO']}">{$res['NOM']}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Localidad</label>
                                     <select name="localidad" id="localidad" class="selectpicker" data-style="select-with-transition" data-size="10">
                                     <option disabled selected>Elija la localidad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Buscar</label>
                                    <button type="button" id="btnFilter" class="btn btn-white btn-round btn-just-icon" >
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Limpiar</label>
                                    <button type="button" id="btnClean" class="btn btn-white btn-round btn-just-icon" >
                                        <i class="material-icons">refresh</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 pull-right">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <button type="button" id="btnExport" class="btn btn-simple btn-success">
                                        <i class="material-icons">insert_drive_file</i> Exportar excel
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <hr/>
                        <table id="tablaListado"></table>
                        <div id="paginacion"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.disabled {
    display: none;
}
.ui-jqgrid{
    font-size:10px !important;
}
</style>
{include file="design/footer.tpl"}
<link href="{$raiz}resources/js/jquery-ui.min.css" rel="stylesheet" />
<script src="{$raiz}resources/js/jquery-ui.min.js"></script>
<script src="{$raiz}resources/plugs/grid.locale-es.js"></script>
<script src="{$raiz}resources/plugs/jquery.jqGrid.min.js"></script>
<link href="{$raiz}resources/plugs/ui.jqgrid.css" rel="stylesheet" />{literal}
<script type="text/javascript">
(function($) {
$.fn.extend({
    onEnter: function(fn) {
        if($.isFunction(fn)){
            this.each(function() {
                $(this).keypress(function(e){
                    if(e.which == 13){
                        e.preventDefault();
                        return fn.call(this,e);
                    }
                });
                $(this).bind('onEnter',fn)
            });
        }
        else{
            $(this).trigger('onEnter');
        }
        return this;
    }
});
})(jQuery);
$().ready( function(){
    $('*[data-id="municipio"]').click();
    $('*[data-id="municipio"]').click();
    $("#btnExport").click(function(event){
        $("#btnExport").addClass('disabled ui-state-disabled').html('<i class="material-icons">print</i> Generando...');
        var token = $.trim($("#token").val());
        var nombre = $.trim($("#nombre").val());
        var cct = $.trim($("#cct").val());
        var programa = $.trim($("#programa").val());
        var tipo = $.trim($("#tipo").val());
        var municipio = $.trim($("#municipio").val());
        var localidad = $('#localidad').val();
        var trigger = $.trim($("#trigger").val());
        var folBaj = $.trim($("#folioBajaB").val());
        var div = $("<div><form name='formExcel' id='formExcel' method='post' action='descargarReporteExcel'><input type='hidden' name='csrf_segey_tok_name' value='"+token+"' /><input type='hidden' name='nombre' value='"+nombre+"' /><input type='hidden' name='cct' value='"+cct+"' /><input type='hidden' name='programa' value='"+programa+"' /><input type='hidden' name='tipo' value='"+tipo+"' /><input type='hidden' name='municipio' value='"+municipio+"' /><input type='hidden' name='localidad' value='"+localidad+"' /><input type='hidden' name='trigger' value='"+trigger+"' /></form></div>");
        $('body').append(div);
        $('body').find("#formExcel").submit();
        $('body').find("#formExcel").remove();
        setTimeout( function(){
            $("#btnExport").removeClass('disabled ui-state-disabled').html('<i class="material-icons">print</i> Exportar a excel');
        },2000);
    });
    $("#municipio").change( function(){
      if($(this).val() != ""){
        $.ajax({
          url : "ajax/buscarLocalidades",
          data : {
            'municipio' : $('#municipio').val(),
            'csrf_segey_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";}
          },
          dataType : "json", type: "POST",
          beforeSend: function(){
          },
          success: function(data){
            if(data.error){
              $("#localidad").html('<option>Intente más tarde.</option>');
            }
            else{
              $("#localidad").html(data.HTML);
            }
            $("#localidad").selectpicker('refresh');
          },
          error: function (){
            $('#localidad').html('<option>Intente más tarde.</option>');
            $("#localidad").selectpicker('refresh');
          }
        });
      }else{
        $("#localidad").html('<option disabled selected>Elija la localidad</option>');
        $("#localidad").selectpicker('refresh');
      }
    });
    $("#tablaListado").jqGrid({
    url:'ajax/listadoReporte',
    postData: {
            csrf_segey_tok_name : function(){ return ($('#token').val() != "") ? $('#token').val() : "0";},
            nombre : function(){ return ($('#nombre').val() != "") ? $('#nombre').val() : "";},
            cct : function(){ return ($('#cct').val() != "") ? $('#cct').val() : "";},
            programa : function(){ return ($('#programa').val() != "") ? $('#programa').val() : "";},
            tipo : function(){ return ($('#tipo').val() != "") ? $('#tipo').val() : "";},
            municipio : function(){ return ($('#municipio').val() != "") ? $('#municipio').val() : "";},
            localidad : function(){ return ($('#localidad').val() != "") ? $('#localidad').val() : "";},
            trigger : function(){ return ($('#trigger').val() != "") ? $('#trigger').val() : "0";},
    },
    datatype: 'json',mtype: 'POST',height:'auto',
    colNames:['id','TipoBene','Programa','Tipo','Curp','Nombre','Correo','Teléfono','Dirección','CodPos','Municipio', 'Localidad'],
    colModel:[
        {name:'idSol',index:'idSol',align:'center', hidden:true, title:false,width:0,resizable:false,sortable: false},
        {name:'tipoBene',index:'tipoBene',hidden:true,width:0,resizable:false,sortable: false},
        {name:'programa',index:'programa',width:120,resizable:false},
        {name:'tipo',index:'tipo',width:80,resizable:false},
        {name:'curp',index:'curp',width:140,resizable:false},
        {name:'nombre',index:'nombre',width:200,resizable:false},
        {name:'correo',index:'correo',width:170,resizable:false},
        {name:'telefono',index:'telefono',align:'center',width:95,resizable:false},
        {name:'direccion',index:'direccion',align:'center',width:120,resizable:false},
        {name:'codpos',index:'codpos',width:50,align:'center',resizable:false},
        {name:'muninicipio',index:'muninicipio',width:100,align:'center',title:false,resizable:false},
        {name:'localidad',index:'localidad',width:100,resizable:false,sortable: true},
     ],
     gridComplete: function() {
        $("#paginacion").attr('style','height:38px');
        $("#paginacion").find('DIV.ui-pg-div').html('<i class="material-icons">refresh</i></a>');
        var gridx = jQuery("#tablaListado");var ids = gridx.jqGrid('getDataIDs');
        for (var i = 0; i < ids.length; i++){
            var rowId = ids[i];
            var ret = $("#tablaListado").getRowData(rowId);
            //gridx.jqGrid('setRowData', rowId, {});
        }
    },
    shrinkToFit: false,loadtext: 'Cargando...',pager: '#paginacion',rowNum:15,rowList:[15,25,50,100,150,200,250,500],viewrecords: true,width: '100%',caption: 'Listado',multiselect: false,subGrid : false,
    }).navGrid('#paginacion', { view: false, del: false, add: false, edit: false, refresh:true,search:false });
    $("#btnFilter").click( function(){$("#trigger").val(1);$('#tablaListado').trigger('reloadGrid');});
    $("#nombre").onEnter(function(){$("#trigger").val(1);$('#tablaListado').trigger('reloadGrid');});
    $("#cct").onEnter(function(){$("#trigger").val(1);$('#tablaListado').trigger('reloadGrid');});
    $("#btnClean").click( function(){
        $("#getForm")[0].reset();
        $("#localidad").html('<option disabled selected>Elija la localidad</option>');
        $("#localidad").selectpicker('refresh');
        $("#municipio").selectpicker('refresh');
        $("#tipo").selectpicker('refresh');
        $("#programa").selectpicker('refresh');
    });
    $("#nombre").focus();
});
</script>{/literal}