<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de proveedores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_proveedores">
                        Nuevo proveedor
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">proveedor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">contacto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">telefono</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">direccion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_proveedores">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_proveedores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_proveedores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">proveedores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomPro">proveedor</label>
                        <input type="text" onfocusout="proveedor_repetido();" required class="form-control" id="nomPro" name="nomPro" placeholder="nomPro">
                        <div class="alert alert-danger d-none" role="alert" id="proveedorRepetido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contacto">contacto</label>
                        <input type="text" required class="form-control" id="contacto" name="contacto" placeholder="contacto">
                    </div>
                    <div class="form-group">
                        <label for="telefono">telefono</label>
                        <input type="text" required class="form-control" id="telefono" name="telefono" placeholder="telefono">
                    </div>
                    <div class="form-group">
                        <label for="direccion">direccion</label>
                        <input type="text" required class="form-control" id="direccion" name="direccion" placeholder="direccion">
                    </div>
                    </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="proveedor.controller.js"></script>
<script src="proveedor.model.js"></script>