<!-- add-->
<div class="modal fade" id="addkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action={{url('/keluar/add/')}} method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Uraian Pengeluaran</label>
                
                        <input type="text" class="form-control" placeholder="Uraian Pengeluaran" name="uraian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">jumlah Pengeluaran</label>
                
                        <input type="text" class="form-control" placeholder="jumlah Pengeluaran" name="jumlah" autocomplete="off" onkeyup="formatbaru(event)">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal Pengeluaran</label>
                
                        <input type="date" class="form-control" placeholder="Tanggal Pengeluaran" name="tanggal" autocomplete="off">
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
    @foreach ($r->keluars as $k)
        <div class="modal fade" id="editkeluar{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('/keluar/edit/'. $k->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Uraian Pengeluaran</label>
                        
                                <input type="text" class="form-control" placeholder="Uraian Pengeluaran" name="uraian" autocomplete="off" value="{{$k->uraian}}">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">jumlah Pengeluaran</label>
                        
                                <input type="text" class="form-control" placeholder="jumlah Pengeluaran" name="jumlah" autocomplete="off" value="{{$k->jumlah}}" onkeyup="formatbaru(event)">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Tanggal Pengeluaran</label>
                        
                                <input type="date" class="form-control" placeholder="Tanggal Pengeluaran" name="tanggal" autocomplete="off" value="{{$k->tanggal}}">
                            </div>
                            <input type="hidden" class="form-control" name="keluar_id" autocomplete="off" value="{{$k->id}}">

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