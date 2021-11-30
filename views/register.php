<div class="row">
    <div class="col-6">
        <img  class="imgInscription" src="/assets/img/ongle3.jpg" alt="ongle Orange">
    </div>
    <div class=" col-6 text-center">
        <form action="" method="post">
            <label class="formulaire" for="lastname">Nom : </label>
            <p>
                <input
                type="text"
                name="lastname"
                id="lastname"
                value="<?=$lastname?>"
                pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
                required
                >
                <div class="invalid-feedback-2"><?=$error['lastname'] ?? ''?></div>
            </p>
            <label class="formulaire" for="firstname">Prénom : </label>
            <p>
                <input
                type="text"
                name="firstname"
                id="firstname"
                value="<?=$firstname?>"
                pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
                required
                >
                <div class="invalid-feedback-2"><?=$error['firstname'] ?? ''?></div>           
            </p>   
            <label class="formulaire" for="Email">Email : </label>
            <p>
                <input
                type="text"
                name="email"
                id="email"
                value="<?=$email?>"
                pattern="<?=REGEX_EMAIL?>"
                required
                >
                <div class="invalid-feedback-2"><?=$error['email'] ?? ''?></div>         

            </p>
            <label class="formulaire" for="password">Password : </label>
            <p>
                <input
                type="password"
                name="password"
                id="password"
                value=""
                required
                >
            </p>
            <label class="formulaire" for="confirmPassword">Confirm Password : </label>
            <p>
                <input
                type="password"
                name="confirmPassword"
                id="confirmPassword"
                value=""
                required
                >
            </p> 
            <input type="submit" value="Validé">   
        </form>        
    </div>
</div>

