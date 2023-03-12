@extends('admin.layouts.index')

@section('title')
    المزيد من المعلومات
@endsection

@section('contentheader')
    التفاصيل
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.treasuries.index') }}"> الخزن </a>
@endsection

@section('contentheaderactive')
    التفاصيل
@endsection

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #80bdff">
                        <h3 class="card-title" style="margin-left:480px">بيانات الخزنه</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div id="ajax_response_searchDiv">
                                        @if(@isset($data))

                                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <tbody>

                                                    <tr>
                                                        <th>اسم الخزنه</th>
                                                        <td>{{$data->name}}</td>
                                                    </tr>

                                                   <tr>
                                                        <th>هل رئيسيه</th>
                                                        <td>@if($data->is_master==1) رئيسيه @elseفرعيه@endif</td>
                                                   </tr>

                                                    <tr>
                                                        <th>اخر ايصال صرف</th>
                                                        <td>{{$data->last_receipt_exchange}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>اخر ايصال تحصيل</th>
                                                        <td>{{$data->last_receipt_collect}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>حاله التفعيل</th>
                                                        <td>@if($data->active==1) مفعل@else معطل @endif</td>
                                                    </tr>

                                                    <tr>
                                                        <th>تاريخ الاضافه</th>
                                                        <td>
                                                            @if($data['created_at'])
                                                                {{$data['created_at']->format('Y-m-d | H:iA')}}
                                                                بواسطه
                                                                {{$data->added_by_admin}}
                                                            @else
                                                                <p>No Date</p>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>تاريخ التحديث</th>
                                                        <td>
                                                            @if($data['updated_at'])
                                                                {{$data['updated_at']->format('Y-m-d | H:iA')}}
                                                                بواسطه
                                                                {{$data->updated_by_admin}}
                                                            @else
                                                                <p>No Date</p>
                                                            @endif
                                                                <a href="{{route('admin.treasuries.edit',$data->id)}}" class="btn btn-sm btn-primary" style="float: left">تعديل</a>

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
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <div class="card">
        <div class="card-header" style="background-color: #80bdff">
            <a href="{{route('admin.treasuries.addTreasuriesDelivery',$data->id)}}" class="btn btn-sm btn-success" style="float: left">إضافه خزنه فرعيه جديده</a>
            <h3 class="card-title" style="margin-left:300px">الخزن الفرعيه</h3>
        </div>

    <div id="ajax_response_searchDiv">
        @if(@isset($treasuries_delivery))

            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                <thead class="custom_thead">
                <th>مسلسل</th>
                <th>اسم الخزنه</th>
                <th>تاريخ الاضافه</th>
                <th>الأدوات</th>

                </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                @foreach($treasuries_delivery as $info)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$info->name}}</td>
                        <td>
                            @if($info['created_at'])
                                {{$info['created_at']->format('Y-m-d | H:iA')}}
                                بواسطه
                                {{$info->added_by_admin}}
                            @else
                                <p>No Date</p>
                            @endif
                        </td>
                        <td><a href="javascript:void(0);" onclick="document.getElementById('delete-{{$info->id}}').submit();" class="btn btn-danger"> حذف </a></td>
                    <form style="display: none" method="post" action="{{route('admin.treasuries.deleteTreasuriesDelivery',$info->id)}}" id="delete-{{$info->id}}">
                        @csrf
                    </form>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert"> Sorry No Any Data To Show</div>
        @endif

    </div>
    </div>

@endsection


