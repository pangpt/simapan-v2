<div class="modal fade" id="modal-renc">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h6 class="modal-title">Rekam POK</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-renc" action="#" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- text input -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="uraian" id="uraian" value="" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah Pagu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pagu_total" id="pagu" placeholder="" disabled>
                                </div>
                            </div>
                            @foreach($month as $mo)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pagu {{$mo->name}}</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="pagu_{{$mo->slug}}" id="{{$mo->slug}}" value="">
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="total_pagu" disabled>
                                </div>
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
