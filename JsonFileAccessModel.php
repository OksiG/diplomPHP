<?php
class JsonFileAccessModel
{
    protected $fileName;
    protected $file;

    function __construct($fileName) {
        $this->fileName = Config::DATABASE_PATH . $fileName . '.json';
    }

    private function connect($mode) {
        $this->file = fopen($this->fileName, $mode);

    }

    private function disconnect() {
        fclose($this->file);
    }

    public function read() {
        $this->connect('r');
        while(!feof($this->file))
        {
            $str = htmlentities(fread($this->file, 600));
        }
        $this->disconnect();
        return $str;
    }

    public function write($text) {
        $this->connect('w');
        fwrite($this->file,  $text);
        $this->disconnect();
    }

    public function readJson() {
        $this->connect('r+');
        while(!feof($this->file))
        {
            $str = htmlentities(fgets($this->file));
        }
        $this->disconnect();
        $jsonFile = json_encode($str);
        return $jsonFile;
    }

    public function writeJson($jsonFile) {
        $json = json_decode($jsonFile,JSON_PRETTY_PRINT);
        fwrite($this->file,  $json);
        $this->disconnect();
    }
}

