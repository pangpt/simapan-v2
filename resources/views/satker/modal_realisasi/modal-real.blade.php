<div class="modal fade" id="modal-real">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-real" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Kuitansi</label>
                        <input type="date" id="tanggal" class="form-control"  value=""  name="tanggal_kuitansi" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah</label>
                        <input type="text" id="jumlah" class="form-control" name="jumlah" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerima</label>
                        <input type="text" id="penerima" class="form-control" name="penerima" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <textarea row="3" id="keterangan" class="form-control" name="keterangan" placeholder=""></textarea>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for=""> </label>

                      </div>
                    </div>
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

