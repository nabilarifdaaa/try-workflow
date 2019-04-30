<?php
namespace WMS\src\Services;

use Illuminate\Http\Request;
use Yaml;

class Parser {
    public function parseYaml($flow){
        $yaml = Yaml::parseFile(
            __dir__. "./../Flows/".$flow .".yaml"
        );
        return $yaml;
    }
}

?>