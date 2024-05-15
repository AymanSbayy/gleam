<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Comprar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="agregarProductoForm">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="codigo_barras" class="form-label">Código de Barras</label>
                            <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" required maxlength="13" style="text-transform: uppercase;">
                        </div>
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="precio" class="form-label">Precio del Producto</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="col">
                            <label for="unidades" class="form-label">Unidades</label>
                            <input type="number" class="form-control" id="unidades" name="unidades" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="descuento" class="form-label">Descuento para el producto (%)</label>
                            <input type="number" class="form-control" id="descuento" name="descuento" min="0" max="100" value="0">
                        </div>
                        <div class="col">
                            <label for="aumento_iva" class="form-label">Aumento de IVA (%)</label>
                            <input type="text" class="form-control" id="aumento_iva" name="aumento_iva" min="0" value="21" disabled>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción del Producto</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option disabled selected>Selecciona una categoría</option>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <option value="<?php echo $categoria['idCategoria'] ?>"><?php echo $categoria['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="subcategoria" class="form-label">Subcategoría</label>
                            <select class="form-select" id="subcategoria" name="subcategoria" required>
                                <option disabled selected>Selecciona una subcategoría</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Ingrese el enlace de la imagen" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label" disabled>Total a Pagar</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                    </div>
                    <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <p id="error_message" class="mt-2 text-danger"></p>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button id="añadirP" type="button" class="btn btn-dark">Comprar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>