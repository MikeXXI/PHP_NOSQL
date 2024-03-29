<?php 
include('header.php'); 
// Permet d'inclure le code html ainsi que le code php de header.php ( qui contient le code html et php de la barre de navigation )
?>


<?php
/* Vérifie si l'e-mail et le mot de passe sont définis et s'ils le sont, il vérifie si l'e-mail et le
mot de passe sont dans la base de données. Si tel est le cas, il définit la session user_id sur
l'identifiant de l'utilisateur. Sinon, il affiche un message d'erreur. */
if (isset($_POST["typeEmailX"]) && isset($_POST["typePasswordX"])) {
    $user = $db->users->findOne(array("email" => $_POST["typeEmailX"], "password" => $_POST["typePasswordX"]));

    if ($user != null) {
        $_SESSION["user_id"] = $user["_id"];
    } else {
        echo "Erreur de connexion";
    }
}

/* Vérifier si l'utilisateur est connecté. S'il l'est, il le redirige vers la page d'index. Si ce n'est
pas le cas, il affiche le formulaire de connexion. */
if (isset($_SESSION["user_id"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
} else {
    echo '
<body>
    <br />
    <section class="gradient-custom" style="width: 100%;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form method="POST" action="connexion.php" enctype="multipart/form-data">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Connectez vous en entrant votre identifiant et mot de passe</p>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" name="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label">Password</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
';
}
?>

</html>
<!-- <a href="inscription.php"><button class="btn btn-outline-light btn-lg px-5">Inscription</button></a> -->