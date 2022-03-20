
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'>
</script><div style='overflow:hidden;height:440px;width:100%;'>
<div id='gmap_canvas' style='height:440px;width:100%;'></div>
<div><small>
<a href="http://embedgooglemaps.com">                                   embed google map                            </a>
</small></div><div><small><a href="http://freedirectorysubmissionsites.com/">reedirectorysubmissionsites.com</a></small>
</div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
<script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(5.6483935,-0.1893072000000302),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(5.6483935,-0.1893072000000302)});
infowindow = new google.maps.InfoWindow({content:'<strong>LOCATE THE DEVELOPERS HERE</strong><br>Engineering Sciences,Legon University Of Ghana<br>'});
google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>