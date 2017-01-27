<?php
// ./src/Entity/HeroPower.php

namespace src\Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
* @Entity
* @Table(name="sh_hero_power")
**/
class HeroPower{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="hero_power_id")
     */
    private $heroPowerId;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerHeroId;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerPowerId;
    
    /**
     * @Column(type="integer") 
     */
    private $heroPowerLevelId;
    
    function getHeroPowerId() {
        return $this->heroPowerId;
    }

    function getHeroPowerHeroId() {
        return $this->heroPowerHeroId;
    }

    function getHeroPowerPowerId() {
        return $this->heroPowerPowerId;
    }

    function getHeroPowerLevelId() {
        return $this->heroPowerLevelId;
    }

    function setHeroPowerId($heroPowerId) {
        $this->heroPowerId = $heroPowerId;
    }

    function setHeroPowerHeroId($heroPowerHeroId) {
        $this->heroPowerHeroId = $heroPowerHeroId;
    }

    function setHeroPowerPowerId($heroPowerPowerId) {
        $this->heroPowerPowerId = $heroPowerPowerId;
    }

    function setHeroPowerLevelId($heroPowerLevelId) {
        $this->heroPowerLevelId = $heroPowerLevelId;
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