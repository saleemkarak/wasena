@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Order       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      @php
          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
      @endphp
      <thead>
        <tr>
            <th>S.N.</th>
              <th>رقم الطلب</th>
              <th>الاسم</th>
              <th>البريد</th>
              <th>الكمية</th>
              <th>الشحن</th>
              <th>المبلغ الاجمالي</th>
              <th>الحالة</th>
              <th>الاجراء</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>@foreach($shipping_charge as $data) {{number_format($data,2)}}دينار  @endforeach</td>
            <td>{{number_format($order->total_amount,2)}} دينار</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">معلومات الطلبية</h4>
              <table class="table">
                    <tr class="">
                        <td>رقم الطلبية</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>التاريخ</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>الكمية</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>حالة الطلب</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                      @endphp
                        <td>الشحن</td>
                        <td> :  {{number_format($shipping_charge[0],2)}} دينار</td>
                    </tr>
                    <tr>
                      <td>كوبون الخصم</td>
                      <td> : {{number_format($order->coupon,2)}} دينار</td>
                    </tr>
                    <tr>
                        <td>الاجمالي</td>
                        <td> : {{number_format($order->total_amount,2)}} دينار</td>
                    </tr>
                    <tr>
                        <td>طريقة الدفع</td>
                        <td> : @if($order->payment_method=='cod') دفع عند التوصيل @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>حالة الدفع</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">معلومات الشحن</h4>
              <table class="table">
                    <tr class="">
                        <td>الاسم الكامل</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>البريد</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>رقم الهاتف</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>العنوان</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>المحافظة</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>رمز بريدي</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

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
