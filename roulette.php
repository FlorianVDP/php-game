<?php
$nbTours = readline('Combien de tours voulez vous faire ? : ');

for ($i = 1; $i <= $nbTours; $i++) {
    $play = readline("\e[1;37;40mAppuyez sur ENTRER pour jouer");
    if ($play === '') {
        $boom = rand(1, 6);
        if ($boom === 1) {
            print_r("\e[0;31;40m---------------- BIM BAM BOOM ! (Vous avez perdu) ---------------- \n");
            die();
        } else {
            print_r("\e[0;32;40mVous avez surcevu ! \n");
        }
    }
    if($i === $nbTours){
        print_r("\e[0;32 1;37;47m---------------- Vous avez gagné ----------------");
    }
}
?>
