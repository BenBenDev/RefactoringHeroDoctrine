<?php

namespace src\Entity;

/**
* @Entity
* @Table(name="sh_team")
**/
class TeamDTO
{       
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    private $TeamId;

    /**
    * @Column(type="string")
    **/
    private $TeamName;
    
    /**
    * @Column(type="string")
    **/
    private $TeamLogo;
    
    function getTeamId() {
        return $this->TeamId;
    }

    function getTeamName() {
        return $this->TeamName;
    }

    function getTeamLogo() {
        return $this->TeamLogo;
    }

    function setTeamId($TeamId) {
        $this->TeamId = $TeamId;
    }

    function setTeamName($TeamName) {
        $this->TeamName = $TeamName;
    }

    function setTeamLogo($TeamLogo) {
        $this->TeamLogo = $TeamLogo;
    }

        
    //************************** Method ********************************************/

    /**
     * @param $datas for hydrate the DTO from the database
     * @return null
     */
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
        return null;
    }

    public function __toString()
    {
        return $this->getTeamName();
    }

}