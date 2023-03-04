@extends('admin.layouts.index')

@section('title')
    الخزن
@endsection

@section('contentheader')
    الخزن
@endsection

@section('contentheaderlink')
  <a href="{{ route('admin.treasuries.index') }}"> الخزن </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">


<section class="content">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.treasuries.create') }}" class="btn btn-outline-primary"style="margin: 5px">إضافه خزنه جديده</a>
            <input type="text" class="col-md-3 form-control"style="float :left" placeholder="بحث بالاسم" id="search_by_text">

            <div class="card">
                <div class="card-header" style="background-color: #80bdff">
                    <h3 class="card-title" style="margin-left:480px">بيانات الخزن</h3>
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
                                @if(@isset($data))

                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                                    <thead class="custom_thead">
                                    <th>مسلسل</th>
                                    <th>اسم الخزنه</th>
                                    <th>هل رئيسيه</th>
                                    <th>اخر ايصال صرف</th>
                                    <th>اخر ايصال تحصيل</th>
                                    <th>حاله التفعيل</th>
                                    <th>تاريخ الاضافه</th>
                                    <th>تاريخ التحديث</th>
                                    <th></th>
                                    </thead>
                                    @php
                                        $i=1;
                                    @endphp
                                    <tbody>
                                    @foreach($data as $info)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$info->name}}</td>
                                            <td>@if($info->is_master==1) رئيسيه @elseفرعيه@endif</td>
                                            <td>{{$info->last_receipt_exchange}}</td>
                                            <td>{{$info->last_receipt_collect}}</td>
                                            <td>@if($info->active==1) مفعل@else معطل @endif</td>
                                            <td>
                                                @if($info['created_at'])
                                                    {{$info['created_at']->format('Y-m-d | H:iA')}}
                                                    بواسطه
                                                    {{$info->added_by_admin}}
                                                @else
                                                    <p>No Date</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($info['updated_at'])
                                                    {{$info['updated_at']->format('Y-m-d | H:iA')}}
                                                    بواسطه
                                                    {{$info->updated_by_admin}}
                                                @else
                                                    <p>No Date</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.treasuries.edit',$info->id)}}" class="btn btn-sm btn-primary" style="margin-bottom: 4px">تعديل</a>

                                                <button data-id="{{$info->id}}" class="btn btn-sm btn-info">المزيد</button>
                                            </td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert"> Sorry No Any Data To Show</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{$data->links()}}
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
