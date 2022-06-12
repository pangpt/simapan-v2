<div class="modal fade" id="modal-uraian">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-zzchild" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Detil</label>
                        <select class="form-control select2" style="width: 100%;" name="uraian_id">
                            <option value="">- Pilih Detil -</option>
                            @foreach($uraiansatker as $uraiansatkerid)
                                <option value="{{$uraiansatkerid->id}}">{{$uraiansatkerid->kode_uraian}} - {{$uraiansatkerid->nama_uraian}}</option>
                            @endforeach
                        </select>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Pagu</label>
                        <input type="text" class="form-control" name="pagu_total" placeholder="Jumlah Pagu">
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

