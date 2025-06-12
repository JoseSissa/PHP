<?php

class Engine
{
    private string $fileName;
    // public function run()
    // {
    //     echo "Running engine <br>";
    // }

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    // __call -> Running when we try to execute a non-exist method
    public function __call($name, array $arguments)
    {
        // echo "Calling method '$name' "
        //     . "with arguments: "
        //     . implode(', ', $arguments) . "\n";
        $message = $name . ": ";
        $message .= $arguments[0] . " - ";
        $message .= date("Y-m-d H:i:s") . "\n";

        if (!file_exists($this->fileName)) {
            file_put_contents($this->fileName, "");
        }

        file_put_contents($this->fileName, $message, FILE_APPEND);
    }

    // __callStatic -> Running when we try to execute a non-exist static method
    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' "
            . "with arguments: "
            . implode(', ', $arguments) . "\n";
    }
}

$engine = new Engine("log.txt");

// $engine->run("name", "some", true);
// Engine::some();

$engine->error("Sending error message");
$engine->log("Sending log message");
