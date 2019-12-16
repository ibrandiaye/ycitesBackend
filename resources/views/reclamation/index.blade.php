@extends('layouts.layout')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Réclamation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Réclamation</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12">
                        @foreach($reclamations as $reclamation)
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">{{ $reclamation->created_at }}</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        {{--<span class="time"><i class="fas fa-clock"></i> 12:05</span>--}}
                                        <h3 class="timeline-header"><a href="#"> {{ $reclamation->categorie->nom }}</a> </h3>

                                        <div class="timeline-body">
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                                <li class="item">
                                                    <div class="product-img">
                                                        <img src="{{ $reclamation->image }}" alt="Product Image" style="height: 110px; width: 75px;">
                                                    </div>
                                                    <div class="product-info">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="product-title">{{ $reclamation->categorie->nom }}
                                                            @if($reclamation->etat)
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success float-right">Approuvé</span></a>
                                                            @else
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger float-right">Non approuvé</span></a>
                                                            @endif
                                                            <span class="product-description">
                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $reclamation->description }}
                                                          </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-footer">
                                            <p><i class="far fa-user"></i> {{ $reclamation->citoyen->prenom }} {{ $reclamation->citoyen->nom }}, <i class="fas fa-mobile-alt"></i> {{ $reclamation->citoyen->telephone }} </p>
                                            <a class="btn btn-primary btn-sm" href="{{ route('reclamations.show',[$reclamation->id]) }}">
                                                Détail
                                            </a>
                                            @if(!$reclamation->etat)  <a class="btn btn-success btn-sm" href="{{ route('reclamation.valider',[$reclamation->id]) }}">Approuver</a>@endif
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- /.col -->
                </div>
            </div>
            <!-- /.timeline -->

        </section>
        <!-- /.content -->
    </div>
@endsection