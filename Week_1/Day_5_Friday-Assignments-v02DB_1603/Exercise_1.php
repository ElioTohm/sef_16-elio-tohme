#!/usr/bin/php
<?php

$options = getopt("i:");

if(sizeof($options) != 0){
    if( is_dir($options["i"]) ){
        if(substr($options["i"], -1) != "/" ){
            $options["i"] . "/";
        } 
        echo "Files within ". $options["i"] . "\n";
        fixbuguidiot($options["i"]);
        // $Allscaned = scandir($options["i"],SCANDIR_SORT_DESCENDING);                
        // $scan = array_diff($Allscaned, array('.', '..'));
        // PrintFileName($scan, $options["i"],null, $options["i"]);        
    }else{
        echo "Directory does NOT exist please try again \n";
    }
}else{
    echo "please enter -i followed by the directory \n";
}    

// function PrintFileName( $a, $dir, $Parent = "", $var = ""){
//     $mask="|%-30.30s---> %-30.30s |\n";
//     $mask2="|%-30.30s     %-30.30s |\n";
//     foreach($a as $file){
//         if ( is_dir($dir . $file)){
//             $AllsubScan = scandir($dir . $file,SCANDIR_SORT_DESCENDING);
//             $subScan = array_diff($AllsubScan, array('.', '..'));
//             printf($mask2, $file, "" );
//             $parentDir = str_replace($var, '', $dir.$file);            
//             PrintFileName( $subScan, $dir.$file."/", $parentDir, $var);    
//         }else{
//             if($Parent != null){
//                printf($mask, "-----------------------------------------------------", $file );  
//             }else{
//                printf($mask, "", $file );  
//             }
//         }
//     }
// }

function fixbuguidiot($dir){
    foreach (new DirectoryIterator($dir) as $fileInfo) {
        if($fileInfo->isDot()) continue;
        echo $fileInfo. " \n";
}

}

?>
