@extends('layouts.master_backend')
@section('content')
    <div class="text-center">
        
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header">แก้ไขรายการบริการ</h5>
                    <div class="card-body">
                        
                        <form action="{{ url('/admin/service/update/'.$service->id) }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">รายการบริการ</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{ $service->name }}" id="html5-text-input" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="อัพเดทข้อมูล">
                                </div>
                            </div>
                        </form>
                        

                    </div>
                </div>
            </div>

    @endsection
