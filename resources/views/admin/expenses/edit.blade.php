@extends('layouts.master_backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="text-center">
    <div class="col-xl-12">
        <div class="card mb-4">
          <h5 class="card-header">แก้ไขรายจ่ายของร้าน</h5>
          <div class="card-body">
            <div class="row mt-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <form action="{{ url('admin/expenses/update/'.$expenses->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">รายการ</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="name" value="{{ $expenses->name }}"  id="html5-text-input" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">จำนวน</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="num" value="{{ $expenses->num }}" id="html5-text-input" />
                  </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ราคา</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="price" value="{{ $expenses->price }}"  id="html5-text-input" />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="html5-email-input" class="col-md-2 col-form-label">หมายเหตุ</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" value="{{ $expenses->comment }}" name="comment" id="html5-email-input" />
                    </div>
                  </div>

                  {{-- <div class="mb-3 row">
                    <label for="html5-email-input" class="col-md-2 col-form-label">รูปภาพ</label>
                    <div class="col-md-10">
                      <input name="image" class="form-control" type="file" id="image">
                    </div>
                  </div>
              </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                    <div class="col-12">
                        <img id="showImage" class="rounded avatar-lg" src="{{ asset('backend/upload/expenses/'.$expenses->image) }}"
                            alt="Card image cap" >
                    </div>
                </div> --}}
      
                  <div class="row mt-4">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                    </div>
                  </div>

            </form>
<br><br><br><br>
          </div>
        </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('#image').change(function(e) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
  });
</script>
  
@endsection