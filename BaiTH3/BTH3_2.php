<?php
$multiCity=array(

array('Tokyo', 'Japan', 'Asia'),

array('Mexico City','Mexico', 'North America'),

array('New York City', 'USA', 'North America'),

array('Mumbai', 'India', 'Asia'),

array('Seoul', 'Korea', 'Asia'),

array('Shanghai', 'China', 'Asia'),

array('Lagos', 'Nigeria', 'Africa'),

array('Buenos Aires', 'Argentina', 'South America'),

array('Cairo', 'Egypt', 'Africa'),

);

foreach(@$multiCity as $city) {
    echo "Thủ đô của $city[1] là $city[0] \n";
}

printf("%-15s %-15s %-15s\n", "City", "Country", "Continent");
echo str_repeat("-", 45) . "\n";
foreach ($multiCity as $city) {
    printf("%-15s %-15s %-15s\n", $city[0], $city[1], $city[2]);
}
