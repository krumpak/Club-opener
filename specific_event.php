<?php
$data=$_POST['info'];
$print='<a href="#" onClick="navigation(\'search_events\');"><span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a><br />';

include_once('database.php');

$result = mysql_query("SELECT co_events.* , co_organizer.organizer_name, co_organizer.organizer_logo FROM co_events,co_organizer WHERE co_organizer.id=co_events.organizer_id AND co_events.id = ".$data." LIMIT 1"); // ORDER BY RAND()

function EventDisplay($str){
	return '<div class="event_data"><img class="event_logo" src="'.$str[1].'" /><div class="event_info"><div class="event_date">'.$str[2].'</div><div class="event_name">'.$str[3].'</div><div class="event_organizer">'.$str[4].'<span class="event_distance">'.$str[5].' m</span></div></div><a class="buy_ticket" href="#"><div class="event_price"><div class="event_price_number">'.$str[7].' €</div><div class="event_buy">BUY</div></div></a><br><br><br><br><br><br style="clear:both;" />
	
	<div style="float:left;width:100%">'.$str[6].'</div>
	
	<iframe style="float:left;width:100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22144.91337062866!2d14.488906899999995!3d46.068764599999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47652d67884a16a1%3A0x53939913bffc9709!2sZme%C5%A1aj+si+gostinstvo+d.o.o.%2C+poslovna+enota+klub+cirkus!5e0!3m2!1ssl!2ssi!4v1434985786825" height="300" frameborder="0" style="border:0"></iframe>
	<br style="clear:both;" />
	<iframe style="float:left"  width="200" height="200" src="https://www.youtube.com/embed/ye2BTJ9pqic?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
	
	<img style="float:left;" width="200" height="200" src="http://www.diplomatic-corporate-services.si/uploads/dcs_providers/images/cirkus_large_3154.jpeg" />
	<img style="float:left;" width="200" height="200" src="http://www.travel-slovenia.com/wp-content/uploads/sites/1/nggallery/ljubljana-pub-crawl/ljubljana_pubcrawl_07.jpg" />
	<img style="float:left;" width="200" height="200" src="http://www.club13.co.uk/wp-content/uploads/2012/08/Club-Scene.jpg" />
	<img style="float:left;" width="200" height="200" src="http://www.mvo-club.com/wp-content/uploads/2014/09/3.jpg" />
	<br style="clear:both;" />
	</div>';
	
}

while ($row = mysql_fetch_array($result)) {
	$event_date_format = date("#N j. =n Y, G:i", strtotime( $row{'event_date'} ));
	$find=array('#1', '#2', '#3', '#4', '#5', '#6', '#7', '=1', '=2', '=3', '=4', '=5', '=6', '=7', '=8', '=9', '=10', '=11', '=12');
	//$replace=array('Mon,', 'Tue,', 'Wed,', 'Thu,', 'Fri,', 'Sat,', 'Sun,', 'Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
	$replace=array('Mon,', 'Tue,', 'Wed,', 'Thu,', 'Fri,', 'Sat,', 'Sun,', 'Jan.', 'Feb.', 'Mar.', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
	$event_date = str_replace($find, $replace, $event_date_format);
	
	$content = array($row{'id'}, $row{'event_logo'}, $event_date, $row{'event_name'}, $row{'organizer_name'}, strlen($row{'event_intro'}), $row{'event_intro'}.$data, $row{'event_price'});
	//$content = array("$row{'event_logo'}", "$row{'event_date'}", "$row{'event_name'}", "$row{'organizer_name'}", "rand(100,900)", "$row{'event_price'}");
	//$template="dasdsac %s, %s, %s";
	$print .= EventDisplay($content);
	//$j .= '<div class="event_data"><a class="event_link" href="#"><img class="event_logo" src="'.$row{'event_logo'}.'" /><div class="event_info"><div class="event_date">'.$row{'event_date'}.'</div><div class="event_name">'.$row{'event_name'}.'</div><div class="event_organizer">'.$row{'organizer_name'}.'<span class="event_distance">'.rand(100,900).' m</span></div></div><div class="event_extra">sdasasd dasiod jasod asio jdaso ji k apdk asdk as sasdasasd dasiod jasod asio jdaso ji k apdk asdk as sasdasasd dasiod jasod asio jdaso ji k apdk asdk as sa</div></a><a class="buy_ticket" href="#"><div class="event_price"><div class="event_price_number">'.$row{'event_price'}.' €</div><div class="event_buy">BUY</div></div></a><br style="clear:both;" /></div>';
}

echo $print.'<div style="height:60px;background-color: #e1e1e1;"></div>';
?>