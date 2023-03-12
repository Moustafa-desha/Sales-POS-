@extends('admin.layouts.index')

@section('title')
    إضافه خزنه فرعيه جديده
@endsection

@section('contentheader')
     إضافه خزنه فرعيه
@endsection

@section('contentheaderlink')
    الخزن
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
                        <h3 class="card-title" style="margin-left:380px">إضافه خزنه فرعيه تابعه جديده</h3>
                    </div>
                    <form method="post" action="{{ route('admin.treasuries.storeTreasuriesDelivery',$data->id)}}">
                    @csrf
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label  class="form-label">الخزن الفرعيه</label>
                                    <select class="form-control" name="treasuries_can_delivery_id" >
                                        <option value="" selected>اختر الخزنه</option>
                                        @foreach($treasuries as $info)
                                        <option {{ old('treasuries_can_delivery_id') == $info->id ? "selected" : '' }} value="{{$info->id}}">{{$info->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('treasuries_can_delivery_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <button class="btn btn-success" style="margin-top: 8px" type="submit">Submit</button>
                            <a class="btn btn-danger" style="margin-top: 8px" href="{{ route('admin.treasuries.details',$data->id) }}">إلغاء</a>
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
