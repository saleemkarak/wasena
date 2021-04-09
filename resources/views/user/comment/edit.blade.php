@extends('user.layouts.master')

@php
    $title=Helper::settings()->title;
@endphp
@section('title',$title .  ' || تعديل تعليق' )

@section('main-content')
<div class="card">
  <h5 class="card-header">تعديل التعليق</h5>
  <div class="card-body">
    <form action="{{route('user.post-comment.update',$comment->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">من قبل:</label>
        <input type="text" disabled class="form-control" value="{{$comment->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="comment">التعليق</label>
      <textarea name="comment" id="" cols="20" rows="10" class="form-control">{{$comment->comment}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">الحالة :</label>
        <select name="status" id="" class="form-control">
          <option value="">--اختر--</option>
          <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>فعال</option>
          <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>غير فعال</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }
</style>
@endpush
