<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 10:18
 */

namespace src\Model;

/**
* @Entity
* @Table(name="sh_power")
**/
class Power
{
    //************************** Attributes ****************************************/

    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer", name="power_id")
    **/
    private $powerId;
    /**
    * @Column(type="string")
    **/
    private $powerName;
    /**
    * @Column(type="string")
    **/
    private $powerDesc;

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

    //***************************Getters and setters *******************************/


    public function getPowerId()
    {
        return $this->powerId;
    }

    public function setPowerId($powerId)
    {
        $this->powerId = $powerId;
    }

    public function getPowerName()
    {
        return $this->powerName;
    }

    public function setPowerName($powerName)
    {
        $this->powerName = $powerName;
    }

    public function getPowerDesc()
    {
        return $this->powerDesc;
    }

    public function setPowerDesc($powerDesc)
    {
        $this->powerDesc = $powerDesc;
    }



}
