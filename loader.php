<?php
/**
 * loader.php
 *
 * Autoload namespaces and their classes when needed.
 *
 * @version 1.0
 * @author Eric Horodyski
 */
 
spl_autoload_register(function($className)
{
    $className = strtolower(str_replace('\\', DIRECTORY_SEPARATOR, $className));
    $file = __DIR__.DIRECTORY_SEPARATOR.$className.".class.php";
    if(is_readable($file))
        require_once($file);
});

?>
