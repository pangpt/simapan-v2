<div class="modal fade" id="modal-rincian">
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
                        <label>Rincian</label>
                        <select class="form-control select2" style="width: 100%;" name="rincian_id">
                            <option value="">- Pilih Rincian -</option>
                            @foreach($rincian as $rincianid)
                                <option value="{{$rincianid->nama_rincian}}">{{$rincianid->nama_rincian}}</option>
                            @endforeach
                        </select>
                        {{-- <label>Rincian</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="col-sm-4">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRincian"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div> --}}

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
