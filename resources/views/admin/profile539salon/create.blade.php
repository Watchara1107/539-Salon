@extends('layouts.master_backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="text-center">
        <div class="col-xl-12">
            <div class="card mb-4">
                <h5 class="card-header">เพิ่มผลงานของร้าน</h5>
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
                    <form method="post" action="{{ route('store.multi.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input name="multi_image[]" class="form-control" type="file" id="image"
                                    multiple="">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                            <div class="col-12">
                                <img id="showImage" class="rounded avatar-lg" src="{{ url('forntend\assets\images\no_image.jpg') }}"
                                    alt="Card image cap" >
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image">
                    </form>

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
