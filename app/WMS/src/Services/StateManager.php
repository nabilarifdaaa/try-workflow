<?php
namespace WMS\src\Services;

use WMS\src\Services\Parser;
use Illuminate\Support\Facades\DB;
use Yaml;

class StateManager extends Parser {

    private $yaml;

    public function __construct() {
        $this->yaml = $this->parseYaml();
    }

    public function setUserId($id){
    
    }

    public function getStateDetail($state){
        return $this->yaml['states'][$state];
    }

    // public function getCurrentState($currentState){
        // return $currentState;
    // }

    public function nextState(){

    }

    public function setState(){
        
    }
}
?>