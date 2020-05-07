@extends('layouts.admin')

@section('title')
Quản Lý Người Dùng
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Quản Lý Khách Hàng</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản trị viên</h3>

                        <div class="card-tools">
                            <span class="badge badge-danger">{{$members}} Thành viên</span>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <ul class="my-users-list clearfix">
                            @foreach ($users as $user)
                            @if ($user->level == 1)
                            <li>
                                <a href="{{ route('view-user', ['id' => $user->id]) }}">
                                    <img src="uploads/{{$user->avatar}}">
                                    <span class="users-list-name">{{$user->name}}</span>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-success">

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

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap">
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Cấp</th>
                                            <th width="100px"></th>
                                            <th width="100px"></th>
                                        </tr>
                                        
                                        @foreach ($users as $user)
                                        @if ($user->level == 0)
                                        <tr>
                                            <td>
                                                <div class="user-panel d-flex">
                                                    <div class="picture">
                                                        <img src="uploads/{{$user->avatar}}" class="img-circle elevation-2" style="height: 2.1rem; object-fit: cover;">
                                                    </div>
                                                    <div class="info">
                                                        {{$user->name}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{($user->level == 0)? 'Khách hàng' : 'Quản trị viên'}}</td>
                                            <td>
                                                <a href="{{ route('view-user', ['id' => $user->id]) }}">
                                                    <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                                </a>                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </table>
                                </div>

                                <div class="card-footer">
                                    <div class="card-tools float-right">
                                        {{ $users->links() }}
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
</div>
@stop()