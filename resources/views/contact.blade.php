@extends('layouts.app')

@section('content')
    <h1 class="title_h1 text-center mx-auto">Nous contacter</h1>

    <!-- =================== BLOC HORAIRES D'OUVERTURE ====================== -->

    <!-- ===== TITRE ===== -->

    <h3 class="text-center pt-5 my-5">Horaires d'ouverture du magasin</h3>

    
    <div class="container pt-3">
        <div class="row">

            <!-- ===== TABLEAU ===== -->

            <div class="col-lg-6">
                <div class="pt-3">
                    <div class="tableau table-responsive my-5">
                        <table class="table table-striped mb-0 mx-auto">

                            <thead class="thead-dark">
                                <tr>
                                    <th>Jour</th>
                                    <th>Matin</th>
                                    <th>Après-midi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-center">
                                    <td>Lundi</td>
                                    <td class="fw-bolder text-danger">Fermé</td>
                                    <td>15:00 - 19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Mardi</td>
                                    <td>09:00–13:00</td>
                                    <td>15:00–19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Mercredi</td>
                                    <td>09:00–13:00</td>
                                    <td>15:00–19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Jeudi</td>
                                    <td>09:00–13:00</td>
                                    <td>15:00–19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Vendredi</td>
                                    <td>09:00–13:00</td>
                                    <td>15:00–19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Samedi</td>
                                    <td>09:00–13:00</td>
                                    <td>15:00–19:00</td>
                                </tr>

                                <tr class="text-center">
                                    <td>Dimanche</td>
                                    <td class="fw-bolder text-danger">Fermé</td>
                                    <td class="fw-bolder text-danger">Fermé</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- ===== IMAGE ===== -->

            <div class="col-lg-6 mt-5">
                <img src="{{ asset('images/entree.jpg') }}" class="photo_contact d-block w-100" alt="entrée du magasin">
            </div>

        </div>

        <!-- =================== BLOC COORDONNEES ====================== -->

       <!-- ===== TITRE ===== -->

       <h3 class="text-center pt-5 my-5">Nos coordonnées</h3>
       
       
        <div class="container pt-5">
            <div class="row">

                
                <!-- ===== IMAGE ===== -->

                <div class="col-lg-6 mt-5">
                    <img src="{{ asset('images/rayon.jpg') }}" class="photo_contact d-block w-100" alt="rayondu magasin">
                </div>


                <!-- ===== TABLEAU ===== -->
                
                <div class="col-lg-6">
                    <div class="coordonnees">
                        <div class="tableau table-responsive my-5">
                            <table class="table table-striped mb-0 mx-auto">

                                <thead class="thead-dark">
                                    <tr>
                                        <th>Adresse</th>
                                        <th>Téléphone / email</th>           
                                        <th>Réseau social</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="text-center">
                                        <td>56 Av. du 11 Novembre 1918, 17300 Rochefort</td>
                                        <td>05.46.87.09.76 / anniefruits17@gmail.com</td>
                                        <td>
                                            <a
                                                href="https://www.facebook.com/people/annie-fruits/100067000605161/?locale=fr_FR">
                                                <i class="logo-facebook fa-brands fa-square-facebook"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
               

                <!-- =================== CARTE GOOGLE MAP ====================== -->

                <div class="container-md-fluid pt-5">

                    <h3 class="text-center my-5">Carte Google Map</h3>

                    <div class="map text-center py-5">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d583.4219088783976!2d-0.9597313708109125!3d45.926543991041264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480140436376830f%3A0x4d915c440a2820f8!2sAnnie%20Fruits!5e0!3m2!1sfr!2sfr!4v1693380681876!5m2!1sfr!2sfr"
                            height="600" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
        </div>
            @endsection
