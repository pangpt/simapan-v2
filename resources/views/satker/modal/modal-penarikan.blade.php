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
                        <div class="col-sm-12 calc">
                        <!-- text input -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="uraian" id="uraian" value="" disabled>
                                </div>
                            </div>
                            <input type="hidden" id="pagutot" name="id" value="">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah Pagu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pagu_total" id="pagu" placeholder="" disabled>
                                </div>
                            </div>
                            @foreach($month as $mo)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{$mo->name}}</label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control mont" name="pagu_{{$mo->slug}}" id="{{$mo->slug}}" value="">
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sisa </label>
                                <div class="col-sm-4">
                                <input type="text" id="sisa" class="form-control" name="sisa_pagu" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


