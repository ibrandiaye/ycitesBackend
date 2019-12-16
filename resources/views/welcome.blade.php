@extends('layouts.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ACCUEIL</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">BIENVENUE</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
              {{--  <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>IM</h3>

                                <p>Gestion des clients</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Consulter <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>IM<sup style="font-size: 20px">%</sup></h3>

                                <p>Calendrier de reservation</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer">Consulter <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>IM</h3>

                                <p>Stock</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Consulter <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>IM</h3>





                                <p>Restaurant</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Consulter <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>--}}
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total réclamations</span>
                                <span class="info-box-number">{{$nombreReclamation}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">réclamations du jour</span>
                                <span class="info-box-number">{{ $nombreDuJour }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-male"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Nombre de citoyens</span>
                                <span class="info-box-number">{{$nombreDeCitoyen}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-atlas"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Actualités</span>
                                <span class="info-box-number">{{$nombreActualite}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3></div>
                            <div class="card-body">
                                <canvas id="myChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div >
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3></div>
                            <div class="card-body">
                                <canvas id="myPieChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- =========================================================== -->

                </div>
        </section>
            </div>

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <script>
        var label = [];
        var donnee = [];
        var coloR = [];
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            var e = 1;
            return "rgba(" + r + "," + g + "," + b + ","+e + ")";
        };
        $(document).ready(function() {
            @foreach($reclamations as $reclamation)
            label.push('{{$reclamation->nom}}');
            donnee.push({{$reclamation->reclamation}});
            coloR.push(dynamicColors());
                    @endforeach
                     var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Nombre de réclamations par catégorie',
                        data: donnee,
                        backgroundColor: coloR,
                        borderColor: coloR,

                        borderWidth: 1
                    }]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            data = {
                datasets: [{
                    data: donnee,
                    backgroundColor: coloR,
                    borderColor: coloR
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: label
            };
            var ctx1 = document.getElementById('myPieChart');
            var myPieChart = new Chart(ctx1, {
                type: 'pie',
                data: data

            });
        });

    </script>

@endsection