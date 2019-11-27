{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Create Permission')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Enregistrer Categorie</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Enregistrer Categorie</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class='fa fa-edit'></i> Modifier Categorie</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                <div class='col-lg-5 offset-md-4'>

                    {{ Form::model($categorie,array('route' => array('categories.update', $categorie->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('nom', 'Nom') }}
                        {{ Form::text('nom',null, array('class' => 'form-control','required' => 'true')) }}
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