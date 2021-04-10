@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">اضافة منتج</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">أسم المنتج <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="اسم المنتج"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">خلاصة <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">وصف المنتج</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">رائج ام لا</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">التصنيف الاساسي <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--اختر تصنيف --</option>
              @foreach($categories as $key=>$category)

                  <option value="{{$category->id}}"{{old('cat_id')==$category->id ? 'selected' : ''}}>{{$category->title}}</option>

              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">تصنيف ثانوي</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--أختر تصنيف--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach --}}
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">السعر بالدينار <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="  مثال ١٠"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">الخصم(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="١٠٪"  value="{{old('discount')}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="size">الحجم</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--اختر اي حجم--</option>
              <option value="S" {{old('size')=='S' ? 'selected' : ''}}>Small (S)</option>
              <option value="M" {{old('size')=='M' ? 'selected' : ''}}>Medium (M)</option>
              <option value="L" {{old('size')=='L' ? 'selected' : ''}}>Large (L)</option>
              <option value="XL {{old('size')=='XL' ? 'selected' : ''}}">Extra Large (XL)</option>


          </select>
        </div>

        <div class="form-group">
          <label for="brand_id">العلامة التجارية</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--اختر العلامة--</option>
             @foreach($brands as $brand)
             <option value="{{$brand->id}}" {{old('brand_id')==$brand->id ? 'selected' : ''}}>{{$brand->title}}</option>

             @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="condition">حالة المنتج</label>
          <select name="condition" class="form-control">
              <option value="">--اختر--</option>
              <option value="default  {{old('condition')=='default' ? 'selected' : ''}}">عادي</option>
              <option value="new"  {{old('condition')=='new' ? 'selected' : ''}}>جديد</option>
              <option value="hot"  {{old('condition')=='hot' ? 'selected' : ''}}>رائدة</option>


          </select>
        </div>

        <div class="form-group">
          <label for="stock">الكمية <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="ادخل الكمية"  value="{{old('stock')}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">الصور <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> اختر
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">الحالة <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" {{old('status')=='inactive' ? 'selected' : ''}}>فعال</option>
              <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>غير فعال</option>


          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">اعادة تعيين</button>
           <button class="btn btn-success" type="submit">حفظ</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "اكتب وصف مختصر .....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "اكتب تفاصيل المنتج هنا.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----اختر تصنيف ثانوي----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush
