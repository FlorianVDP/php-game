<?php
$victoire = (int)readline("Combien de victoire voulez vous faire pour gagner ? ");
$pointJoueur = 0;
$pointPc = 0;
$choix = ['pierre','feuille','ciseau'];
while($pointJoueur !== $victoire && $pointPc !== $victoire){
    $choixPc = $choix[rand(0,2)];
    $choixJoueur = readline("\e[1;37;40m(joueur: $pointJoueur | robot: $pointPc) \e[1;33;40mPierre[1] | Feuille[2] | Ciseau[3] \e[1;37;40m");

    if ($choixJoueur === ''){
        print_r("Vous avez quitté la partie");
        break;
    }
    if ($choixJoueur === '1' && $choixPc === 'pierre'){
        print_r("\e[0;34;40m----------Égalité ! \n");
    }
    if ($choixJoueur === '1' && $choixPc === 'feuille'){
        print_r("\e[0;31;40m----------Le robot gagne ! \n");
        $pointPc++;
    }
    if ($choixJoueur === '1' && $choixPc === 'ciseau'){
        print_r("\e[0;32;40m----------Vous avez gagné ! \n");
        $pointJoueur++;
    }
    if ($choixJoueur === '2' && $choixPc === 'pierre'){
        print_r("\e[0;32;40m----------Vous avez gagné ! \n");
        $pointJoueur++;
    }
    if ($choixJoueur === '2' && $choixPc === 'feuille'){
        print_r("\e[0;34;40m----------Égalité ! \n");
    }
    if ($choixJoueur === '2' && $choixPc === 'ciseau'){
        print_r("\e[0;31;40m----------Le robot gagne !\n");
        $pointPc++;
    }
    if ($choixJoueur === '3' && $choixPc === 'pierre'){
        print_r("\e[0;31;40m----------Le robot gagne !\n");
        $pointPc++;
    }
    if ($choixJoueur === '3' && $choixPc === 'feuille'){
        print_r("\e[0;32;40m----------Vous avez gagné !\n");
        $pointJoueur++;
    }
    if ($choixJoueur === '3' && $choixPc === 'ciseau'){
        print_r("\e[0;34;40m----------Égalité !\n");
    }

}
if ($pointJoueur === $victoire){
    print_r("\e[0;32;40m--------------------Vous avez gagné la partie! \n");
}
else{
    print_r("\e[0;31;40m--------------------Le robot gagne la partie! \n");
}