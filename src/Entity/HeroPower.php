<?php
// ./src/Entity/HeroPower.php

namespace src\Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
* @Entity(repositoryClass="BugRepository")
* @Table(name="sh_hero_power")
**/
class HeroPower{
    /**
     * 
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $heroPowerID;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerHeroID;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerPowerID;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerLevelID;
    
    function getHeroPowerID() {
        return $this->heroPowerID;
    }

    function getHeroPowerHeroID() {
        return $this->heroPowerHeroID;
    }

    function getHeroPowerPowerID() {
        return $this->heroPowerPowerID;
    }

    function getHeroPowerLevelID() {
        return $this->heroPowerLevelID;
    }

    function setHeroPowerID($heroPowerID) {
        $this->heroPowerID = $heroPowerID;
    }

    function setHeroPowerHeroID($heroPowerHeroID) {
        $this->heroPowerHeroID = $heroPowerHeroID;
    }

    function setHeroPowerPowerID($heroPowerPowerID) {
        $this->heroPowerPowerID = $heroPowerPowerID;
    }

    function setHeroPowerLevelID($heroPowerLevelID) {
        $this->heroPowerLevelID = $heroPowerLevelID;
    }


    

    //************************** Method ********************************************/

    /**
     * @param $datas for hydrate the DTO from the database
     * @return nothing
     */
    public function hydrate($datas){
        foreach ($datas as $key => $value){
            $newKey = '';
            $underScore = false;
            $ii=0;
            while ( $ii < strlen($key)){
                if($key[$ii]==='_'){
                    $underScore = true;
                }else{
                    if($underScore){
                        $newKey .= strtoupper($key[$ii]);
                        $underScore = false;
                    }else {
                        $newKey .= $key[$ii];
                    }
                }
                $ii++;
            }
            $newKey = 'set'.ucfirst($newKey);
            if(method_exists($this,$newKey)){
                $this->$newKey($value);
            }
        }
        return null;
    }

}