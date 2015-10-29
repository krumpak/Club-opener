<?php
include_once('database.php');

$result = mysql_query("SELECT co_events.* , co_organizer.organizer_name, co_organizer.organizer_logo FROM co_events,co_organizer WHERE co_organizer.id=co_events.organizer_id LIMIT ".$limit); // ORDER BY RAND()

function EventDisplay($str){
	return '<div class="event_data"><a class="event_link" href="#" onclick="open_event('.$str[0].');"><img class="event_logo" src="'.$str[1].'" /><div class="event_info"><div class="event_date">'.$str[2].'</div><div class="event_name">'.$str[3].'</div><div class="event_organizer">'.$str[4].'<span class="event_distance">'.$str[5].' m</span></div></div><div class="event_intro">'.$str[6].'</div></a><a class="buy_ticket" href="#"><div class="event_price"><div class="event_price_number">'.$str[7].' €</div><div class="event_buy">BUY</div></div></a><br style="clear:both;" /></div>';
}

$j='';
while ($row = mysql_fetch_array($result)) {
	$event_date_format = date("#N j. =n Y, G:i", strtotime( $row{'event_date'} ));
	$find=array('#1', '#2', '#3', '#4', '#5', '#6', '#7', '=1', '=2', '=3', '=4', '=5', '=6', '=7', '=8', '=9', '=10', '=11', '=12');
	//$replace=array('Mon,', 'Tue,', 'Wed,', 'Thu,', 'Fri,', 'Sat,', 'Sun,', 'Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
	$replace=array('Mon,', 'Tue,', 'Wed,', 'Thu,', 'Fri,', 'Sat,', 'Sun,', 'Jan.', 'Feb.', 'Mar.', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
	$event_date = str_replace($find, $replace, $event_date_format);
	
	$content = array($row{'id'}, $row{'event_logo'}, $event_date, $row{'event_name'}, $row{'organizer_name'}, strlen($row{'event_intro'}), $row{'event_intro'}, $row{'event_price'});
	//$content = array("$row{'event_logo'}", "$row{'event_date'}", "$row{'event_name'}", "$row{'organizer_name'}", "rand(100,900)", "$row{'event_price'}");
	//$template="dasdsac %s, %s, %s";
	$j .= EventDisplay($content);
	//$j .= '<div class="event_data"><a class="event_link" href="#"><img class="event_logo" src="'.$row{'event_logo'}.'" /><div class="event_info"><div class="event_date">'.$row{'event_date'}.'</div><div class="event_name">'.$row{'event_name'}.'</div><div class="event_organizer">'.$row{'organizer_name'}.'<span class="event_distance">'.rand(100,900).' m</span></div></div><div class="event_extra">sdasasd dasiod jasod asio jdaso ji k apdk asdk as sasdasasd dasiod jasod asio jdaso ji k apdk asdk as sasdasasd dasiod jasod asio jdaso ji k apdk asdk as sa</div></a><a class="buy_ticket" href="#"><div class="event_price"><div class="event_price_number">'.$row{'event_price'}.' €</div><div class="event_buy">BUY</div></div></a><br style="clear:both;" /></div>';
}

//echo '<ul class="search-list">';
/*$data=$_POST['info'];
$j='';
for ($i = 1; $i <= rand(25, 35); $i++) {
    $j .= '<div class="search-list">'.$data.'<br />Location: 100m</div>';
}*/
echo $j.'<div style="height:60px;background-color: #e1e1e1;"></div>';
?>