<!-- 
Variables: 
    ARRAYS
        $stations
        $fares
    OTHER
        $stationFrom
        $stationTo
        $tokenNumber
        $tokenWay
        $discount
        $total


        show directions for the trip they do
-->
<?php


$stationFrom = $_REQUEST['stationFrom'];
$stationTo = $_REQUEST['stationTo'];
$tokenNumber = $_REQUEST['tokenNumber'];
$tokenWay = $_REQUEST['tokenWay'];
$discount = $_REQUEST['discount'];
#$total = $_REQUEST['total'];

echo $stationFrom;
echo $stationTo;
echo $tokenNumber;
echo $tokenWay;
echo $discount;

?>