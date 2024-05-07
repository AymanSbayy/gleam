<div class="modal fade" id="comprarExist" tabindex="-1" aria-labelledby="comprarExist" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comprarExist">Comprar Producto Existente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="codigo_barras2" name="codigo_barras2" placeholder="Introduce el código de barras del producto">
                                <button class="btn btn-dark" id="buscar_prod" type="button">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mostrar el producto encontrado -->
                <div class="row mt-2" id="info" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" id="here">
                                
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="unidades2">Unidades</label>
                            <input type="number" class="form-control" id="unidades2" placeholder="Unidades">
                        </div>
                    </div>
                    <!--Mostrar el total de la compra -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total</h5>
                                <p name="subtotal2" id="subtotal2" class="card-text">Precio sin IVA ni descuento: </p>
                                <p name="total2" id="total2" class="card-text">Total de la Compra: </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2 text-end">
                        <button name="comprarexist" id="comprarexist" class="btn btn-dark mt-2">Comprar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>