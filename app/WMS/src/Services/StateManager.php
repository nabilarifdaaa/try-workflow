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

    public function setUserId($id){
    
    }

    public function getStateDetail($state){
        return $this->flow['states'][$state]['transitions'];
    }

    public function nextState(){
        // $stateDetail = $this->flow['states'][$state];
        // foreach($stateDetail as $key=>$value) {
        //     foreach($value as $key1=>$value2){
        //         foreach($value2 as $key2=>$value3){
        //             $condition = $value3;
        //         }
        //     }
        // }
        // return $condition;
    }

    public function setState(){
        
    }
}
?>