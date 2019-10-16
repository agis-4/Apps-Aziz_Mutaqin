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
                        <h4 class="card-title"><b>List Data User</b></h4>
                        <button type="button" class="btn btn-rose btn-round btn-sm" data-toggle="modal" data-original-title=""  data-target="#addUser" title="add data user"><i class="fa fa-plus"></i> Add User</button>
                  </div>

                    <div class="card-body">
                        <div class="material-datatables">
                            <table class="table table-striped color table" id="table_id">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </thead>
                                <tbody>
                                <?php $counter = 1 ?>
                                @foreach($us as $data)
                                <tr>
                                  <td>{{$counter++}}</td>
                                  <td>{{$data->name}}</td>
                                  <td>{{$data->email}}</td>
                                  <td>{{$data->password}}</td>
                                  <td>
                                      <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round" onclick="edit_user('{{$data->id}}')"  title="edit data user"><i class="material-icons">edit</i></button>
              
                                      <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" onclick="detail_user('{{$data->id}}')"  title="detail data user"><i class="material-icons">visibility</i></button> 
                      
                                      <a onClick="return confirm('Apakah Ingin Menghapus Data ?');" a href="{{route('delete_us',$data->id)}}"><button type="button" class="btn btn-danger btn-fab btn-fab-mini btn-round"><i class="material-icons">delete</i></button></a>
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
<div class="modal fade" id="addUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPhotoLabel" aria-hidden="true">
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
                    <h4 class="card-title">Add User Data</h4>
                  </div>
                  <div class="card-body ">
                    <form action="{{ route('save_us') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field()}}
                      <div class="form-group bmd-form-group">
                        <label for="exampleName" class="bmd-label-floating">Name *</label>
                        <input type="text-primary" class="form-control" id="exampleName" name="name" required="true" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Email *</label>
                        <input type="email" class="form-control" id="exampleEmail" name="email" required="true" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="examplePass" class="bmd-label-floating">Password *</label>
                        <input type="password" class="form-control" id="examplePass" name="password" required="true" aria-required="true" aria-invalid="true">
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
<div class="modal fade" id="editUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editPhotoLabel" aria-hidden="true">
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
                    <h4 class="card-title">Edit User Data</h4>
                  </div>
                  <div class="card-body ">
                    <form action="{{ route('save_edit_us') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field()}}
                      <input type="hidden" name="hidden_id" id="hidden_id" value="">
                      <div class="form-group bmd-form-group">
                        <label for="exampleName" class="bmd-label-floating">Name *</label>
                        <input type="text-primary" class="form-control" id="exampleNameEdit" name="name" value="{{$data->name}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Email *</label>
                        <input type="email" class="form-control" id="exampleEmailEdit" name="email" value="{{$data->email}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="examplePass" class="bmd-label-floating">Password *</label>
                        <input type="password" class="form-control" id="examplePassEdit" name="password" value="{{$data->password}}">
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

<!-- Photo Modal DETAIL-->
<div class="modal fade" id="detailUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editPhotoLabel" aria-hidden="true">
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
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Detail User Data</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('index_us') }}" method="get" enctype="multipart/form-data">
                      <div class="form-group bmd-form-group">
                        <label for="exampleNameDetail" class="bmd-label-floating">Name *</label>
                        <input type="text-primary" class="form-control" id="exampleNameDetail" name="name" value="{{$data->name}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="exampleEmailDetail" class="bmd-label-floating">Email *</label>
                        <input type="email" class="form-control" id="exampleEmailDetail" name="email" value="{{$data->email}}">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="examplePass" class="bmd-label-floating">Password *</label>
                        <input type="text-primary" class="form-control" id="examplePassDetail" name="password" value="{{$data->password}}">
                      </div>
                  </div>
                    <div class="card-footer ">
                    <button type="submit" class="btn btn-info btn-round col-md-12">Back To List</button>
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

  function edit_user(id){
    $('#editUser').modal('show');
    $.ajax({
      type: 'get',
      url: `{{ url("get_user") }}` + '/' + id,
      dataType: 'json',
      success: function (response) {
        $("#exampleNameEdit").val(response.data.name)
        $("#exampleEmailEdit").val(response.data.email)
        $("#examplePassEdit").val(response.data.password)
        $("#hidden_id").val(response.data.id)
        console.log(response.data);
      }
    })
  }

function detail_user(id){
    $('#detailUser').modal('show');
    $.ajax({
      type: 'get',
      url: `{{ url("get_user_detail") }}` + '/' + id,
      dataType: 'json',
      success: function (response) {
        $("#exampleNameDetail").val(response.data.name)
        $("#exampleEmailDetail").val(response.data.email)
        $("#examplePassDetail").val(response.data.password)
        $("#hidden_id").val(response.data.id)
        console.log(response.data);
      }
    })
  }

</script>
@endsection