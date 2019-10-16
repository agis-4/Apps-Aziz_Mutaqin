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
        <form class="form-horizontal" action="{{ route('save_pe') }}" method="post">
        {{ csrf_field()}}
          <br>
          <div class="form-group">
            <label for="exampleInputNama">Item Nama</label>
            <input type="text" class="form-control" id="exampleInputNama" aria-describedby="Itemdata" placeholder="masukan item nama" name="item_nama">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Item Tanggal</label>
            <input type="text" class="form-control" id="exampleInputNama" aria-describedby="Itemdata" placeholder="masukan item tanggal" name="item_tanggal">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Item Nominal</label>
            <input type="text" class="form-control" id="exampleInputNama" aria-describedby="Itemdata" placeholder="masukan item nominal" name="item_nominal">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Item Status</label>
            <input type="text" class="form-control" id="exampleInputNama" aria-describedby="Itemdata" placeholder="masukan item status" name="status">
          </div>
          <div class="form-group">
            <a href="{{ route('index_pe') }}">
              <button type="button" class="btn btn-default">Cancel</button>
            </a>
              <button type="submit" class="btn btn-primary btn-raised">Submit</button>
          </div>
        </form>
    </div>
    </div>
</div>
@endsection