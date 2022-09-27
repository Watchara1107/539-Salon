@extends('layouts.master_backend')
@section('content')
    <div class="text-center">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header">เพิ่มรายการบริการ</h5>
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
                        <form action="{{ route('service.create') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">รายการบริการ</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" id="html5-text-input" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <h5 class="card-header">รายการบริการ</h5>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รายการบริการ</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($service as $services)
                                                <tr>
                                                    <td><i
                                                            class="fab fa-angular fa-lg text-danger me-3"></i>{{ $service->firstItem() + $loop->index }}
                                                    </td>
                                                    <td>{{ $services->name }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/service/edit/' . $services->id) }}"
                                                            class="btn btn-warning">แก้ไข</a>
                                                        <a href="{{ url('/admin/service/delete/' . $services->id) }}"
                                                            class="btn btn-danger">ลบ</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="container">
                                    <div class="row mt-4">
                                        {{ $service->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
