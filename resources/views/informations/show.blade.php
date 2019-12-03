@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Une information</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">{{ $information->titre }}</h3>
                                <div class="col-12">
                                    <img src="/images/{{ $information->image }}" class="product-image" alt="Product Image">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{ $information->titre }}</h3>
                                {!! $information->description !!}
                                <hr>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.timeline -->

        </section>
        <!-- /.content -->
    </div>

@endsection