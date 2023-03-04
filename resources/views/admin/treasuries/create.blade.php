@extends('admin.layouts.index')

@section('title')
    إضافه خزنه جديده
@endsection

@section('contentheader')
   إضافه خزنه
@endsection

@section('contentheaderlink')
    الخزن
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
                    <div class="card-header" style="background-color: #80bdff">
                        <h3 class="card-title" style="margin-left:380px">إضافه خزنه جديده</h3>
                    </div>
                    <form method="post" action="{{ route('admin.treasuries.store') }}">
                        @csrf
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                        <div class="col-md-6">
                            <label  class="form-label">اسم الخزنه</label>
                            <input type="text" name="name" value="{{ old('name')}}" class="form-control"  placeholder="ادخل اسم الخزنه">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label  class="form-label">نوع الخزنه</label>
                            <select class="form-control" name="is_master">
                                <option {{ old('is_master') == 1 ? 'selected' : '' }} value="1">رئيسيه</option>
                                <option {{ old('is_master') == 0 ? 'selected' : '' }} value="0">فرعيه</option>
                                <option  value="" selected>اختر النوع</option>
                            </select>
                            @error('is_master')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                            <div class="col-md-6">
                                <label  class="form-label" for="last_receipt_exchange">اخر إيصال صرف نقديه</label>
                                <input type="text" id="last_receipt_exchange" name="last_receipt_exchange" value="{{old('last_receipt_exchange')}}" class="form-control"  placeholder="اخر إيصال صرف نقديه"  oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1').replace(/(\-.*)\-/g, '$1');" /)>
                                @error('last_receipt_exchange')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label" for="last_receipt_collect">اخر إيصال تحصيل نقديه</label>
                                <input type="text" id="last_receipt_collect" name="last_receipt_collect" value="{{old('last_receipt_collect')}}" class="form-control"  placeholder="اخر إيصال تحصيل نقديه"  oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1').replace(/(\-.*)\-/g, '$1');" />
                                @error('last_receipt_collect')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label  class="form-label">حاله التفعيل</label>
                                <select class="form-control" name="active" >
                                    <option {{ old('active') == 1 ? 'selected' : '' }} value="1" >مفعله</option>
                                    <option {{ old('active') == 0 ? 'selected' : '' }}  value="0">غير مفعله</option>
                                    <option value="" selected>اختر الحاله</option>
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
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
