<?php
echo "Hello World!";                                  #1
$int = 3;                                             #2
$bool = true;
$float = 1.2;
echo "\n",$int,"\n", $bool,"\n", $float, "\n";
echo var_dump($int, $bool, $float);
$string1 = "Super";                                   #3
$string2 = "Man";
$string3 = $string1 . $string2;
echo $string3, "\n";
$value = 10;                                          #4
if ($value % 2 == 0){
    echo "Парное!";
}
else {echo "Не парное!";}
echo "\n";
for ($first = 1; $first <= 10; $first++) echo $first; #5
echo "\n";
$first = 10;
while ($first >= 1){
    echo $first;
    $first--;
}
$base['name'] =  "Vlad";                              #6
$base["years"] = 19;
$base['surname'] = 'Holubnychyi';
$base ["education"] = "Computer Science";
print_r ($base);
$base['average rating'] = 99;
print_r ($base);
?>
