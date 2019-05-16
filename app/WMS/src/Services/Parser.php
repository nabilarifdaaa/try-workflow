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

    public function allfile(){
        $folder = __dir__. "./../Flows/";
        $file = [];

        $filesInFolder = \File::files($folder);     
        foreach($filesInFolder as $path) { 
            $file = pathinfo($path);
            $name[] = $file['filename'] ;
        }
        // dd($name);
        return $name;
    }

    public function parseAll($all){
        foreach($all as $key){
            $parse[] = Yaml::parseFile(
                __dir__. "./../Flows/".$key .".yaml"
            );
        }
        return $parse;
    }
}


?>