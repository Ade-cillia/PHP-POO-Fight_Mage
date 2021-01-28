<?php

class Warrior extends Character
{
    public function __construct($persoName, $attackPoints){
        parent::__construct($persoName, $attackPoints);
        $this->rage = false ;
    }

    public function takeDamage($damagePoints, $attacker){
        $this->setHealthPoints($damagePoints);
        if (isset($damagePoints)) {
            echo "<p>Dégats infligés : ".$damagePoints."</p>";
        }
        return;
    }
    public function attackPrivate($attackedUser, $diceStatus){
        $chooseAtk = rand (1,10);
        if ($chooseAtk <= 2 && $this->rage == false) {
            return $this->rage();
        }else{
            return $this->atkLightningSword($attackedUser, $diceStatus);
        }
    }

    public function atkLightningSword($attackedUser, $diceStatus){
        if ($this->rage == true) {
            $rageAtk = rand(15, 25)/10;
            $this->rage = false;
            echo "<p>la rage est à $rageAtk</p>";
        }else{
            $rageAtk = 1;
        }
        echo "<p>$this->persoName à donner un coup d'épée à $attackedUser->persoName</p>";
        if ($diceStatus===1) {
            $damagePoints = $this->attackPoints*$rageAtk + rand(5,10);
        }elseif ($diceStatus===2) {
            $damagePoints = $this->attackPoints*$rageAtk + rand(1,5);
        }elseif ($diceStatus===3){
            $damagePoints = rand(0, 5)*$rageAtk;
            echo "<p>Il touche de peux sa cible</p>";
        }


        return round($damagePoints);
    }
    public function rage(){
        $this->rage = true;
        echo "<p>$this->persoName prépare sa rage !</p>";
        return;
    }
}
