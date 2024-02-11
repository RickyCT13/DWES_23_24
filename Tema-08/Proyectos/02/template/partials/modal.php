<form action="<?= URL ?>cuenta/importCSV" method="POST" enctype="multipart/form-data">
<!-- Modal Subir Archivos -->
<div id="import" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subir Archivos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <!-- Campo oculo validación tamaño archivo 4194304 -->
            <input type="file" name="archivo_csv" id="archivo_csv">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="subirArchivo">Subir</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Fin Modal Subir Archivos -->


