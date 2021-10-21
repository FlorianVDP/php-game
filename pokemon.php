<?php
$salameche = [
    'nom' => "\e[0;31;40mSalameche",
    'vie' => (int)10,
    'element' => 'feu',
    'attaques' => [
        'flamèche' => (int)2,
        'bisoux magique' => (int)1.5,
    ]
];
$bulbizarre = [
    'nom' => "\e[0;32;40mBulbizarre",
    'vie' => (int)10,
    'element' => 'plante',
    'attaques' => [
        'liane' => (int)2,
        'liqueur' => (int)1.5,
    ]
];
$carapuce = [
    'nom' => "\e[0;34;40mCarapuce",
    'vie' => (int)10,
    'element' => 'eau',
    'attaques' => [
        'bulle do' => (int)2,
        'aqua-bisous' => (int)1.5,
    ]
];
$pokemons = [$salameche,$bulbizarre,$carapuce];
print_r("Le combat commence !\n");
$choixJoueur = (int)readline("Qui choisissez vous ? ".$pokemons[0]['nom']."[0]\e[1;37;40m, ".$pokemons[1]['nom']."[1] \e[1;37;40mou ".$pokemons[2]['nom']."[2]\e[1;37;40m ?");
$choixJoueur = $pokemons[$choixJoueur];
$choixPc = $pokemons[rand(0,2)];
print_r("\e[1;37;40mVottre adversaire à choisi: ".$choixPc['nom']."\n");
if ($choixJoueur['element'] === 'eau' && $choixPc['element'] === 'plante'){
    $choixPc['attaques'][0] = 3;
}
if ($choixJoueur['element'] === 'plante' && $choixPc['element'] === 'feu'){
    $choixPc['attaques'][0] = 3;
}
if ($choixJoueur['element'] === 'feu' && $choixPc['element'] === 'eau'){
    $choixPc['attaques'][0] = 3;
}
if ($choixJoueur['element'] === 'feu' && $choixPc['element'] === 'plante'){
    $choixJoueur['attaques'][0] = 3;
}
if ($choixJoueur['element'] === 'plante' && $choixPc['element'] === 'eau'){
    $choixJoueur['attaques'][0] = 3;
}
if ($choixJoueur['element'] === 'eau' && $choixPc['element'] === 'feu'){
    $choixJoueur['attaques'][0] = 3;
}
$compteur = 1;

while(!$choixJoueur <= 0 && !$choixPc <=0){
    print_r("\e[1;37;40mTour numéro°".$compteur. " ---------------------------------------------\n");
    print_r("\n");
    $choixAttaqueJoueur = (int)readline("[\e[1;37;40m".$choixJoueur['nom']." \e[1;37;40m|\e[1;37;40m "."".$choixJoueur['vie']."pv] Quelle attaque choisissez vous ? (attaque[0] | santé[1])");
    if ($choixAttaqueJoueur === 0){
        $choixPc['vie'] = $choixPc['vie'] - $choixJoueur['attaques'][0];
        print_r("\e[1;37;40mLe pokemon de votre adversaire [".$choixPc['nom']."\e[1;37;40m à subit -".$choixJoueur['attaques'][0]." ]\n");
        print_r("\e[1;37;40mIl lui reste ".$choixPc['vie']."pv \n");
    }else{
        $choixJoueur['vie'] = $choixJoueur['vie'] + $choixJoueur['attaques'][0];
        print_r($choixJoueur['nom']." \e[1;37;40mregagne ".$choixJoueur['attaque'][1]."pv\n");
    }
    $choixAttaquePc = rand(0,1);
    if ($choixAttaquePc === 0){
        $choixJoueur['vie'] = $choixJoueur['vie'] - $choixPc['attaques'][0];
        print_r("\e[1;37;40mVotre pokemon [".$choixJoueur['nom']." \e[1;37;40mà subit -".$choixPc['attaques'][0]." ]\n");
        print_r("\e[1;37;40mIl lui reste ".$choixJoueur['vie']."pv \n");
    }else{
        $choixPc['vie'] = $choixPc['vie'] + $choixPc['attaques'][0];
        print_r($choixPc['nom']." \e[1;37;40mregagne ".$choixPc['attaques'][1]."pv\n");
    }
    print_r("\n");
    $compteur++;
}
print_r('Le combat est terminé !');