<!-- Este sera un modal donde tendrémos un mensaje de error en caso de que el usuario no se haya logueado y quiera realizar una acción que requiera estar logueado -->
<!-- Tendremos también la opción dirigiendo al usuario a la página de login -->
<div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="loginErrorModalLabel">¡Debes iniciar sesión para continuar!</h5>
                <p>Para poder realizar esta acción, debes iniciar sesión.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" style="background-color:#21164e;" class="btn btn-secondary" data-dismiss="modal" onclick="$('#loginModal').modal('show')">Iniciar sesión</button>
            </div>
        </div>
    </div>
</div>
