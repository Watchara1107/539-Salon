@extends('layouts.master_backend')
@section('content')
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">สรุปรายรับ-รายจ่าย</h5>
                        <small class="text-muted">ร้านเสริมสวย 539 salon</small>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="fa-solid fa-wallet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">รายได้ประจำเดือน</h6>
                                    <small class="text-muted">{{ now()->thaidate('F') }}</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ number_format($in->sum('price')) }} บาท</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="fa-solid fa-hand-holding-dollar"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">รายจ่ายประจำเดือน</h6>
                                    <small class="text-muted">{{ now()->thaidate('F') }}</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ number_format($ex->sum('price')) }} บาท</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="fa-solid fa-wallet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">รายได้ทั้งหมด</h6>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ number_format($incoms->sum('price')) }} บาท</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="fa-solid fa-hand-holding-dollar"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">รายจ่ายทั้งหมด</h6>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ number_format($expenses->sum('price')) }} บาท</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->




        <!-- Transactions -->
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">สรุปรายการ</h5>

                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="fa-regular fa-calendar-check rounded"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">booking
                                    </small>
                                    <h6 class="mb-0">จำนวนคิวทั้งหมด</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $book->count() }}</h6>
                                    <span class="text-muted">คิว</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="fa-solid fa-image"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Profiles</small>
                                    <h6 class="mb-0">จำนวนผลงานของร้าน</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $profile->count() }}</h6>
                                    <span class="text-muted">ภาพ</span>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
  
        
                    <!-- Transactions -->
                    <div class="col-md-12 col-lg-12 order-2 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">สรุปรายได้แต่ละเดือน</h5>
            
                            </div>
                            <div class="card-body">
                                <ul class="p-0 m-0">
                                
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-secondary"><i
                                                    class="fa-regular fa-calendar-check rounded"></i></span>
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                            
                                                <h6 class="mb-0">เดือน ธันวาคม</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0">{{ number_format($in3->sum('price')) }} บาท</h6>
                                            
                                            </div>
                                        </div>
                                    </li>



                                
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-secondary"><i
                                                class="fa-regular fa-calendar-check rounded"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                        
                                            <h6 class="mb-0">เดือน พฤศจิกายน</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{ number_format($in2->sum('price')) }} บาท</h6>
                                        
                                        </div>
                                    </div>
                                </li>
                                

                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-secondary"><i
                                                class="fa-regular fa-calendar-check rounded"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                        
                                            <h6 class="mb-0">เดือน ตุลาคม</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{ number_format($in1->sum('price')) }} บาท</h6>
                                        
                                        </div>
                                    </div>
                                </li>
                                
                            
            
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Transactions -->



       <!-- Transactions -->
       <div class="col-md-12 col-lg-12 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">สรุปรายการที่ลูกค้ามาใช้บริการทั้งหมด</h5>

            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    
                        @foreach ($services as $service)
                    
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i
                                    class="fa-solid fa-check rounded"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">{{ $service->name }}</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">ใช้บริการ {{ $service->incom->count() }}</h6>
                                <span class="text-muted">ครั้ง</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--/ Transactions -->



    </div>
@endsection
