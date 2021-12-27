@extends('layouts.index')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <h2>Import khách hàng</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <div class="col-lg-12">
            <form method="POST" action="{{route('import')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Chọn file Excel</label>
                    <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                </div>
                <div class="form-check">
                    <input type="checkbox" name="remove" value="true" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Xóa danh sách cũ</label>
                  </div>
                <p style="color: red">
                    @error('file')
                        {{$message}}
                    @enderror
                </p>
                <button type="submit" class="btn btn-success">Import</button>
            </form>            
        </div>
    </div>
    <br>
    <div class="row">
        <h2>
            Thay background
        </h2>
        <div class="col-lg-12">
            <form method="POST" action="{{route('background')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh</label>
                    <input type="file" name="background" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                </div>
                <p style="color: red">
                    @error('background')
                        {{$message}}
                    @enderror
                </p>
                <button type="submit" class="btn btn-success">Xác nhận</button>
            </form>            
        </div>
    </div>
</div>
@endsection