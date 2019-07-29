<div id="login">
    <form class="form-signin" method="post" action="">
        <?php if (isset($error) ) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif;?>
        <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
        <label for="inputEmail" class="sr-only">Nom utilisateur</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Nom utilisateur" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" name="password" id="inputPassword" class="form-control mt-2" placeholder="Mot de passe" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        <p class="mt-5 mb-3 text-muted">Copyright© 2019</p>
    </form>
</div>