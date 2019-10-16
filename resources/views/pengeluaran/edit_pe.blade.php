@extends('template_1.template')

@section('content')
<div class="col-md-6">
      <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title"><b>Edit Data Pengeluaran</b></h4>
          </div>
        
           <div class="col-md-12">
                <form class="form-horizontal" action="{{ route('save_edit_pe') }}" method="post">
                {{ csrf_field()}}
                @foreach($pengeluaran as $data)
                <input type="hidden" name="hidden_id" id="hidden_id" value="{{$data->id_pengeluaran}}"><br>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="bmd-label-floating">Item Nama</label><br>
                    <input type="text" class="form-control" name="item_nama" value="{{$data->item_nama}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="bmd-label-floating">Item Tanggal</label><br>
                    <input type="text" class="form-control" name="item_tanggal" value="{{$data->item_tanggal}}">
                  </div>
          
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Item Nominal</label><br>
                    <input type="text" class="form-control" name="item_nominal" value="{{$data->item_nominal}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Status</label><br>
                    <input type="text" class="form-control" name="status" value="{{$data->status}}">
                  </div>
                  <div class="form-group">
                    <a href="{{ route('index_pe') }}">
                      <button type="button" class="btn btn-default">Cancel</button>
                    </a>
                      <button type="submit" class="btn btn-primary btn-raised">Submit</button>
                  </div>
                  @endforeach
                </form>
            </div>
    </div>
</div>
@endsection
