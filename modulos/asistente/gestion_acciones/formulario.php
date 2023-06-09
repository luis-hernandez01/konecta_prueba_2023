<script type="text/javascript">
    var grid;
    var f;

    $(document).ready(function(e) {
        grid = $.addGrid("#grid",
                {
                    url: page_root + 'listar',
                    height: 320,
                    dataType: 'json',
                    selectionMode: "single",
                    rowHeaderWidth: 1,
                    idName: "_id",
                    idField: "id",
                    recordPage: 50,
                    cols: [
                        {display: 'NO.', name: '_NUM_', width: 40, align: 'left'},
                        {display: 'MENU', name: 'nombre', width: 130, align: 'left'},
                        {display: 'ACCION', name: 'accion', width: 180, align: 'left'},
                        {display: 'TIPO', name: 'tipo_accion', width: 80, align: 'left'},
                        {display: 'ARCHIVO', name: 'archivo', width: 200, align: 'left'},
                        {display: 'R. PERMISO', name: 'requiere_permiso', width: 100, align: 'left'},
                        {display: 'ACCIONES', name: 'btn', width: 130, align: 'left'}
                    ]}
        );
        f = new formulario(true, 650);
        f.agregar2 = f.agregar;
        f.agregar = function() {

            this.agregar2();
            $("#menu").val($("#bmenu").val());
            $("#menu").attr("disabled", true);
        };
        //$(".div-form-busqueda").toggle();
 
    });
</script>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                           
   
   <div class="accordion custom-accordion">
                           
                           <div class="accordion-row">
                              <a href="#" class="accordion-header crud-header">
                                <span> <i class="ti-filter" menu-icon=""></i> Filtros</span>
                                <i class="accordion-status-icon close fa fa-chevron-down"></i>
                                <i class="accordion-status-icon open fa fa-chevron-up"></i>
                              </a>
                              <div class="accordion-body">
                                  
  <form class="div-form-busqueda" id="form-busqueda" style="min-height: 200px">
        <div style="width:100%; margin:auto">

             <table style="width:100%">
                <tr > 
                    <td class="tdi">Menú</td>
                    <td class="tdc">:</td>
                    <td class="tdd">
                          <select id="bmenu" name="menu" title="Menu" class="select_auto" >
                          <?php llenar_combo("SELECT menu, nombre FROM admin_menu WHERE ruta IS NOT NULL ORDER BY menu", true); ?>
                          </select>      
                    </td>            
                </tr>
            </table> 
                <div class="accioness"> 
                <input type="button" value="Buscar"  onclick="f.buscar()" class="btn btn-block btn-primary" style="margin-left:10px;width:80px;float:right"/>
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
                             <input type="button" name="accion" value="Agregar" onclick="f.agregar()" class="btn btn-block btn-success accion-agregar"/>
                             </div>
                         </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

   





<!-- FORMULARIO -->




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
                    <input type="text" id="id" name="id" title="Id" maxlength="10" value=""  class="no-modificable"/>
                </td>            
            </tr> 
            <tr>
                <td class="tdi">Menu</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <select id="menu" name="menu" title="Menu" class="no-modificable">
                        <?php llenar_combo("SELECT menu, nombre FROM admin_menu ORDER BY nombre", true); ?>
                    </select>                
                </td>
            </tr>
            <tr> 
                <td class="tdi">Accion</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <input type="text" id="accion" name="accion" title="Accion" maxlength="60" value="" />
                </td>            
            </tr> 
            <tr>
                <td class="tdi">Tipo acción</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <select id="tipo_accion" name="tipo_accion" title="Tipo acción">
                        <?php llenar_combo("SELECT codigo, codigo FROM admin_tipo_accion ORDER BY codigo", true); ?>
                    </select>                
                </td>
            </tr>
            <tr> 
                <td class="tdi">Archivo</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <input type="text" id="archivo" name="archivo" title="Archivo" maxlength="100" value="" />
                </td>            
            </tr>
            <tr> 
                <td class="tdi">Requiere permiso</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <select id="requiere_permiso" name="requiere_permiso" title="Requiere permiso">
                        <option></option>
                        <option value="S">Si</option>
                        <option value="N">No</option>
                    </select>                        
                </td>            
            </tr>

              <tr> 
                <td class="tdi">Descripción</td>
                <td class="tdc">:</td>
                <td class="tdd">
                    <textarea name="descripcion" id="descripcion"></textarea>
                </td>            
            </tr>

        </table>

    </form>
     
        
                        </div>
                        <div class="modal-footer">
                           <div class="dlg-acciones">

                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-icon-text" style="margin-left:10px;float:right;">
                            <i class="icon-close"></i>  Cancelar
                            </button>

                             <button type="button" id="btn_aceptar" class="btn btn-success btn-icon-text accion-agregar" style="margin-left:10px;float:right;">
                             <i class="icon-plus"></i> Aceptar
                             </button>

                           </div>
                        </div>
                      </div>
                    </div>
                  </div>

