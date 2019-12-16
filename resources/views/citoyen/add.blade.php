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
                        <h1 class="m-0 text-dark">Enregistrer Personne</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Enregistrer Personne</li>
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
                        <h3 class="card-title"><i class='fa fa-plus'></i> Ajouter Personne</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class='col-lg-4 offset-md-4'>

                            {{ Form::open(array('url' => 'citoyen')) }}

                            <div class="form-group">
                                {{ Form::label('nom', 'Nom') }}
                                {{ Form::text('nom', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('prenom', 'Prenom') }}
                                {{ Form::text('prenom', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('telephone', 'Telephone') }}
                                {{ Form::text('telephone', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                            <label>Type</label>
                                <select class="form-control" name="type" required="">
                                    <option value="Agent Etat">Agent Etat</option>
                                    <option value="Representant Etat">Représentant Etat</option>
                                    <option value="Responsable Suivi">Responsable Suivi</option>
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