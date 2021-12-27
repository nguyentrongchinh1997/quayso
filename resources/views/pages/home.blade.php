@extends('layouts.index')

@section('content')
<style>
    .row {
        margin: 0px;
    }
    table tr td {
        border: 1px solid #ccc !important;
        color: #fff !important;
    }
    .even {
        background: none !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #4c9d2f !important;
        color: #fff !important;
        border: 0px;
    }
    .paginate_button:hover {
        background: #4c9d2f !important;
        border: 0px !important;
    }
    body {
        background-image: url("{{asset('bg.jpg')}}");
        background-size: cover;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 style="text-align: center; margin-top: 30px">
            DANH SÁCH TRÚNG THƯỞNG
        </h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr style="background: #4c9d2f; color: #fff">
                    <th>STT</th>
                    <th>Mã số</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $stt => $item)
                    <tr>
                        <td align="center">{{++$stt}}</td>
                        <td>
                            {{$item->code}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->address}}
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection