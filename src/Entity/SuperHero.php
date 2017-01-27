<?php

namespace src\Entity;

/**
* @Entity
* @Table(name="sh_hero")
**/
class SuperHero
{
    /******************* Attributs *******************/
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer", name="hero_id")
    **/
    private $heroID;
    /**
    * @Column(type="string")
    **/
    private $heroFirstName;
    /**
    * @Column(type="string")
    **/
    private $heroLastName;
    /**
    * @Column(type="string")
    **/
    private $heroPseudo;
    /**
    * @Column(type="string")
    **/
    Private $heroCountry;
    /**
    * @Column(type="integer")
    **/
    private $heroTeamId;
    /**
    * @Column(type="integer")
    **/
    private $superPowers = [];

    /****************** Method ***********************/

    public function hydrate($datas){
        foreach ($datas as $key => $value){
            $newKey = '';
            $flag = false;
            $ii=0;
           while ( $ii < strlen($key)){
                if($key[$ii]==='_'){
                    $flag = true;
                }else{
                    if($flag){
                        $newKey .= strtoupper($key[$ii]);
                        $flag = false;
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
    }


    /****************** Getters and Setters *********/

    public function getHeroID()
    {
        return $this->heroID;
    }

    public function setHeroID($heroID)
    {
        $this->heroID = $heroID;
    }

    public function getHeroFirstName()
    {
        return $this->heroFirstName;
    }

    public function setHeroFirstName($heroFirstName)
    {
        $this->heroFirstName = $heroFirstName;
    }

    public function getHeroLastName()
    {
        return $this->heroLastName;
    }

    public function setHeroLastName($heroLastName)
    {
        $this->heroLastName = $heroLastName;
    }

    public function getHeroPseudo()
    {
        return $this->heroPseudo;
    }

    public function setHeroPseudo($heroPseudo)
    {
        $this->heroPseudo = $heroPseudo;
    }

    public function getHeroCountry()
    {
        return $this->heroCountry;
    }

    public function setHeroCountry($heroCountry)
    {
        $this->heroCountry = $heroCountry;
    }

    public function getHeroTeamId()
    {
        return $this->heroTeamId;
    }

    public function setHeroTeamId($heroTeamId)
    {
        $this->heroTeamId = $heroTeamId;
    }



}
