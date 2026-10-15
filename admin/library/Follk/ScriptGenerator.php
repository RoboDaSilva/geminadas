<?php

class ScriptGenerator {

    protected $lowerNameSingular;
    protected $lowerNamePlural;
    protected $upperNameSingular;
    protected $upperNamePlural;
    protected $tableName;

    public function getLowerNameSingular() {
        return $this->lowerNameSingular;
    }

    public function getLowerNamePlural() {
        return $this->lowerNamePlural;
    }

    public function getUpperNameSingular() {
        return $this->upperNameSingular;
    }

    public function getUpperNamePlural() {
        return $this->UpperNamePlural;
    }

    public function lowerCase($str) {
        $str = trim($str);
        $str = strtolower($str);

        return $str;
    }

    public function upperCase($str) {
        $array = explode("_", $str);
        $str = "";

        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = trim($array[$i]);
            $array[$i] = strtolower($array[$i]);
            $array[$i] = ucwords($array[$i]);

            $str .= $array[$i];
        }

        return $str;
    }

    public function __construct(array $param = null) {
        $this->lowerNameSingular = $this->lowerCase($param['nameSingular']);
        $this->lowerNamePlural = $this->lowerCase($param['namePlural']);
        $this->upperNameSingular = $this->upperCase($param['nameSingular']);
        $this->upperNamePlural = $this->upperCase($param['namePlural']);
        $this->tableName = (isset($param['tableName'])) ? $param['tableName'] : "";
        $this->pageId = (isset($param['pageId'])) ? $param['pageId'] : "";
    }

    public function generate($default_file, $new_file) {

        $content = file_get_contents($default_file);

        $content = str_replace('{lowerNameSingular}', $this->lowerNameSingular, $content);
        $content = str_replace('{lowerNamePlural}', $this->lowerNamePlural, $content);

        $content = str_replace('{upperNameSingular}', $this->upperNameSingular, $content);
        $content = str_replace('{upperNamePlural}', $this->upperNamePlural, $content);

        $content = str_replace('{tableName}', $this->tableName, $content);
        $content = str_replace('{pageId}', $this->pageId, $content);

        // Create file if not exists
        file_put_contents($new_file, $content /* , FILE_APPEND (para concatenar) */);
    }

}

?>
