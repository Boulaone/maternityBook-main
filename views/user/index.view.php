<?php

require base_path('views/includes/user.layout.php');
$pourcentageLivre = 38;
?>
    <main id="tb_user">
        <section id="tb_gauche">
            <article id="tb_profil">
                <img src="/assets/img/img_profil.jpg" alt="image_profil">
                <div>
                    <h4>Hello <span><?= $user->prenom ?></span></h4>
                    <p>Vous êtes à <span>
                        <?php
                        echo $user->semaine;
                        if ($user->semaine > 1) {
                            echo ' semaines et ';
                        } else {
                            echo ' semaine et ';
                        }

                        echo $user->jour;
                        if ($user->semaine > 1) {
                            echo ' jours de Grossesse';
                        } else {
                            echo ' jour de Grossesse';
                        }
                        ?></span></p>
                    <div id="bulles_profil">
                        <?php
                        $count = 0;
                        foreach ($bebes as $bebe) {
                            if ($count >= 5) {
                                echo '<div class="bulle bulle_bebe">Babies<p>...</p></div>';
                                break;
                            }
                            if ($bebe->sexe === 'F') {
                                echo '<div class="bulle bulle_F">Baby
                                <p>Girl</p></div>';
                            } else if ($bebe->sexe === 'M') {
                                echo '<div class="bulle bulle_M">Baby
                                <p>Boy</p></div>';
                            } else {
                                echo '<div class="bulle bulle_bebe">Baby</div>';
                            }
                            $count++;
                        }
                        if (!isset($bebe)) {
                            echo '<div class="bulle bulle_bebe">Baby
                            <p>';
                        } ?>
                    </div>
                    <div class="bulle bulle_enfants">
                        <?php
                        if ($enfants == null) {
                            echo '1er <p>Enfant</p>';
                        } else {
                            echo (count($enfants) + 1) . 'e';
                            if ($bebes > 1) {
                                $bebeSupp = (count($enfants) + 2);
                                for ($i = $bebeSupp; $i < $bebeSupp + 2; $i++) {
                                    echo ', ' . $i . 'e';
                                }
                                echo '<p>Enfants</p>';
                            } else {
                                echo '<p>Enfant</p>';
                            }
                        } ?>
                    </div>
                </div>
                <div class="bulle bulle_forum">
                    Forum <p><?= $user->pseudo ?></p>
                </div>
            </article>
            <article id="mon_semainier">
                <div>
                    <h4>Mon Semainier</h4>
                    <p>Complétez votre Livre Digital chaque semaine afin de profiter de toutes nos fonctionnalités</p>
                </div>
                <div id="pourcentage_semainier"><?= $pourcentageSemainier ?> %</div>
            </article>
            <article>
                <h4>Mon Suivi de poids</h4>
                <p></p>
                <img src="#" alt="cadenas">
            </article>
        </section>
        <section id="tb_droite">
            <article>
                <h5><?php echo $moisNom . ' ' . $annee; ?></h5>
                <div id="mini-calend">
                    <?php
                    // Affiche chaque jour de la semaine et ajoute une class sur le jour actuel en fonction de la date actuelle
                    for ($i = 0; $i < 7; $i++) {
                        $jourMin = substr($semaineTab[intval($jourSemaine->format('N')) - 1], 0, 3);
                        $jourNum = $jourSemaine->format('d');
                        echo '<div class="mini-jour';
                        if ($jourSemaine->format('Y-m-d') === $dateActuelle->format('Y-m-d')) {
                            echo ' jour-actuel';
                        }
                        echo '">
                    <p>' . $jourMin . '</p>
                    <p>' . $jourNum . '</p>
                    </div>';
                        $jourSemaine->modify('+1 day');
                    }
                    ?>
                </div>
            </article>
            <article>
                <?php
                // Affiche les 3 prochains RDV
                foreach ($prochainsRdvs as $rdv) {
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $rdv->date);
                    $heure = $date->format('H\hi');
                    $jourSemaine = $semaineTab[intval($date->format('N')) - 1];
                    $jour = $date->format('d');
                    $mois = $moisTab[intval($date->format('n')) - 1];
                    $annee = $date->format('Y');
                    echo '<div class="mini-event">
            <div class="event-heure">' . $heure . '</div>
            <div class="event">
            <p class="event-date">' . $jourSemaine . ' ' . $jour . ' ' . $mois . ' ' . $annee . '</p>
            <p class="event-body">' . $rdv->titre . '</p>
            </div>
            </div>';
                }
                ?>
            </article>
            <article id="tb_livre">
                <h4 id="titre_livre">Votre Livre Digital est rempli à</h4>
                <div class="circle">
                    <p><?= $pourcentageLivre ?>%</p>
                    <svg>
                        <circle class="progress" cx="50%" cy="50%" r="90" />
                    </svg>
                </div>

            </article>
        </section>
    </main>
    <script>
        var pourcentageLivre = <?= $pourcentageLivre ?>;
    </script>
<?php
echo $footer;
