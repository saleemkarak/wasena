@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">تعديل حالة الطلبية</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">الحالة :</label>
        <select name="status" id="" class="form-control">
          <option value="">--اختر حالة--</option>
          <option value="new" {{(($order->status=='new')? 'selected' : '')}}>طلب جديد</option>
          <option value="process" {{(($order->status=='process')? 'selected' : '')}}>قيد المعالجة</option>
          <option value="delivered" {{(($order->status=='delivered')? 'selected' : '')}}>تم التوصيل</option>
          <option value="cancel" {{(($order->status=='cancel')? 'selected' : '')}}>حذف الطلب</option>
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
