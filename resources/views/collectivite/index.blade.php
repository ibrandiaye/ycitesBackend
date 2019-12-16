@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Collectivité</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Collectivité</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-10 offset-lg-1">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-striped">

                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Superficie</th>
                                                <th>Population</th>
                                                <th>Densite</th>
                                                <th>region</th>
                                                <th>Téléphone</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$collectivite->designation}}</td>
                                                    <td>{{$collectivite->superficie}}</td>
                                                    <td>{{$collectivite->population}}</td>
                                                    <td>{{$collectivite->densite}}</td>
                                                    <td>{{$collectivite->region}}</td>
                                                    <td>{{$collectivite->telephone}}</td>
                                                    <td>


                                                        <a href="{{ URL::to('collectivite/'.$collectivite->id.'/edit') }}" class="btn btn-warning pull-left" ><i class="far fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection