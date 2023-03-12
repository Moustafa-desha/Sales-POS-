<!-- Large modal -->
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-{{$info->id}}" style="margin-bottom: 4px">تعديل</button>


<!-- Modal -->
<div class="modal fade modal fade bd-example-modal-lg-{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #80bdff">
                                <h3 class="card-title" style="margin-left:280px">تعديل فئه فواتير</h3>
                            </div>
                            <form method="post" action="{{route('admin.sales_matiral_types.update',$info->id)}}">
                            @csrf
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <label  class="form-label">اسم الفئه</label>
                                            <input type="text" name="name" value="{{ old('name', $info->name) }}" class="form-control"  placeholder="ادخل اسم الفئه">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label  class="form-label">حاله التفعيل</label>
                                            <select class="form-control" name="active" >
                                                <option value="1" {{  $info->active == 1 ? 'selected' : '' }}>مفعله</option>
                                                <option value="0" {{  $info->active == 0 ? 'selected' : '' }}>غير مفعله</option>
                                            </select>
                                            @error('active')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <button class="btn btn-success" style="margin-top: 8px" type="submit">تحديث</button>
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
