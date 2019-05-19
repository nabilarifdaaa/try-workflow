<?php
namespace WMS\src\Services;

use WMS\src\Services\Parser;
use Illuminate\Support\Facades\DB;
use Yaml;

class StateManager extends Parser {

    protected $flow;

    public function __construct($flow) {
        $this->flow = $this->parseYaml($flow);
    }

    public function getFlow(){
        return $this->flow;
    }

    public function getStateDetail($state){
        return $this->flow['states'][$state]['transitions'];
    }

    public function getActions($state){
        return $this->flow['states'][$state]['actions'];
    }

    public function getValueActions($state,$value){
        return $this->flow['states'][$state]['actions'][$value]['transition'];
    }
}
?>