@extends('layouts.admin')

@section('title')
Phân Quyền Admin
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Phân Quyền Admin</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">

                    <div class="card-header"></div>

                    <div class="card-body">
                        <div class="col-12">
                            <div class="card">
                                
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiểm">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 300px;">

                                    <table class="table table-head-fixed text-nowrap">
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Cấp</th>
                                            <th width="100px">Hành động</th>
                                        </tr>
                                        
                                        @foreach ($customer as $cus)
                                        <tr>
                                            <td>
                                                <div class="user-panel d-flex">
                                                    <div class="picture">
                                                        <img src="uploads/{{$cus->avatar}}" class="img-circle elevation-2" style="height: 100%; object-fit: cover;">
                                                    </div>
                                                    <div class="info">
                                                        {{$cus->name}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$cus->email}}</td>
                                            <td>{{($cus->level == 0)? 'Khách hàng' : 'Quản trị viên'}}</td>
                                            <td>
                                                <a href="{{route('role-admin', ['id' => $cus->id])}}">
                                                    <button class="btn btn-block btn-outline-danger btn-sm">Thăng cấp</button>
                                                </a>                                                    
                                            </td>
                                        </tr>
                                        @endforeach

                                    </table>
                                        
                                </div>

                            </div>
                        </div>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()