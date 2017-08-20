<?php
$handle = fopen ("https://hr-testcases-us-east-1.s3.amazonaws.com/33593/input02.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1501909767&Signature=G82tc%2B6pAY2UiL7H0Kb2uxOdfGk%3D&response-content-type=text%2Fplain","r");
fscanf($handle,"%d",$n);
$unsorted = array();
/*
for($unsorted_i = 0; $unsorted_i < $n; $unsorted_i++){
   fscanf($handle,"%s",$unsorted[]);
}
*/
$i = 0;
while ($f = fgets($handle)) {
    if ($i == 0)
        $unsorted[] = $f;
    $i++;
    //fscanf($handle2,"%s",$unsorted2[]);
}
$br = '<br>';

$handle2 = fopen ("https://hr-testcases-us-east-1.s3.amazonaws.com/33593/output02.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1501909797&Signature=Uj%2F5MvGJO4pPwAwrw0Xk%2BbUmj2o%3D&response-content-type=text%2Fplain","r");
$unsorted2 = array();
while ($f = fgets($handle2)) {
    $unsorted2[] = $f;
    //fscanf($handle2,"%s",$unsorted2[]);
}
/*fscanf($handle2,"%d",$n2);
for($unsorted_i2 = 0; $unsorted_i2 < $n2; $unsorted_i2++){
   fscanf($handle2,"%s",$unsorted2[]);
}*/
sort($unsorted);
//sort($unsorted2);

$r = array_diff($unsorted, $unsorted2);
echo count($r);
echo '<br />';

echo '<div style="float: left; width: 49%; margin: 0; padding: 0; border: 1px solid; word-break: break-all;">';
echo '<pre>';
print_r($unsorted);
echo '</pre>';
echo '</div>';

echo '<div style="float: left; width: 49%; margin: 0; padding: 0; border: 1px solid;">';
echo '<pre>';
print_r($unsorted2);
echo '</pre>';
echo '</div>';

/*foreach ($unsorted as $v)
    echo $v . $br;
*/
#echo implode($br, $unsorted);
