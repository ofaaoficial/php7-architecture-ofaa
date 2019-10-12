<?php


if(!function_exists('require_file')){
    function require_file($path){
        file_exists($path) ? require_once $path : die("The file on this path: [{$path}] no exists.");
    }
}

if(!function_exists('debug')) {
    function debug($var)
    {
        ?>
        <code>
        <pre>
        <?php var_dump($var); ?>
        </pre>
        </code>
        <?php
        die();
    }
}


if(!function_exists('render')) {
    function render($file,
                    $header = 'layouts/header.php',
                    $footer = 'layouts/footer.php')
    {
        require_file(PATH_VIEWS . $header);
        require_file(PATH_VIEWS . $file . '.php');
        require_file(PATH_VIEWS . $footer);
    }
}