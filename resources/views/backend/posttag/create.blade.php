@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">أضف تبويب للمنشورات</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">التبويب</label>
          <input id="inputTitle" type="text" name="title" placeholder="ضع عنوانن مناسب"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">الحالة</label>
          <select name="status" class="form-control">
              <option value="active">فعال</option>
              <option value="inactive">غير فعال</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">أعادة ضبط</button>
           <button class="btn btn-success" type="submit">حفظ</button>
        </div>
      </form>
    </div>
</div>

@endsection
