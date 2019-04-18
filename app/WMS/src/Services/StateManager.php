<?php
namespace WMS\src\Services;

use WMS\src\Services\Parser;
use Yaml;

class StateManager extends Parser {

    private $yaml;

    public function __construct() {
        $this->yaml = $this->parseYaml();
    }

    public function setUserId(){

    }

    public function getStateDetail($state){
        return $this->yaml['states'][$state];
    }

    public function getCurrentState(){

    }

    public function nextState(){

    }

    public function setState(){
        
    }
}
?>