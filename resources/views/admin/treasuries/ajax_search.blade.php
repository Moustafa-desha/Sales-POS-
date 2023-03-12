
<div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">

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

                                <a href="{{route('admin.treasuries.details',$info->id)}}"   class="btn btn-sm btn-info">المزيد</a>
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
    <div id="ajax_pagination">
        {{$data->links()}}
    </div>
</div>
<!-- /.card-body -->





