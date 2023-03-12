<!-- Modal -->
<div class="modal fade modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #80bdff">
                                    <h3 class="card-title" style="margin-left:280px">إضافه فئه جديده</h3>
                                </div>
                                <form method="post" action="{{route('admin.sales_matiral_types.store')}}">
                                @csrf
                                <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <label  class="form-label">اسم الفئه</label>
                                                <input type="text" name="name" value="{{ old('name')}}" class="form-control"  placeholder="ادخل اسم الفئه">
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
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
                                        <button class="btn btn-success" style="margin-top: 8px" type="submit">إضافه</button>
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
        </div>
    </div>
</div>
