<?php
/* QUELQUES FONCTIONS*/

    /* Ajoute le sel et le poivre */
    function saltingData($dataToSalt){
        $pepper='projetarceau'; //placé au début
        $salt='ensea'; //placé à la fin
        return $pepper.$dataToSalt.$salt;
    }

    /* Chiffre la data */
    function cryptData($dataToCrypt){
        return password_hash(saltingData($dataToCrypt), PASSWORD_DEFAULT );
    }

    /* Verifie la data */
    function verifyDataCrypted($dataToVerify,$dataCorrespondance){
        return password_verify(saltingData($dataToVerify),$dataCorrespondance);
    }





    
