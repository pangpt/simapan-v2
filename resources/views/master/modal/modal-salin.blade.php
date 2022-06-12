<div class="modal fade" id="modal-salin">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Simpan Perencanaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menyimpan perencanaan dengan tanggal: <br><strong>{{@$tgl_simpan->tanggal_revisi}}</strong>?</p>
        </div>
        <div class="modal-footer">
            <form id="form-modal-salin" action="#" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>