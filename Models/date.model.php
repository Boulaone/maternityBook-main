<?php

$dateActuelle = new DateTime();

// Tableaux jours semaine et mois en français
$semaineTab = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$moisTab = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

// Récupération du jour de la semaine actuel en français
$jourNom = $semaineTab[intval($dateActuelle->format('N')) -1];

// Récupération du mois actuel en français
$moisNom = $moisTab[intval($dateActuelle->format('m')) -1];

// Récupération du numéro du jour

$jourNb = $dateActuelle->format('d');

// Récupération des numéros du mois et de l'année en cours
$mois = $dateActuelle->format('m');
$annee = $dateActuelle->format('Y');

// Récupération du premier jour de la semaine
$jourSemaine = clone $dateActuelle;
$jourSemaine->modify('this week');
