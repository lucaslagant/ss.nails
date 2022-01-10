<div class="text-center">
    <h1>Modifer un patient</h1>
    <form action="" method="POST">
        <label for="lastname">Entrée le nom du patient :</label>
        <p>
            <input
            type="text"
            name="lastname"
            id="lastname"
            value="<?=$lastname ?? ""?>"
            pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '\-]+$"
            placeholder="Nom"
            required
            >
        </p>
        <p><?=$error['lastname'] ?? null?></p>
        <label for="firstname">Entrée le prénom du patient :</label>
        <p>
            <input
            type="text"
            name="firstname"
            id="firstname"
            value="<?=$firstname ??""?>"
            pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '\-]+$"
            placeholder="Prénom"
            required
            >
        </p>
        <p><?=$error['firstname'] ?? null?></p>        
        
        <label for="mail">Votre Mail :</label>
        <p>
            <input
            type="mail"
            name="mail"
            id="mail"
            value="<?=$mail ?? ""?>"
            placeholder="Mail"
            required
            >
        </p>
        <p><?=$error['mail'] ?? null?></p>       
             
        <input type="submit" value="Modifier">
                
    </form>
</div>