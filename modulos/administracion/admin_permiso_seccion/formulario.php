<script type="text/javascript">
    var grid;
    var f;

    $(document).ready(function(e) {
        grid = $.addGrid("#grid",
                {
                    url: page_root + 'listar',
                    height: 400,
                    dataType: 'json',
                    selectionMode: "single",
                    rowHeaderWidth: 1,
                    idName: "_id",
                    idField: "id",
                    recordPage: 50,
                    cols: [
                        {display: 'NO.', name: '_NUM_', width: 40, align: 'left'},
                        {display: 'FUNCIONARIO', name: 'funcionario', width: 400, align: 'left'},
                        {display: 'ACCIONES', name: 'btn', width: 130, align: 'left'}
                    ]}
        );
        f = new formulario(true,650);
    });
</script>

<!-- FORMULARIO -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                
                   <div style="width: 90%;margin:auto">       
                      
                        <div class="accordion custom-accordion">
                           
                           <div class="accordion-row">
                              <a href="#" class="accordion-header crud-header">
                                <span> <i class="ti-filter" menu-icon=""></i> Filtros</span>
                                <i class="accordion-status-icon close fa fa-chevron-down"></i>
                                <i class="accordion-status-icon open fa fa-chevron-up"></i>
                              </a>
                              <div class="accordion-body">
                                  
                                  <form class="div-form-busqueda" id="form-busqueda">
                                     <div style="width:100%; margin:auto">
                                        <table style="width:100%">
                                            
            <tr>
                <td class="tdi">Funcionario</td>
                <td class="tdc">:</td>
                <td class="tdd">
                	<select id="bid_persona" name="id_persona" title="Funcionario">
                    	<?php llenar_combo("SELECT id, user FROM general.persona ORDER BY user",true); ?>
                    </select>                
                </td>
            </tr>
                                        </table>

                                       <div class="acciones"> 
                                       
                                       <button type="button" value="Buscar"  onclick="f.buscar()" class="btn btn-primary btn-icon-text" style="margin-left:10px;float:right;">
                                       <i class="ti-search"></i>  Buscar
                                       </button>
                                       
                                       </div>

                                     </div>
                                  </form>
                              </div>
                           </div>

                        </div>
                        
                        <div id="grid" class="grid"></div>  
                
                
                         <div class="btn-toolbar acciones" role="toolbar" aria-label="Toolbar with button groups" 
                            style="width: 10%; margin-left: 90%;margin-top: 10px; margin-bottom: 10px;">
                             <div class="btn-group" role="group" aria-label="Third group">
                             <button type="button" class="btn btn-block btn-success accion-agregar" name="accion" onclick="f.agregar()"  value="Agregar"> <i class="ti-plus"></i> Agregar</button>
                             </div>
                         </div>

                   </div>



                </div>
            </div>
        </div>
    </div>

</div>



<!-- FIN FORMULARIO -->

<!-- MODAL -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
     
          <form id="formulario">
            <table style="width:100%">
               
            <tr style="display:none"> 
                <td class="tdi">Id</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <input type="text" id="id" name="id" title="Id" placeholder="Id" maxlength="10" value=""  class="no-modificable"/>
                </td>            
            </tr> 
            <tr>
                <td class="tdi">Funcionario</td>
                <td class="tdc">:</td>
                <td class="tdd">
                	<select class="select_auto" id="id_persona" name="id_persona" title="Funcionario">
                    	<?php llenar_combo("SELECT p.id, CONCAT_WS('',p.nombre1,' ',p.nombre2,' ',p.apellido1,' ',
                    p.apellido2, ' [',p.identifica,']') as persona_nombre FROM general.persona as p ORDER BY persona_nombre",true); ?>
                    </select>                
                </td>
            </tr> 
            <tr>
                <td class="tdi">Sección</td>
                <td class="tdc">:</td>
                <td class="tdd">
                	<select id="id_seccion" name="id_seccion" title="Sección">
                    	<?php llenar_combo("SELECT id, nombre FROM seccion ORDER BY nombre",true); ?>
                    </select>                
                </td>
            </tr> 
            <tr> 
                <td class="tdi">Subsección</td>
                <td class="tdc">:</td>
                <td class="tdd">
                	<select id="id_subseccion" class="select_auto"  multiple name="id_subseccion" title="Subsección">
                    	
                    </select>                
                </td>
            </tr>
            <tr> 
                <td class="tdi">Fecha inicio</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <input type="date" id="fecha_inicio" name="fecha_inicio" title="Fecha inicio" placeholder="Fecha inicio" maxlength="10" value="" />
                </td>            
            </tr>
            <tr> 
                <td class="tdi">Fecha final</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <input type="date" id="fecha_final" name="fecha_final" title="Fecha final" placeholder="Fecha final" maxlength="10" value="" />
                </td>            
            </tr> 
            <tr>
                <td class="tdi">Visible</td>
                <td class="tdc">:</td>
                <td class="tdd">
                	<select id="visible" name="visible" title="Visible">
                    	<?php llenar_combo("SELECT id, nombre FROM visible ORDER BY nombre",true); ?>
                    </select>                
                </td>
            </tr>
            </table>
          </form>

      </div>

      <div class="modal-footer">
          <div class="dlg-acciones">

             <button type="button" data-dismiss="modal" class="btn btn-danger btn-icon-text" style="margin-left:10px;float:right;">
             <i class="icon-close"></i>  Cancelar</button>             
             <button type="button" id="btn_aceptar" class="btn btn-success btn-icon-text" 
             style="margin-left:10px;float:right;"><i class="icon-plus"></i> Aceptar</button>

          </div>
      </div>


    </div>
  </div>
</div>
<!-- FIN MODAL -->




<script>

    

        $("#id_seccion").change(function () {
        
            cargarCombo(page_root + "listar_seccion", "formulario", "id_subseccion", true);

        });

        
   
    
</script>

