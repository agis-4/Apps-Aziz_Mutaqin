@extends('template_1.template')

@section('content')
<div class="col-md-7">
     <div class="card">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <i class="material-icons">person</i>
            </div>
            <h4 class="card-title"><b>Add Data</b></h4>
        </div>
        
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('save_up') }}" method="post">
        {{ csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1" class="bmd-label-floating">Nama Lengkap</label><br>
            <input type="text" class="form-control" name="nama_lengkap" placeholder="masukan nama lengkap">
          </div>
          <div class="form-group">
            <label for="exampleTextarea" class="bmd-label-floating">Alamat Lengkap</label><br>
            <textarea class="form-control" name="alamat_lengkap" rows="3" placeholder="masukan alamat lengkap"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="bmd-label-floating">Nominal</label><br>
            <input type="text" class="form-control" name="nominal" placeholder="masukan nominal">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="bmd-label-floating">Status</label><br>
            <input type="text" class="form-control" name="status" placeholder="masukan status">
          </div>
          <div class="form-group">
            <a href="{{ route('index_up') }}">
              <button type="button" class="btn btn-default">Cancel</button>
            </a>
              <button type="submit" class="btn btn-primary btn-raised">Submit</button>
          </div>
        </form>
    </div>
    </div>
</div>
@endsection
