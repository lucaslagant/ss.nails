<table class="tableau-style">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Modifier votre compte</th>
            <th>Supprimer votre compte</th>          
          
        </tr>
    </thead>
    <tbody>
        <?php
            $i=0;            
            foreach ($userArray as $user) {
                $i++;                
                echo '<tr>
                    <td>'.$user->lastname_user.'</td>                 
                    <td>'.$user->firstname_user.'</td>
                    <td>'.$user->mail.'</td>
                    <td><img class=icon src="https://img.icons8.com/ios-glyphs/30/000000/edit--v1.png"/></td>
                    <td><img class=icon src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/></td>
                    </tr>';
            }
        ?>
        
    </tbody>
</table>