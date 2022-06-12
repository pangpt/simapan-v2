<div class="modal fade" id="modal-detil">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-zchild" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Komponen</label>
                        <select class="form-control select2" style="width: 100%;" name="detil_id">
                            <option value="">- Pilih Komponen -</option>
                            @foreach($detilsatker as $detilsatkerid)
                                <option value="{{$detilsatkerid->id}}">{{$detilsatkerid->kode_detil}} - {{$detilsatkerid->nama_detil}}</option>
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

