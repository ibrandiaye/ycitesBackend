@extends('welcome')
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
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">{{ $reclamation->titre }}</h3>
                                <div class="col-12">
                                    <img src="{{ $reclamation->image }}" class="product-image" alt="Product Image">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{ $reclamation->titre }}</h3>
                                <p>{{ $reclamation->description }}</p>
                                @if($reclamation->audio!=null)
                                <audio controls src="{{ $reclamation->audio }}" ></audio>
                                @endif
                                <hr>
                                <h3>Information Citoyen</h3>
                                <p><i class="far fa-user"></i> {{ $reclamation->citoyen->prenom }} {{ $reclamation->citoyen->nom }}</p>
                                <p><i class="fas fa-mobile-alt"></i> {{ $reclamation->citoyen->telephone }}</p>
                                <p><i class="fas fa-at"></i> {{ $reclamation->citoyen->email }}</p>
                                <div class="mt-4">
                                    @if(!$reclamation->etat)
                                    <a class="btn btn-success btn-lg btn-flat" href="{{ route('reclamation.valider',[$reclamation->id]) }}">
                                        <i class="fas fa-check"></i>
                                        Valider
                                    </a>

                                    @endif

                                </div>
                                <br>
                                <div id="address-map" style="height: 300px"></div>

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
    <input type="hidden" value="{{ $reclamation->latitude }}" id="latitude">
    <input type="hidden" value="{{ $reclamation->longitude }}" id="longitude">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script>

        function initMap() {

            var depart = new google.maps.LatLng(parseFloat(document.getElementById('latitude').value),parseFloat(document.getElementById('longitude').value));
            var mapOptions = {
                zoom:15,
                center: depart
            };

            var map = new google.maps.Map(document.getElementById('address-map'), mapOptions);
            var contentString= "Lieu de l'incident" ;
            var infowindow = new google.maps.InfoWindow;
            marker = new google.maps.Marker({
                map: map,
                draggable: false,
                position: {lat:parseFloat(document.getElementById('latitude').value) ,lng:parseFloat(document.getElementById('longitude').value)}
            });
            infowindow.setContent(contentString);
            infowindow.open(map, marker);


        }



    </script>
@endsection