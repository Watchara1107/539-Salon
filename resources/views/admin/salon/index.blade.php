@extends('layouts.master_backend')
@section('content')
    <div class="text-center">
        <div class="row">
            <div class="col-7">
                <div class="card mb-4">
                    <h5 class="card-header">รายชื่อช่างเสริมสวย</h5>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                       @foreach ($salon as $salons)
                                       <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $salon->firstItem() + $loop->index }}</td>
                                        <td>{{ $salons->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/salon/edit/'.$salons->id) }}" class="btn btn-warning">แก้ไข</a>
                                            <a href="{{ url('/admin/salon/delete/'.$salons->id) }}" class="btn btn-danger">ลบ</a>
                                        </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="container">
                                <div class="row mt-4">
                                    {{ $salon->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card mb-4">
                    <h5 class="card-header">เพิ่มชื่อช่างเสริมสวย</h5>
                    <div class="card-body">
                        
                        <form action="{{ route('salon.create') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">ชื่อช่าง</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" id="html5-text-input" />
                                </div>
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
        </div>
    @endsection
