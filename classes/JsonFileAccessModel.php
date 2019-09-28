<?php
class JsonFileAccessModel
{
    protected $fileName;
    protected $file;

    public function __construct($name, $langid = null)
    {
        if ($langid != null) {
            $this->fileName = Config::FILES_PATH . $langid . '/' . $name . '.json';
        } else {
            $this->fileName = Config::DATABASE_PATH . $name . '.json';
        }
    }

    private function connect($mode) {
        $this->file = fopen($this->fileName, $mode);
        return $this->file;
    }

    private function disconnect() {
        fclose($this->file);
    }

    public function read() {
        if (file_exists($this->fileName) && filesize($this->fileName) > 0) {
            $str = fread($this->connect('r'), filesize($this->fileName));
            $this->disconnect();
            return $str;
        }
    }

    public function write($text) {
        fwrite($this->connect('w'), $text);
        $this->disconnect();
    }

    public function readJson() {
        $str = fread($this->connect('r'), filesize($this->fileName));
        $jsonFile = json_encode($str, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $this->disconnect();
        return $jsonFile;
    }

    public function writeJson($jsonFile) {
        $json = json_encode($jsonFile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        fwrite($this->connect('w'), $json);
        $this->disconnect();
    }
}

