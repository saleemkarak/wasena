@extends('user.layouts.master')

@php
    $title=Helper::settings()->title;
@endphp
@section('title',$title .  ' || تعديل المراجعة ' )

@section('main-content')
<div class="card">
  <h5 class="card-header">تعديل المراجعة</h5>
  <div class="card-body">
    <form action="{{route('user.productreview.update',$review->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">القائم بالمراجعة</label>
        <input type="text" disabled class="form-control" value="{{$review->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="review">المراجعة</label>
      <textarea name="review" id="" cols="20" rows="10" class="form-control">{{$review->review}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">الحالة :</label>
        <select name="status" id="" class="form-control">
          <option value="">--الحالة--</option>
          <option value="active" {{(($review->status=='active')? 'selected' : '')}}>فعال</option>
          <option value="inactive" {{(($review->status=='inactive')? 'selected' : '')}}>غير فعال</option>
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
