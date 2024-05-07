<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModal">Importar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control" id="file" name="file" placeholder="Introduce el archivo" accept=".csv" onchange="previewFile()">
                                <button class="btn btn-dark" id="importar" type="button">Importar</button>
                                <button class="btn btn-danger" id="clear" type="button">Limpiar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" id="impt" name="impt" style="display: none;">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Código de Barras</th>
                                    <th>Nombre del Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Imagen</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="previewTableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>