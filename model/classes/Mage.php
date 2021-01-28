<?php

class Mage extends Character
{
    public function __construct($persoName, $attackPoints){
        parent::__construct($persoName, $attackPoints);
        $this->manaPoints *= 5 ;
        $this->shield = false ;
    }
    public function takeDamage($damagePoints, $attacker){
        if ($this->shield == true) {
            echo "<p>Dégats infligés : 0</p>";
            if ($damagePoints > 0) {
                echo "<p>$this->persoName c'est protéger avec son bouclier</p>";
                $this->shield = false;
            }else {
                echo "<p>$this->persoName na pas eu besoin d'utiliser son bouclier</p>";
            }
        }elseif ($this->shield == false) {
            if (isset($damagePoints)) {
                echo "<p>Dégats infligés : ".$damagePoints."</p>";
            }
            $this->setHealthPoints($damagePoints);
        }
        return;
    }
    public function attackPrivate($attackedUser, $diceStatus){
        $chooseAtk = rand (1,10);
        if ($chooseAtk <= 3 && $this->shield == false) {
            if ($this->manaPoints >= 10) {
                return $this->diamondShield($diceStatus);
            }
        }
        if ($this->manaPoints == 0) {
            return $this->magicStaffShock($attackedUser, $diceStatus);
        }
        return $this->atkFireBall($attackedUser, $diceStatus);
    }
    public function atkFireBall($attackedUser, $diceStatus){
        $usedMana = rand(1, 20);
        if ($usedMana > $this->manaPoints) {
            $usedMana = $this->manaPoints;
        }
        $this->atkDistance = true;
        $this->manaPoints -= $usedMana;
        echo "<p>$this->persoName à utiliser $usedMana points de mana. Il lui en reste $this->manaPoints</p>";
        if ($diceStatus===1) {
            $damagePoints = $usedMana * rand(1,5) + rand(1,5);
        }elseif ($diceStatus===2) {
            $damagePoints = $usedMana * rand(1,3);
        }elseif ($diceStatus===3){
            $damagePoints = rand(0, 5);
        }

        echo "<p>$this->persoName lance une boule de feux sur $attackedUser->persoName</p>";
        return $damagePoints;
    }

    public function magicStaffShock($attackedUser, $diceStatus){
        if ($diceStatus===1) {
            $damagePoints = $this->attackPoints + rand(1,5);
        }elseif ($diceStatus===2) {
            $damagePoints = $this->attackPoints;
        }elseif ($diceStatus===3){
            $damagePoints = rand(0, 2);
        }
        echo "<p>$this->persoName na plus de points de mana, il donne un coup de baton à $attackedUser->persoName dans son derniers élan</p>";
        return $damagePoints;
    }

    public function diamondShield($diceStatus){
        if ($this->manaPoints > 10) {
            $this->manaPoints -= 10;
            if ($diceStatus===1 || $diceStatus===2 ) {
                $this->shield = true;
                echo "<p>$this->persoName à utiliser 10 de mana pour mettre en place son Diamond Magic-Shield</p>";
            }elseif ($diceStatus===3){
                echo "<p>$this->persoName à utiliser 10 de mana, mais il à loupé sont sortilège !</p>";
            }
        }
        return;
    }
};
