@extends('layouts.master_backend')
@section('content')
<!-- Content wrapper -->
      <div class="row">
        <div class="col-lg-4 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="{{ asset('backend/assets/img/icons/unicons/chart-success.png') }}"
                        alt="chart success"
                        class="rounded"
                      />
                    </div>
                    <div class="dropdown">
                     
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                       
                      </div>
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">จำนวนคิวที่จองทั้งหมด</span>
                
                  <h3 class="card-title mb-2">{{ $book->count() }} คิว</h3>
              
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="{{ asset('backend/assets/img/icons/unicons/wallet-info.png') }}"
                        alt="Credit Card"
                        class="rounded"
                      />
                    </div>
                    <div class="dropdown">
                     
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                       
                      </div>
                    </div>
                  </div>
                  <span>จำนวนรายได้ทั้งหมดของร้าน</span>
                  <h3 class="card-title text-nowrap mb-1">{{number_format($incom->sum('price')) }} บาท</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Total Revenue -->

        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
          <div class="row">
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('backend/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                    </div>
                    <div class="dropdown">
                     
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                       
                      </div>
                    </div>
                  </div>
                  <span class="d-block mb-1">จำนวนรายจ่ายทั้งหมดของร้าน</span>
                  <h3 class="card-title text-nowrap mb-2">{{number_format($expenses->sum('price')) }} บาท</h3>
                </div>
              </div>
            </div>
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('backend/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                    </div>
                    <div class="dropdown">
                      
                      <div class="dropdown-menu" aria-labelledby="cardOpt1">
                       
                      </div>
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">จำนวนผลงานของร้าน</span>
                  <h3 class="card-title mb-2">{{$profile->count() }} ภาพ</h3>
                </div>
              </div>
            </div> 
          </div>
        </div> 




   
@endsection