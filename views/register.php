<div class="row">
    <div class="col-6">
        <img  class="imgInscription" src="/assets/img/ongle3.jpg" alt="ongle Orange">
    </div>
    <div class=" col-6 text-center">
        <form action="" method="post">
            <label class="formulaire" for="lastname_user">Nom : </label>
            <p>
                <input
                type="text"
                name="lastname_user"
                id="lastname_user"
                value=""
                pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
                required
                >
                <div class="invalid-feedback-2"><?=$error['lastname_user'] ?? ''?></div>
            </p>
            <label class="formulaire" for="firstname_user">Prénom : </label>
            <p>
                <input
                type="text"
                name="firstname_user"
                id="firstname_user"
                value=""
                pattern="[A-Za-z-éèêëàâäôöûüç' ]+$"
                required
                >
                <div class="invalid-feedback-2"><?=$error['firstname_user'] ?? ''?></div>           
            </p>   
            <label class="formulaire" for="mail">Email : </label>
            <p>
                <input
                type="text"
                name="mail"
                id="mail"
                value=""
                pattern="^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-.]?[[:alnum:]])*\.([a-z]{2,4})$"
                required
                >
                <div class="invalid-feedback-2"><?=$error['mail'] ?? ''?></div>         

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

