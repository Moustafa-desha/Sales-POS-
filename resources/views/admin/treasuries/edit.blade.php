@extends('admin.layouts.index')

@section('title')
     تعديل خزنه
@endsection

@section('contentheader')
    تعديل خزنه
@endsection

@section('contentheaderlink')
    تعديل خزنه
@endsection

@section('contentheaderactive')
    <a href="{{ route('admin.dashboard') }}"> الرئسيه </a>
@endsection

@section('content')


<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header" style="background-color: #80bdff">
    <h3 class="card-title" style="margin-left: 380px">تعديل بيانات خزنه </h3>
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
                <form method="post" action="{{ route('admin.treasuries.update',$data->id) }}">
                @csrf
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <label  class="form-label">اسم الخزنه</label>
                                <input type="text" name="name" value="{{ old('name',$data->name) }}" class="form-control"  placeholder="ادخل اسم الخزنه">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label">نوع الخزنه</label>
                                <select class="form-control" name="is_master">
                                    <option value="1" {{$data->is_master == 1  ? 'selected' : '' }}>رئيسيه</option>
                                    <option value="0" {{$data->is_master == 0  ? 'selected' : '' }}>فرعيه</option>
                                </select>
                                @error('is_master')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label" for="last_receipt_exchange">اخر إيصال صرف نقديه</label>
                                <input type="text" id="last_receipt_exchange" name="last_receipt_exchange" value="{{ old('last_receipt_exchange',$data->last_receipt_exchange) }}" class="form-control"  placeholder="اخر إيصال صرف نقديه"  oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1').replace(/(\-.*)\-/g, '$1');" /)>
                                @error('last_receipt_exchange')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label" for="last_receipt_collect">اخر إيصال تحصيل نقديه</label>
                                <input type="text" id="last_receipt_collect" name="last_receipt_collect" value="{{old('last_receipt_collect',$data->last_receipt_collect)}}" class="form-control"  placeholder="اخر إيصال تحصيل نقديه"  oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1').replace(/(\-.*)\-/g, '$1');" />
                                @error('last_receipt_collect')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label">حاله التفعيل</label>
                                <select class="form-control" name="active" >
                                    <option {{ $data->active == 1 ? 'selected' : '' }} value="1" >مفعله</option>
                                    <option {{ $data->active == 0 ? 'selected' : '' }}  value="0">غير مفعله</option>
                                </select>
                                @error('active')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                        </div>
                        <button class="btn btn-success" style="margin-top: 8px" type="submit">Submit</button>
                        <a class="btn btn-danger" style="margin-top: 8px" href="{{ route('admin.treasuries.index') }}">إلغاء</a>
                    </div>
                    <!-- /.card-body -->
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


@endsection
