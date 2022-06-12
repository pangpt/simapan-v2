<div class="modal fade" id="modal-subcat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Default Modal</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modal-gchild" action="#" method="POST">
            @csrf
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>RO</label>
                        <select class="form-control select2" style="width: 100%;" name="subcat_id">
                            <option value="">- Pilih RO -</option>
                            @foreach($subcat as $subcatid)
                                <option value="{{$subcatid->id}}">{{$subcatid->kode_subcat}} - {{$subcatid->nama_subcat}}</option>
                            @endforeach
                        </select>
                        {{-- <label>Sub Kategori</label>
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="col-sm-4">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSubcat"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div> --}}

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

  <div class="modal fade" id="modalSubcat">
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
                  @foreach($subcat as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$key->kode_subcat}}</td>
                  <td>{{@$key->nama_subcat}}</td>
                  <td>
                      <a class="btn btn-primary btn-sm" href="{{route('subcat.modal', ['id' => $key->id])}}">
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
