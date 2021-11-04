<?php
$pokemons = [
    $salameche = [
        'nom' => "\e[0;30;41mSalameche\e[0;37;0m",
        'vie' => 39,
        'element' => 'feu',
        'vitesse' => 65,
        'actions' => [
            'attaque' => 12,
            'regeneration' => 5,
        ]
    ],
    $bulbizarre = [
        'nom' => "\e[0;30;42mBulbizarre\e[0;37;0m",
        'vie' => 45,
        'element' => 'plante',
        'vitesse' => 60,
        'actions' => [
            'attaque' => 10,
            'regeneration' => 7,
        ]
    ],
    $carapuce = [
        'nom' => "\e[0;30;44mCarapuce\e[0;37;0m",
        'vie' => 44,
        'element' => 'eau',
        'vitesse' => 63,
        'actions' => [
            'attaque' => 10,
            'regeneration' => 5,
        ]
    ],
    $pikachu = [
        'nom' => "\e[0;30;43mPikachu\e[0;37;0m",
        'vie' => 40,
        'element' => 'electrique',
        'vitesse' => 70,
        'actions' => [
            'attaque' => 12,
            'regeneration' => 6,
        ]
    ],
    $evoli = [
        'nom' => "\e[0;30;47mEvoli\e[0;37;0m",
        'vie' => 50,
        'element' => 'normal',
        'vitesse' => 65,
        'actions' => [
            'attaque' => 10,
            'regeneration' => 5,
        ]
    ],
];
$question = "Qui choisissez vous ? ";
foreach ($pokemons as $key => $pokemon) {
    $question .= $pokemon["nom"] . "($key) ";
}
print_r("Le combat commence !\n");
$choixJoueur = (int)readline($question);
$choixJoueur = $pokemons[$choixJoueur];
$choixPc = $pokemons[rand(0, count($pokemons) - 1)];
print_r("\n");
print_r("Vottre adversaire à choisi: " . $choixPc['nom'] . "\n");
print_r("\n");


//-----_____----- Ajustement type
if ($choixJoueur['element'] === 'eau' && $choixPc['element'] === 'plante') {
    $choixPc['actions']['attaque'] = $choixPc['actions']['attaque'] * 1.5; // faire x1,5
}
if ($choixJoueur['element'] === 'plante' && $choixPc['element'] === 'feu') {
    $choixPc['actions']['attaque'] = $choixPc['actions']['attaque'] * 1.5;
}
if ($choixJoueur['element'] === 'feu' && $choixPc['element'] === 'eau') {
    $choixPc['actions']['attaque'] = $choixPc['actions']['attaque'] * 1.5;
}
if ($choixJoueur['element'] === 'feu' && $choixPc['element'] === 'plante') {
    $choixJoueur['actions']['attaque'] = $choixJoueur['actions']['attaque'] * 1.5;
}
if ($choixJoueur['element'] === 'plante' && $choixPc['element'] === 'eau') {
    $choixJoueur['actions']['attaque'] = $choixJoueur['actions']['attaque'] * 1.5;
}
if ($choixJoueur['element'] === 'eau' && $choixPc['element'] === 'feu') {
    $choixJoueur['actions']['attaque'] = $choixJoueur['actions']['attaque'] * 1.5;
}

$compteur = 1;

$vieMaxJoueur = $choixJoueur['vie'];
$vieMaxPc = $choixPc['vie'];
function pokemonActionJoueur(){

}
while ($choixJoueur['vie'] > 0 && $choixPc['vie'] > 0) {

    print_r("Tour numéro°" . $compteur . " ---------------------------------------------\n");
    print_r("\n");
    print_r("[" . $choixPc['nom'] . " \e[0;31;40m" . $choixPc['vie'] . "pv\e[0;37;0m]\n");
    //-----_____----- Attaque joueur
    $choixAttaqueJoueur = (int)readline("[" . $choixJoueur['nom'] . " \e[0;31;40m" . $choixJoueur['vie'] . "pv\e[0;37;0m] Quelle attaque choisissez vous ? (attaque[0] | santé[1])");
    if ($choixAttaqueJoueur === 0) {
        $choixPc['vie'] = $choixPc['vie'] - $choixJoueur['actions']['attaque'];
        print_r("-- Le pokemon de votre adversaire à subit [-" . $choixJoueur['actions']['attaque'] . "pv], il lui reste [" . $choixPc['vie'] . "pv] \n");
    } else {
        if ($choixJoueur['vie'] + $choixJoueur['action']['regeneration'] < $vieMaxJoueur) {
            $choixJoueur['vie'] = $choixJoueur['vie'] + $choixJoueur['actions']['attaque'];
            print_r("-- Votre pokemon regagne " . $choixJoueur['attaque']['regeneration'] . "pv\n");
        } else {
            print_r("-- Votre pokemon à déja tous ses pv\n");
        }
    }


    //-----_____----- Attaque pc
    $choixAttaquePc = rand(0, 10);
    if ($choixAttaquePc < 8) {
        $choixJoueur['vie'] = $choixJoueur['vie'] - $choixPc['actions']['attaque'];
        print_r("-- Votre pokemon à subit -[" . $choixPc['actions']['attaque'] . "pv], il lui reste [" . $choixJoueur['vie'] . "pv] \n");
    } else {

        if ($choixPc['vie'] + $choixPc['action']['regeneration'] < $vieMaxPc) {
            $choixPc['vie'] = $choixPc['vie'] + $choixPc['actions']['regeneration'];
            print_r("-- Le pokemon de votre adversaire regagne [" . $choixPc['actions']['regeneration'] . "pv]\n");
        } else {
            print_r("-- Le pokemon à déja tous ses pv\n");
        }
    }
    print_r("\n");
    $compteur++;
}
print_r("---------------------------------------------\n");
print_r("---------------------------------------------\n");
print_r("Le combat est terminé !\n");
print_r("---------------------------------------------\n");
print_r("---------------------------------------------\n");