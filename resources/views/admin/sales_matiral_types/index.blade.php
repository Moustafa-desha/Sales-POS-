@extends('admin.layouts.index')

@section('title')
    فئات الفواتير
@endsection

@section('contentheader')
    بيانات فئات الفواتير
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.sales_matiral_types.index') }}"> فئات الفواتير </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-12">
                <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-outline-primary" style="margin: 5px">إضافه فئه جديده</button>
                <div class="card">
                    <div class="card-header" style="background-color: #80bdff">
                        <h3 class="card-title" style="margin-left:480px">بيانات فئات الفواتير</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div id="ajax_response_searchDiv">
                                        @if(@isset($data))

                                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                                                <thead class="custom_thead">
                                                <th>مسلسل</th>
                                                <th>اسم الفئه</th>
                                                <th>حاله التفعيل</th>
                                                <th>تاريخ الاضافه</th>
                                                <th>تاريخ التحديث</th>
                                                <th>الإعدادات</th>
                                                </thead>
                                                @php
                                                    $i=1;
                                                @endphp
                                                <tbody>
                                                @foreach($data as $info)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$info->name}}</td>
                                                        <td>@if($info->active==1) مفعله@else غير مفعله @endif</td>
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
                                                            @include('admin.sales_matiral_types.edite')
                                                            <a href="javascript:void(0)" onclick="document.getElementById('delete-{{$info->id}}').submit();"  class="btn btn-sm btn-danger">حذف</a>
                                                            <form style="display: none" method="post" action="{{route('admin.sales_matiral_types.delete',$info->id)}}" id="delete-{{$info->id}}">
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert"> Sorry No Any Data To Show</div>

                                        {{$data->links()}}

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

   @include('admin.sales_matiral_types.create')

@endsection




