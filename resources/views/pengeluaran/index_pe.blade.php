@extends('template_1.template')


@section('content')
@if(session('add'))
    <div class="alert alert-rose success-block">
        {{session('add')}}
    </div>
@elseif(session('update'))
    <div class="alert alert-primary success-block">
        {{session('update')}}
    </div>
@elseif(session('delete'))
    <div class="alert alert-danger success-block">
        {{session('delete')}}
    </div>
@endif

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title"><b>List Data Pengeluaran</b></h4>
                        <button type="button" class="btn btn-rose btn-round btn-sm" data-toggle="modal" data-original-title=""  data-target="#addPe" title="add data"><i class="fa fa-plus"></i>Add Data</button>
                      </div>
                <div class="card-body">
                    <div class="material-datatables">
                      <table class="table table-striped color table" id="table_id">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Item Nama</th>
                        <th>Item Tanggal</th>
                        <th>Item Nominal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                      <?php $counter = 1 ?>
                      @foreach($pe as $data)
                        <tr>
                          <td>{{$counter++}}</td>
                          <td>{{ $data->item_nama}}</td>
                          <td>{{ $data->item_tanggal }}</td>
                          <td>{{ $data->item_nominal }}</td>
                          <td>{{ $data->status }}</td>
                          <td>
                              <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round" onclick="edit_pe('{{$data->id_pengeluaran}}')"  title="edit data"><i class="material-icons">edit</i></button>

                              <a onClick="return confirm('Apakah Ingin Menghapus Data ?');" a href="{{route('delete_pe',$data->id_pengeluaran)}}"><button type="button" class="btn btn-danger btn-fab btn-fab-mini btn-round"><i class="material-icons">delete</i></button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- Photo Modal ADD-->
<div class="modal fade" id="addPe" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-left">
            <div class="modal-header">
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Add Data</h4>
                  </div>
                  <div class="card-body ">
                    <form action="{{ route('save_pe') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field()}}
                      <div class="form-group bmd-form-group">
                        <label for="exampleNama" class="bmd-label-floating">Nama *</label>
                        <input type="text-primary" class="form-control" id="exampleNama" name="item_nama" required="true" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleTanggal" class="bmd-label-floating">Tanggal *</label>
                        <input type="text" class="form-control" id="exampleTanggal" name="item_tanggal" required="true" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleNominal" class="bmd-label-floating">Nominal *</label>
                        <input type="text-primary" class="form-control" id="exampleNominal" name="item_nominal" required="true" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleStatus" class="bmd-label-floating">Status *</label>
                        <input type="text" class="form-control" id="exampleStatus" name="status" required="true" aria-required="true" aria-invalid="true">
                      </div>
                  </div>
                  
                  <div class="card-footer ">
                    <button type="submit" class="btn btn-rose btn-round col-md-12">Submit</button>
                  </div>
                  </form>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Modal EDIT-->
<div class="modal fade" id="editPe" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editPhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-left">
            <div class="modal-header">
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Edit Data</h4>
                  </div>
                  <div class="card-body ">
                    <form action="{{ route('save_edit_pe') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field()}}
                      <input type="hidden" name="hidden_id" id="hidden_id" value="">
                      <div class="form-group bmd-form-group">
                        <label for="editName" class="bmd-label-floating">Nama *</label>
                        <input type="text-primary" class="form-control" id="editName" name="item_nama" value="{{$data->item_nama}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="editTanggal" class="bmd-label-floating">Tanggal *</label>
                        <input type="text-primary" class="form-control" id="editTanggal" name="item_tanggal" value="{{$data->item_tanggal}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="editNominal" class="bmd-label-floating">Nominal *</label>
                        <input type="text-primary" class="form-control" id="editNominal" name="item_nominal" value="{{$data->item_nominal}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="editStatus" class="bmd-label-floating">Status *</label>
                        <input type="text-primary" class="form-control" id="editStatus" name="status" value="{{$data->status}}">
                      </div>
                  </div>
                  
                  <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-round col-md-12">Submit</button>
                  </div>
                  </form>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
      console.log('ready');
} );

  function edit_pe(id){
    $('#editPe').modal('show');
    $.ajax({
      type: 'get',
      url: `{{ url("get_pe") }}` + '/' + id,
      dataType: 'json',
      success: function (response) {
        $("#editName").val(response.data.item_nama)
        $("#editTanggal").val(response.data.item_tanggal)
        $("#editNominal").val(response.data.item_nominal)
        $("#editStatus").val(response.data.status)
        $("#hidden_id").val(response.data.id_pengeluaran)
        console.log(response.data);
      }
    })
  }

</script>
<script>
    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

    <!-- javascript for detroying the Perfect Scrollbar -->
    $('.main-panel').perfectScrollbar('destroy');

    <!-- javascript for updating the Perfect Scrollbar when the content of the page is changing -->
    $('.main-panel').perfectScrollbar('update');
</script>
@endsection
