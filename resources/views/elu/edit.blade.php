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
                        <h1 class="m-0 text-dark">Elu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Elu</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class='fa fa-plus'></i> Elu</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class='col-lg-4 offset-md-4'>

                            {{ Form::model($elu,array('route' => array('elu.update', $elu->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

                            <div class="form-group">
                                {{ Form::label('nom', 'Nom') }}
                                {{ Form::text('nom', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('prenom', 'Prenom') }}
                                {{ Form::text('prenom', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('telephone', 'Telephone') }}
                                {{ Form::text('telephone', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('fonction', 'Fonction') }}
                                {{ Form::text('fonction', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('profession', 'Profession') }}
                                {{ Form::text('profession', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('image', 'Image') }}
                                {!! Form::file('image', array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                <label>Genre</label>
                                <select class="form-control" name="genre" required="">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
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