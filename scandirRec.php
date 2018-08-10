<?php
/**
 * @author  liubinglin
 * @date    2018/8/10
 * @time    下午11:02
 *  递归循环,输出目录
 */
function scandirRec($dir)
{
    static $result = array();
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($file)) {
                scandirRec($file);
                $result[] = $file;
            }
        }
        closedir($handle);
    }
    return $result;
}


/*$result = scandirRec('./phpmyadmin');
var_dump($result);
array(10) {
    [0]=>
                    string(16) "./phpmyadmin/doc"
    [1]=>
                    string(21) "./phpmyadmin/doc/html"
    [2]=>
                    string(29) "./phpmyadmin/doc/html/_images"
    [3]=>
                    string(30) "./phpmyadmin/doc/html/_sources"
    [4]=>
                    string(29) "./phpmyadmin/doc/html/_static"
    [5]=>
                    string(21) "./phpmyadmin/examples"
    [6]=>
                    string(15) "./phpmyadmin/js"
    [7]=>
                    string(26) "./phpmyadmin/js/codemirror"
    [8]=>
                    string(32) "./phpmyadmin/js/codemirror/addon"
    [9]=>
                    string(37) "./phpmyadmin/js/codemirror/addon/hint"
    [10]=>
                    string(37) "./phpmyadmin/js/codemirror/addon/lint"
}*/
