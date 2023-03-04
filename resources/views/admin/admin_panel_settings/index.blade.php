@extends('admin.layouts.index')

@section('title')
    الضبط العام
@endsection

@section('contentheader')
    الضبط العام
@endsection

@section('contentheaderlink')
   الضبط
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
                        <h3 class="card-title"  style="margin-left:480px">الضبط العام</h3>
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

                                    @if(@isset($data) & $data!= null)
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                                        <tbody>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">System Name</td>
                                            <td>{{$data['system_name']}}</td>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Code Company</td>
                                            <td>{{$data['com_code']}}</td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Logo Company</td>
                                            <td>
                                                <div>
                                                    <img class="custom_logo" src="{{ asset('public/assets/admin/uploads/'.$data['photo'])}}" alt="Logo Company">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Active</td>
                                            <td>@if($data['active'] ==1) مفعل-active @else معطل @endif </td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">General Alert</td>
                                            <td>{{$data['general_alert']}}</td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Address</td>
                                            <td>{{$data['address']}}</td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Phone</td>
                                            <td>{{$data['phone']}}</td>
                                        </tr>


                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Last Updated</td>
                                            <td>
                                                @if($data['updated_at'])
                                                {{$data['updated_at']->format('Y-m-d | H:iA')}}
                                                @else
                                                    <p>No Date</p>
                                            @endif
                                                <br>
                                                Updated By -->
                                                {{$data['updated_by_admin']}}

                                                <a class="btn btn-sm btn-info" href="{{route('admin.AdminPanelSettings.edit')}}">Edit</a>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    @else
                                    <div class="alert"> Sorry No Any Data To Show</div>
                                    @endif
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
