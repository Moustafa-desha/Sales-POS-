@extends('admin.layouts.index')

@section('title')
    الضبط العام
@endsection

@section('contentheader')
    الرئسيه
@endsection

@section('contentheaderlink')
    الضبط العام
@endsection

@section('contentheaderactive')
    <a href="{{ route('admin.dashboard') }}"> الرئسيه </a>
@endsection

@section('content')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-left: 380px">تعديل بيانات الضبط العام</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                </div>
                                <div class="col-sm-12 col-md-6">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.AdminPanelSettings.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    @if($data)
                                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                                            <tbody>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <label>System Name</label>
                                                </td>
                                                <td>
                                                    <input value="{{$data['system_name']}}" name="system_name">
                                                    @error('system_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <label>Logo Company</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <img class="custom_logo" src="{{asset('public/assets/admin/uploads/'.$data['photo'])}}" alt="Logo Company">
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-warning btn-sm" id="update_logo">Update Logo</button>
                                                    <button class="btn btn-warning btn-sm" id="cancel_update_logo" style="display: none">Cancel</button>

                                                    <div id="oldLogo">

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <label>General Alert</label>
                                                </td>
                                                <td>
                                                    <input value="{{$data['general_alert']}}" name="general_alert">
                                                </td>
                                            </tr>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <label>Address Company</label>
                                                </td>
                                                <td>
                                                    <input value="{{$data['address']}}" name="address">
                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <label>Phone</label>
                                                </td>
                                                <td>
                                                <input value=" {{$data['phone']}}" name="phone">
                                                    @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    @else
                                        <div class="alert"> Sorry No Any Data To Show</div>
                                    @endif
                                        <button class="btn btn-success btn-md" type="submit" style="float: left">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <!-- DataTables -->
    <script src="{{ asset("assets/admin/plugins/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
