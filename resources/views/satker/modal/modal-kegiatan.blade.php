<div class="modal fade" id="modal-sub_kegiatan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-child" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>KRO</label>
                        <select class="form-control select2" style="width: 100%;" name="sub_kegiatan_id">
                            <option value="">- Pilih KRO -</option>
                            @foreach($subkegiatansatker as $sub_kegiatanid)
                                <option value="{{$sub_kegiatanid->id}}">{{$sub_kegiatanid->kode_subkegiatan}} - {{$sub_kegiatanid->nama_subkegiatan}}</option>
                            @endforeach
                        </select>

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

