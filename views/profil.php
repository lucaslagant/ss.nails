<table class="tableau-style">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
                    
          
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
                    </tr>';
            }
        ?>
        
    </tbody>
</table>
<div class="modifpatient">
<a href="<?="/controllers/update-user-controller.php?user='.$user->id.'"?>"><button>Modifier vos information</button></a>
</div>