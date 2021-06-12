<?php
/**
 * Main.php file
 * Initialize main engine, define constants, and object instantiated
 * include functions needed by application
 * 
 * @category main.php file
 * @author   M.Noermoehammad
 * @license  https://opensource.org/licenses/MIT MIT License
 * @version  1.0
 * @since    Since Release 1.0
 * 
 */
#ini_set("session.cookie_secure", 1);  
#ini_set("session.cookie_lifetime", 604800);  
ini_set("session.cookie_httponly", 1);
#ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
#ini_set("session.use_strict_mode", 1);
#ini_set("session.use_trans_sid", 0);
ini_set('session.save_handler', 'files');
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 1440);
ini_set('session.gc_probability',1);

// Opt out of FLoC
header("Permissions-Policy: interest-cohort=()");

require __DIR__ . '/common.php';

#================================== call functions in directory lib/utility ===========================================
$function_directory = new RecursiveDirectoryIterator(__DIR__ . DS .'utility'. DS, FilesystemIterator::FOLLOW_SYMLINKS);
$filter_iterator = new RecursiveCallbackFilterIterator($function_directory, function ($current, $key, $iterator){
    
    // skip hidden files and directories
    if ($current->getFilename()[0] === '.') {
        return false;
    }
    
    if ($current->isDir()) {
        
        # only recurse into intended subdirectories
        return $current->getFilename() === __DIR__ . DS .'utility'. DS;
        
    } else {
        
        # only invoke files of interest
        return strpos($current->getFilename(), '.php');
        
    }
    
});
    
$files_dir_iterator = new RecursiveIteratorIterator($filter_iterator); 

foreach ($files_dir_iterator as $file) {
    
    include $file->getPathname();
    
}

#====================End of call functions in directory lib/utility=====================================================

if (is_readable(APP_ROOT.APP_LIBRARY.DS.'/../vendor/autoload.php')) {

    require __DIR__ . '/../vendor/autoload.php';
    
}


