<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-key" action="#" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kegiatan</label>
                            <select class="form-control select2" style="width: 100%;" name="kegiatan_id">
                                <option value="">- Pilih Kegiatan -</option>
                                @foreach($kegiatansatker as $kegiatansatkerid)
                                    <option value="{{$kegiatansatkerid->id}}">{{$kegiatansatkerid->kode_kegiatan}} - {{$kegiatansatkerid->nama_kegiatan}}</option>
                                @endforeach
                            </select>
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
