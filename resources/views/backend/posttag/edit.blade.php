@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">تعديل التبويب</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.update',$postTag->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">التبويب</label>
          <input id="inputTitle" type="text" name="title" placeholder="ضع عنوان"  value="{{$postTag->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">الحالة</label>
          <select name="status" class="form-control">
            <option value="active" {{(($postTag->status=='active') ? 'selected' : '')}}>فعال</option>
            <option value="inactive" {{(($postTag->status=='inactive') ? 'selected' : '')}}>غير فعال</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">تحديث</button>
        </div>
      </form>
    </div>
</div>

@endsection
