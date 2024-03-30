## Prerequisites
- PHP >= 8.1
- [Composer](https://getcomposer.org/download/) 

## Installation
 - Download or clone this repo
 - Navigate to the project directory
 - Run Command "composer install" (For vendor packages)
 - Create .env file and set mysql database credentials
 - Run command "php artisan migrate"
 - For restaurant table run command "php artisan db:seed --class=RestaurantSeeder"
 - (Optional) For rider location table run command "php artisan db:seed --class=RiderLocationSeeder"

## API Endpoint
 - {dev_url}/api/rider-location (POST Request)
 
 ```
 {   
    "rider_id": 1,
    "service_name": "Express Delivery",
    "lat": "23.82741200",
    "lng": "90.37241260",
    "capture_time": "2024-03-29 01:47:23"
}
 ```

 - {dev_url}/api/nearby-rider (GET Request)
    
 ```
{
   "restaurant_id": 1
}
 ```

## ANY QUERY
 - shahnaouzrazu21@gmail.com
