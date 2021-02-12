<!-- Modal -->
<div class="modal fade" id="logOutModal" tabindex="-1" aria-labelledby="logOutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Cerrar sesión?</h5>
                <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>

            <div class="modal-body">
                ¿Seguro que deseas salir de la aplicación? Clic en 'SI' para confirmar, o clic en 'NO' para cancelar y continuar
            </div>

            <div class="modal-footer">
                <!-- Log-out form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">SI</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>