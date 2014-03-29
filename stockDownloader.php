<?php
//http://api.bitcoincharts.com/v1/weighted_prices.json
//http://ichart.finance.yahoo.com/table.csv?s=GOOG&d=2&e=26&f=2014&g=d&a=7&b=19&c=2004&ignore=.csv

function createUrl($ticker, $fromDay = 1, $fromMonth = 0, $fromYear = 2013){
    $currentMonth = date("n") - 1; // 1 - 12
    $currentDay = date("j"); // 1-31
    $currentYear = date("Y"); // yyyy

    return "http://ichart.finance.yahoo.com/table.csv?s=$ticker&d=$currentDay&e=$currentMonth&f=$currentYear&g=d&a=$fromMonth&b=$fromDay&c=$fromYear&ignore=.csv";
}

function getCSVFile($url,$outputFile){
    $content = file_get_contents($url,$outputFile);
    $content = str_replace("Date,Open,High,Low,Close,Volume,Adj Close","",$content);
    $content = trim($content);
    file_put_contents($outputFile, $content);
}

getCSVFile(createUrl("goog"),"history.txt");
?>

<!--

To surround a block of code  ----   Ctrl+Alt+T.
Ctrl+J                       ----	Insert a live template.
Ctrl+Slash/Ctrl+Shift        ----	Comment or uncomment a line or fragment of code with the line or block comment.
Ctrl+N	                     ----   Find class or file by name.
Ctrl+D	                     ----   Duplicate the current line or selection.
Ctrl+W                       ----	Incremental expression selection
Ctrl+Shift+F		         ----   Find text in the project or in the specified directory. .
Ctrl+Shift+A                 ----	Find action by name
Ctrl+Space                   ----	Invoke code completion
Ctrl+Alt+I		             ----   Format

-->