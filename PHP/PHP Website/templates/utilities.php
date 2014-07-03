<?php

function CreateErrorMsg( $msg) {
    return '<div class="error"> * ' . $msg . '</div>';
}

function selectedOptions( $products, $selected ) {
    $select = "<select name='products'>";
    $count = 0;
    $array_length = count($products);
    while( $count < $array_length ){
        $select .= "<option value='$count'";
        if( $count == $selected)
            $select .= " selected";
        $select .= ">$products[$count]</option>";
        $count += 1;
    }
    $select .= "</select>";
    return $select;
}

function mini_calendar($current_month, $current_year){
    $month = $_GET['month'];
    $year = $_GET['year'];
    $prev_month = $month - 1;
    $next_month = $month + 1;
    $current_month = date('n', mktime(0,0,0,$month, 1, $current_year));
    $current_year = date('Y');
    $display_month = date( 'F', mktime( 0, 0, 0, $current_month, 1, $year));
    $num_days = cal_days_in_month( CAL_GREGORIAN, $current_month, $current_year );
    $first_of_month = date('w', mktime( 0, 0, 0, $current_month, 1, $current_year));
    $count  = 0;
    $days = Array( 'Sun', 'Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat');
    $days_of_week = "<tr>";
    foreach($days as $day ){
        $days_of_week .= "<td>" . $day . "</td>";
    }
    $days_of_week .= "</tr>";

    echo "<a href='/calendar.php?month=$prev_month&$year=$year'> Previous </a>";
    echo "&nbsp;&nbsp;&nbsp;<a href='/calendar.php?month=$next_month&$year=$current_year'> Next </a>";

    if( $current_month == 12){
        $current_year -= 1;
    }
    echo "<table>$days_of_week<tr>";

    while( $count < $first_of_month){
        echo "<td>&nbsp;</td>";
        $count += 1;
    }
    $count = 1;
    while( $count <= 7 - $first_of_month ){
        echo "<td>$count</td>";
        $count += 1;
    }
    echo "</tr><tr>";
//echo "</tr></table>";
    for( $x = 0; $x < 7; $x++ ){
        echo "<td>$count</td>";
        $count += 1;
    }
    echo "</tr> <tr>";
    for( $x = 0; $x < 7; $x++ ){
        echo "<td>$count</td>";
        $count += 1;
    }
    echo "</tr> <tr>";
    for( $x = 0; $x < 7; $x++ ){
        echo "<td>$count</td>";
        $count += 1;
    }
    $extra = $num_days - $count + 1;
    echo "</tr><tr>";


    if( $extra <= 7){
        for( $x = 0; $x < $extra; $x++ ){
            echo "<td>$count</td>";
            $count += 1;
        }
    }
    else
    {
        for( $x = 0; $x < 7; $x++ ){;
            echo "<td>$count</td>";
            $count += 1;
        }
        echo "</tr> <tr>";
        for( $x = 0; $x < $extra - 7; $x++ ){
            echo "<td>$count</td>";
            $count += 1;
            $extra = $extra - 7;
        }
    }

    for( $x = 0; $x < (7 - $extra); $x++){
        echo "<td>&nbsp;</td>";
    }
    echo "</tr> </table>";
    echo $display_month;
}
//////////////////////////////////////////////////////////////////////////////
function ratingStars( $rating ){
    $rating_stars = '';
    for ($i = 1; $i <= $rating; $i++) {
        $rating_stars .= '<img src="images/star.png" alt="star"/>';
    }
    return $rating_stars;
}
////////////////////////////////////////////////////////////////////////////////

function ago($time)
{
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $difference     = $now - $time;
    $tense         = "ago";

    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if($difference != 1) {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] $tense ";
}
?>
