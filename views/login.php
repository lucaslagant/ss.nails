<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="text-center my-5">Connexion</h1>

            <?= $errorsArray['global'] ?? '' ?>
            
            <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" id="formLogin">

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group form-outline">
                        <div class="input-group-text" id="inputGroupPrepend">@</div>
                        <input type="email" autocomplete="mail" value="" class="form-control" id="mail" name="mail"
                            required />

                    </div>
                    <div class="invalid-feedback-2"><?=$errorsArray['email_error'] ?? ''?></div>
                </div>


                <div class="mb-4">
                    <div class="form-outline">
                        <label for="password" class="form-label">Mot de Passe</label>
                        <input type="password" value="" class="form-control" id="password" name="password" required />
                    </div>
                </div>

                <input type="submit" value="Connexion">


            </form>

        </div>
    </div>


</div>