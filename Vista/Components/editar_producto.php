<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">

    <!-- Todos los campos estaran deshabilitados por defecto hasta que hagan click en el lapiz de editar al costado de cada campo, ponle a todos los campos un identificador unico -->
    <!-- Los campos que podremos ver son Codigo de Barras, Nombre, Precio, Descripcion, Categoria, Subcategoria, Imagen - Y se podran editar todos menos el Codigo de Barras -->

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarProductoForm">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="codigo_barras">Codigo de Barras</label>
                                <input type="text" class="form-control" id="edit_codigo_barras" name="edit_codigo_barras" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_nombre" name="edit_nombre" disabled>
                                    <button type="button" class="btn btn-info" id="edit_nombre_btn" onclick="habilitarCampo('edit_nombre')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_precio" name="edit_precio" disabled>
                                    <button type="button" class="btn btn-info" id="edit_precio_btn" onclick="habilitarCampo('edit_precio')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_descripcion" name="edit_descripcion" disabled>
                                    <button type="button" class="btn btn-info" id="edit_descripcion_btn" onclick="habilitarCampo('edit_descripcion')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <div class="input-group">
                                    <select class="form-select" id="edit_categoria" name="edit_categoria" disabled>
                                        <option value="1">Hogar y Jardinaria</option>
                                    </select>
                                    <button type="button" class="btn btn-info" id="edit_categoria_btn" onclick="habilitarCampo('edit_categoria')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <div class="input-group">
                                    <select class="form-select" id="edit_subcategoria" name="edit_subcategoria" disabled>
                                    </select>
                                    <button type="button" class="btn btn-info" id="edit_subcategoria_btn" onclick="habilitarCampo('edit_subcategoria')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <div class="input-group">
                                    <img src="" id="edit_imagen" name="edit_imagen" alt="Imagen del Producto" style="width: 100px; height: 100px;">
                                    <input type="file" class="form-control" id="editar_imagen" name="editar_imagen" disabled>
                                    <button type="button" class="btn btn-info" id="edit_imagen_btn" onclick="habilitarCampo('editar_imagen')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <button type="button" class="btn btn-dark" id="editarProducto">Editar Producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function habilitarCampo(id) {
        document.getElementById(id).disabled = false;
    }
</script>
