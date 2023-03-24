<?php 
include('header.php'); 
// Permet d'inclure le code html ainsi que le code php de header.php ( qui contient le code html et php de la barre de navigation )
?>

<!-- Html pour recuperer les informations pour la future page d'inscription -->
<body>
    <br />
    <section class="gradient-custom" style="width: 100%;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Inscription</h2>
                                <p class="text-white-50 mb-5">Renseignez les informations pour vous inscrire</p>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="userName" class="form-control form-control-lg" />
                                    <label class="form-label" for="userName">Nom</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="userLastName" class="form-control form-control-lg" />
                                    <label class="form-label" for="userLastName">Prénom</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX2">Vérifaction Password</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>