<?php
namespace WMS\src\Services;

use Illuminate\Http\Request;
use Yaml;

class Parser {
    public function parseYaml(){
        $yaml = Yaml::parseFile(
            __dir__. "./../Flows/flow4.yaml"
        );
        return $yaml;
    }
}

?>