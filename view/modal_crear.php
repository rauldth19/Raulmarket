<!--MODAL QUE MUESTRA LA INSERCCIÓN DE UN NUEVO PRODUCTO-->
<div class="modal fade" tabindex="20" role="dialog" id="ventana-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-white bg-dark border border-secondary rounded">
            <div class="row rounded">
                <div class="imagen-crear col-6">
                    <img src="view/template/img/modal-agregar.png" alt="agregar producto" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-lg-6">
                    <div class="modal-header">
                        <h5 class="modal-title">CREAR PRODUCTO</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <!-- FORMULARIO -->
                            <form enctype="multipart/form-data">
                                <label class="col-form-label" for="Nombre">
                                    <span>Nombre Articulo</span>
                                    <input type="text" class="form-control " id="nombreArticulo">
                                </label>


                                <label class="col-form-label" for="Seccion">
                                    <span>Seccion</span>
                                    <select class="form-select w-100" id="seccion" name="seccion">
                                        <option value="1">Alimentacion</option>
                                        <option value="2">Moda</option>
                                        <option value="3">Ferreteria</option>
                                        <option value="4">Vehículos</option>
                                    </select>
                                    </lavel>




                                    <label class="col-form-label" for="precio">
                                        <span>Precio</span>
                                        <input type="number" class="form-control" id="precio">
                                    </label>
                                    <label class="col-form-label" for="descripcion">
                                        <span>Descripcion </span>
                                        <textarea class="form-control" id="descripcion" rows="3"></textarea>
                                    </label>
                                    <div class="mt-3 mb-3" id="respuesta"></div>
                                    <button type="button" id="enviar" class="btn btn-outline-success me-3">Añadir</button>
                                    <button type="button" class="btn btn-outline-danger" onclick="actualizarDatos()">Cerrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="view/template/js/app.js"></script>