<?php

class Archer extends Character
{
    public function __construct($persoName, $attackPoints){
        parent::__construct($persoName, $attackPoints);
        $this->distance = 300;
    }
    public function takeDamage($damagePoints, $attacker){
        if (isset($attacker->atkDistance )) {
            $testDistanceAtk = $attacker->atkDistance;
        }else{
            $testDistanceAtk = false;
        }
        if ($this->distance == "contact" || $testDistanceAtk) {
            if ($testDistanceAtk) {
                echo "<p>$this->persoName c'est prit une attaque à distance</p>";
            }else {
                echo "<p>$this->persoName est au contact de son adversaire! il prend alors le coup de plein fouet</p>";
            }
            if (isset($damagePoints)) {
                echo "<p>Dégats infligés : ".$damagePoints."</p>";
            }
            $attacker->atkDistance = false;
            $this->setHealthPoints($damagePoints);
        }else{
            echo "<p>$this->persoName est loin de son adversaire, il évite le coup.</p>";
            if ($this->distance == 100) {
                $this->distance = "contact";
                echo "<p>Il est maintenant aux contact de $attacker->persoName</p>";
            }else {
                $this->distance -= 100;
                echo "<p>Son adversaire est maintenant à $this->distance mètres de lui</p>";
            }


        }
        return;
    }
    public function attackPrivate($attackedUser, $diceStatus){
        if ($this->distance != "contact") {
            return $this->fridgeBow($attackedUser, $diceStatus);
        }else {
            return $this->dagger($attackedUser, $diceStatus);
        }
    }


    public function fridgeBow($attackedUser, $diceStatus){
        echo "<p>$this->persoName tente de tirer une fleche. Il a 1 chance sur 2 de toucher.</p>";
        if (rand(1,2)==1) {  //1 = touché
            if ($diceStatus==1) {
                $damagePoints = $this->attackPoints*2 + rand(1,5);
                echo "<p>$this->persoName tire sa flèche du haut de sa coline sur $attackedUser->persoName</p>";
                return $damagePoints;
            }elseif ($diceStatus==2) {
                $damagePoints = $this->attackPoints*2;
                echo "<p>$this->persoName tire sa flèche du haut de sa coline sur $attackedUser->persoName</p>";
                return $damagePoints;
            }

        }else {
            if ($diceStatus==1) {
                echo "<p>$this->persoName tire sa flèche du haut de sa coline et touche de peux la jambe de $attackedUser->persoName</p>";
                $damagePoints = $this->attackPoints*2 + rand(1,5);
                return $damagePoints;
            }
        }
        $damagePoints = 0;
        echo "<p>$this->persoName tire une flèche du haut de sa coline sur $attackedUser->persoName, mais il rate sa cible</p>";
        return $damagePoints;
    }
    public function dagger($attackedUser, $diceStatus){
        if ($diceStatus===1) {
            $damagePoints = $this->attackPoints + rand(5,10);
        }elseif ($diceStatus===2) {
            $damagePoints = $this->attackPoints + rand(1,5);
        }elseif ($diceStatus===3){
            $damagePoints = rand(0, 5);
        }
        if ($damagePoints ==0) {
            echo "<p>$this->persoName à tenté de planté sa dague dans $attackedUser->persoName, mais il à tribucher et raté sa cible</p>";
        }else{
            echo "<p>$this->persoName à planté sa dague dans $attackedUser->persoName</p>";
        }

        return $damagePoints;
    }
}
