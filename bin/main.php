<?php

echo "\n";

$process = isset($argv) && count($argv) ? array_slice($argv, 1, count($argv) - 1) : [];

$function = $process[0];

if ($function === 'new') {
    if (!isset($process[1])) {
        echo "The argument `[...] new` need a type and a value!\n\ne.g.:\n$ [...] new controller Clients\n";
        exit(0);
    }
    $name = $process[1];
    //
    $data = array_slice($process, 2, count($process) - 1);
    if (count($data) === 0) {
        echo sprintf("The argument `[...] new %1\$s` need a name!\n\ne.g.:\n$ [...] new %1\$s Clients\n", $name);
        exit(0);
    }
    switch($name) {
        case 'controller':
            call_user_func_array('createNewController', $data);
        break;
        case 'service':
            call_user_func_array('createNewService', $data);
        break;
    }
}

function createNewController(string $name) {
    $name = ucfirst($name);
    $controller = "{$name}Controller";
    $path = "./app/controllers";
    verifyDirectoryExists($path);
    $file = "{$path}/{$controller}.php";
    $content = "<?php\n";
    $content .= "namespace App\\Controllers;\n\n";
    $content .= "/**\n";
    $content .= " *\n";
    $content .= " * This file was automatically loaded by the command line.\n";
    $content .= " *\n";
    $content .= " **/\n";
    $content .= "class {$controller}\n{\n";
    $content .= "  public function home() {\n";
    $content .= "    return \$this->view('home.index');\n";
    $content .= "  }\n";
    $content .= "}\n";
    if (@file_put_contents($file, $content)) {
        echo "File created at --> {$file}\n";
        exit;
    }
    echo sprintf("Error creating the controller. Verify if the directory (%s) exists.", $path);
}

function createNewService(string $name) {
    $service = ucfirst($name);
    $path = "./app/services";
    verifyDirectoryExists($path);
    $file = "{$path}/{$service}.php";
    $content = "<?php\n";
    $content .= "namespace App\\Services;\n\n";
    $content .= "use App\\Services\\Base as Base;\n\n";
    $content .= "/**\n";
    $content .= " *\n";
    $content .= " * This file was automatically loaded by the command line.\n";
    $content .= " *\n";
    $content .= " **/\n";
    $content .= "class {$service} extends Base\n{\n";
    $content .= "  public function all() {\n";
    $content .= "    return \$this->fetchAll();\n";
    $content .= "  }\n";
    $content .= "}\n";
    if (@file_put_contents($file, $content)) {
        echo "File created at --> {$file}\n";
        exit;
    }
    echo sprintf("Error creating the service. Verify if the directory (%s) exists.", $path);
}

function verifyDirectoryExists(string $path, string $prefix='') {
    $array = explode(DIRECTORY_SEPARATOR, $path);
    $path = ($prefix? "{$prefix}/": "") . $array[0];
    if (!is_dir($path)) {
        @mkdir($path, 0777);
    }
    $prefix = array_shift($array);
    $array = implode(DIRECTORY_SEPARATOR, $array);
    if ($array !== '') {
        return verifyDirectoryExists($array, $prefix);
    }
    return true;
}

echo "\n\n";
