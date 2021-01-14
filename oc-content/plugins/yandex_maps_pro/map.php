<?php if( osc_get_preference('api_key', 'yandex_maps_pro') != '') {?> 
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=<?php echo osc_get_preference('api_key', 'yandex_maps_pro'); ?>" type="text/javascript"></script>
<?php } else{?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<?php } ?>	
<?php
    $addr = array();
    if( ($item['s_zip'] != '') && ($item['s_zip'] != null) ) { $addr[] = $item['s_zip'] ; }
    if( ($item['s_country'] != '') && ($item['s_country'] != null) ) { $addr[] = $item['s_country'] ; }
    if( ($item['s_region'] != '') && ($item['s_region'] != null) ) { $addr[] = $item['s_region'] ; }
    if( ($item['s_city'] != '') && ($item['s_city'] != null) ) { $addr[] = $item['s_city'] ; }
    if( ($item['s_address'] != '') && ($item['s_address'] != null) ) { $addr[] = $item['s_address'] ; }
    $address = implode(", ", $addr) ;
?>     
<script type="text/javascript">
		ymaps.ready(function () { 
ymaps.geocode('<?php echo $address; ?>').then(
                function(res) {
                   
                   var myMap  = new ymaps.Map("map", {
                        center: res.geoObjects.get(0).geometry.getCoordinates(),
                       zoom: 16, 
                  controls:['smallMapDefaultSet']
                    });

 myPlacemark = new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
                hintContent: '<?php echo $address; ?>',
            });
            
            myMap.geoObjects.add(myPlacemark);
                }
        );
}); 

    </script>
<div id="map" style="width: 100%; height:240px"></div>