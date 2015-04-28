# Cameras

Analysis and mapping of TfL's ANPR network.

Resources folder contains original documents received via FOI, as well as structured data.

Processing contains operations files for geolocating cameras from location descriptions. Tracing contains operations files for creating markers based on overlayed map.

# Sources and Accuracy

All data was released by Transport for London as of August 2014.

Congestion Charge (CC) Enforcement Cameras locations and Traffic Monitoring Camera locations were obtained from <a href="https://www.whatdotheyknow.com/request/tfl_anpr_cameras_and_data#incoming-594416">this FOI request</a> which yielded text descriptions of locations (see resources/TfL_Camera_Locations.csv). Lat/Lng pairs were obtained by running these texts (e.g. "Ardleigh Green Rd by Havering College") against Google's <a href="https://developers.google.com/maps/documentation/geocoding/">Geocoding API</a> (see processing/process.php). These locations may not be exact - see the text locations (in pop-ups on map) for original description.

Low Emission Zone (LEZ) camera Locations were withheld from FOI in the above request due to public interest exemption (see answer to <a href="https://www.whatdotheyknow.com/request/tfl_anpr_cameras_and_data#incoming-594416">Question 2</a>), but was released released under <a href="https://www.whatdotheyknow.com/request/general_policing_use_of_anpr_dat_2#incoming-545916">a separate request</a> in the form of a PDF map (see resources/LEZ_Layout.pdf). This map was traced to produce camera locations but is of consequently lower accuracy (resources/LEZ_traced.csv).

Both of these collections of cameras with lat/long pairs were sorted into a MySQL database (resources/cameras.sql) and exported as a CSV file (resources/cameras.csv).
 