<h1 class="signIn">Inscription</h1>
<form action="" method="POST">
    <div>
        <label for="lastname">Nom :</label>
        <p>
            <input
            type="text"
            name="lastname"
            id="lastname"
            value="<?=$lastname ?? null?>"
            pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
            required>
        </p>
        <p><?=$error['lastname'] ?? null?></p>
        
    </div>
    <div>
        <label for="firstname">Prénom :</label>
        <p>
            <input
            type="text"
            name="firstname"
            id="firstname"
            value="<?=$firstname ?? null?>"
            pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
            required>
        </p>
        <p><?=$error['firstname'] ?? null?></p>        
    </div>
    <div>
        <label for="email">Mail :</label>
        <p>
            <input
            type="text"
            name="email"
            id="email"
            value="<?=$email ?? null?>"
            pattern="^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-.]?[[:alnum:]])*\.([a-z]{2,4})$"
            required>
        </p>
        <p><?=$error['email'] ?? null?></p>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <p>
            <input
            type="password"
            name="password"
            id="password"
            value="<?=$password ?? null?>"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
            >
            <p><?=$error['password'] ?? null?></p>
        </p>        
    </div>
    <div>
        <label for="confirmpassword">Confirmer votre mot de passe :</label>
        <p>
            <input
            type="password"
            name="confirmpassword"
            id="confirmpassword"
            value="<?=$confirmpassword ?? null?>"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$">
        </p>
        <p><?=$error['confirmpassword'] ?? null?></p>
    </div>
    <div>
        <label for="phone">Numéro de téléphone : </label>
        <p>
            <input
            type="tel"
            name="phone"
            id="phone"
            value="<?=$phone ?? null?>"
            pattern="^0[1-68][0-9]{8}$">
        </p>
    </div>
    <div>
        <input type="submit" value="Valider !">
    </div>

</form>