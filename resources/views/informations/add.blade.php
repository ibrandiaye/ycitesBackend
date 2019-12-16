{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.layout')

@section('title', '| Create Permission')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Enregistrer Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Enregistrer Information</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif

                @if (count($errors) > 0)

                    <div class="alert alert-danger">

                        <strong>Whoops!</strong> There were some problems with your input.

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                    @endif

                            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class='fa fa-plus'></i> Ajouter Information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class='col-lg-6 offset-md-3'>

                            {{ Form::open(array('url' => 'informations','enctype'=>'multipart/form-data')) }}

                            <div class="form-group">
                                {{ Form::label('titre', 'Titre') }}
                                {{ Form::text('titre', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                <textarea name="description" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                {{ Form::label('photo', 'Image') }}
                                {!! Form::file('photo', array('class' => 'form-control')) !!}
                            </div>
                            {{ Form::submit('Enregitrer', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection