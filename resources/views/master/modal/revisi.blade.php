<div class="modal fade" id="modal-rev">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-rev" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <input type="hidden" id="parent" name="parent_id" value="">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kegiatan</label>
                        <select class="form-control select2" style="width:100%" name="jenis_revisi">
                                  <option value="">- Pilih Jenis Kegiatan -</option>
                                  <option value="RPD Triwulan">RPD Triwulan</option>
                                  <option value="POK">POK</option>
                                  <option value="Antar Satker">Antar Satker</option>
                                  <option value="Es 1">Es 1</option>
                              </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Revisi</label>
                        <div class="input-group">
                                <input type="date" id="tglrev" class="form-control" value="" name="tanggal_revisi" required/>
                            </div>
                    </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Pagu</label>
                        <input type="text" id="paguu" class="form-control" placeholder="" name="pagu_total">
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

  <div class="modal fade" id="modalRincian">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Sub Kategori</th>
                  <th>Nama Sub kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  {{-- @if(count($data)) --}}
                  @foreach($rincian as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$key->kode_rincian}}</td>
                  <td>{{@$key->nama_rincian}}</td>
                  <td>
                      <a class="btn btn-primary btn-sm" href="{{route('rincian.modal', ['id' => $key->id])}}">
                          <i class="fas fa-plus">
                          </i>
                        </a>
                  </td>
                </tr>
                @endforeach
                {{-- @else --}}

                {{-- @endif --}}
                </tbody>
              </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
