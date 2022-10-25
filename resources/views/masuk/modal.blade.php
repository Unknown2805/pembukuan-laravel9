<!-- add-->
    <div class="modal fade" id="addmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('/masuk/add/')}} method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
    
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Uraian Pemasukan</label>
                    
                            <input type="text" class="form-control" placeholder="Uraian Pemasukan" name="uraian" autocomplete="off" value="">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">jumlah Pemasukan</label>
                    
                            <input type="text" class="form-control" placeholder="jumlah Pemasukan" name="jumlah" autocomplete="off" value="" onkeyup="formatbaru(event)">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Tanggal Pemasukan</label>
                            <input type="date" class="form-control" placeholder="Tanggal Pemasukan" name="tanggal" autocomplete="off" value="">                    
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
          </div>
        </div>
    </div>
{{-- edit --}}
@foreach ($rekap as $r)
    @foreach ($r->masuks as $m)
        <div class="modal fade" id="editmasuk{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('/masuk/edit/'. $m->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Uraian Pemasukan</label>
                        
                                <input type="text" class="form-control" placeholder="Uraian Pemasukan" name="uraian" autocomplete="off" value="{{$m->uraian}}">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">jumlah Pemasukan</label>
                        
                                <input type="text" class="form-control" placeholder="jumlah Pemasukan" name="jumlah" autocomplete="off" value="{{$m->jumlah}}" onkeyup="formatbaru(event)">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Tanggal Pemasukan</label>
                        
                                <input type="date" class="form-control" placeholder="Tanggal Pemasukan" name="tanggal" autocomplete="off" value="{{$m->tanggal}}">
                            </div>
                            <input type="hidden" class="form-control" name="rekap_id" autocomplete="off" value="{{$r->id}}">

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
            </div>
        </div>
    @endforeach
@endforeach