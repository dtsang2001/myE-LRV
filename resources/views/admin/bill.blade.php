@extends('layouts.admin')

@section('title')
Quản Lý Đơn Hàng
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Quản Lý Đơn Hàng</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Đơn Hàng Đang Chờ Xứ Lí</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

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
                                            <th>ID</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Khách Hàng</th>
                                            <th>Địa Chỉ</th>
                                            <th width="100px"></th>
                                            <th width="100px"></th>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alexander Pierce</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Bob Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Mike Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jim Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Victoria Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Michael Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Rocky Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-block btn-outline-danger btn-sm">Chỉnh sửa</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            <div class="col-lg-12">
                <div class="card card-success">

                    <div class="card-header">
                        <h3 class="card-title">Đơn Hàng Đã Giao</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

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
                                            <th>ID</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Khách Hàng</th>
                                            <th>Ngày Giao Hàng</th>
                                            <th width="100px"></th>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alexander Pierce</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Bob Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Mike Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jim Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Victoria Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Michael Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Rocky Doe</td>
                                            <td>Phạm Văn Nam</td>
                                            <td>11-7-2014</td>
                                            <td>
                                                <button class="btn btn-block btn-outline-success btn-sm">Xem chi tiết</button>
                                            </td>
                                        </tr>
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