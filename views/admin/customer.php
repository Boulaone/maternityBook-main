<div>
    <h2>Les clients</h2>
    <table class="table ">
        <thead>
        <tr>
            <th class="text-center">N° Client</th>
            <th class="text-center">Photo Profil</th>
            <th class="text-center">Pseudo</th>
            <th class="text-center">Email</th>
            <th class="text-center">Abonné</th>
            <th class="text-center">Nom & prénom</th>
            <th class="text-center">Posts</th>
            <th class="text-center">Commentaires</th>
            <th class="text-center">Statut</th>
            <th class="text-center">Semaines Grossesse</th>
            <th class="text-center">Newsletter</th>
            <th class="text-center">Démarchage Com.</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
        </thead>
        <?php

        // Connexion BDD
        include '../../_cnx/connect.php';

        try{ // Récupération  infos Users
            $queryUsers = $pdo->prepare("
            SELECT u.id_user,u.photo_profil, u.pseudo, u.email, u.nom, u.prenom, u.role, u.newsletter, u.dem_commercial, u.id_grossesse,g.abonnement, g.date_conception, g.date_regles
            FROM USER u
            LEFT JOIN GROSSESSE g on u.id_grossesse = g.id_grossesse
            ");
            $queryUsers->execute();
            $users = $queryUsers->fetchAll();
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }

        if ($error) {
            echo '<div class="alert alert-danger"><?= $error ?></div>';
        } else {
            // Ajout variables Abonnement & Semaines grossesse
            $dateActuelle = new DateTime();

            foreach ($users as $user) {
                switch ($user->role) {
                    case 'Admin':
                        $user->abo = 'admin';
                        break;
                    case 'abonne_p':
                        $user->abo = 'Oui';
                        break;
                    case 'abonne_sec':
                        $user->abo = 'Compte Parent 2';
                        break;
                    default :
                        $user->abo = 'Non';
                        break;
                }
                if ($user->date_conception) {
                    $dateConception = new DateTime($user->date_conception);
                    $diff = $dateActuelle->diff($dateConception);
                    $semaine = ceil($diff->days/7);
                    $user->semaine = $semaine;
                }else if ($user->date_regles){
                    $dateRegles = new DateTime($user->date_regles);
                    $diff = $dateActuelle->diff($dateRegles);
                    $semaine = ceil($diff->days/7) -2;
                    $user->semaine = $semaine;
                }else{
                    $user->semaine = 'Inconnu';
                }
            }
            // Génération tableau Users
            foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id_user ?></td>
                    <td><img height='100px' src='<?= $user->photo_profil ?>'></td>
                    <td><?= $user->pseudo ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->abo ?></td>
                    <td><?= $user->nom. ' '.$user->prenom ?></td>
                    <td><?php
                        //Calcul nb de Posts de chaque utilisateur
                        $queryPosts = $pdo->prepare("
                    SELECT COUNT(id_post) AS count_posts FROM POST_FORUM
                    WHERE ID_USER = :user
                    ");
                        $queryPosts->execute([
                            'user' => $user->id_user
                        ]);
                        $nbPosts = $queryPosts->fetchColumn();
                        echo $nbPosts;
                        ?></td>
                    <td><?php
                        //Calcul nb de Coms (Forum+Blog) de chaque utilisateur
                        $queryComForum = $pdo->prepare("
                    SELECT COUNT(id_com_forum) AS count_com_forum FROM COM_FORUM
                    WHERE ID_USER = :user
                    ");
                        $queryComForum->execute([
                            'user' => $user->id_user
                        ]);
                        $nbComForum = $queryComForum->fetchColumn();

                        $queryComBlog = $pdo->prepare("
                    SELECT COUNT(id_com_blog) AS count_com_blog FROM COM_BLOG
                    WHERE ID_USER = :user
                    ");
                        $queryComBlog->execute([
                            'user' => $user->id_user
                        ]);
                        $nbComBlog = $queryComBlog->fetchColumn();
                        $totalComs = $nbComForum + $nbComBlog ;
                        echo $totalComs ;
                        ?></td>
                    <td><?= $user->role ?></td>
                    <td><?= $user->semaine ?></td>
                    <td><?php if ($user->newsletter) {
                            echo 'Oui';
                        } else {
                            echo 'Non';
                        }
                        ?></td>
                    <td><?php if ($user->dem_commercial) {
                            echo 'Oui';
                        } else {
                            echo 'Non';
                        }
                        ?></td>
                    <td><button class="btn btn-primary" onclick="itemEditForm(`<?= $user->id_user ?>`)">Edit</button></td>
                    <td><button class="btn btn-danger" onclick="itemDelete(`<?= $user->id_user ?>`)">Delete</button></td>
                </tr>
            <?php
            endforeach;
        }
        /* Requête count */
        ?>
    </table>
</div>













Warning: include(../requests/select_user.php): Failed to open stream: No such file or directory in C:\Users\Alex\Developpement\maternity_book\views\new_tb_user.php on line 27

Warning: include(): Failed opening '../requests/select_user.php' for inclusion (include_path='.;C:\Windows\system32\pear') in C:\Users\Alex\Developpement\maternity_book\views\new_tb_user.php on line 27

Dashboard
Non php User
User N°
image_profil
Hello Fanny