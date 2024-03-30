## Prerequisites
- PHP >= 8.1
- [Composer](https://getcomposer.org/download/) 
- Mysql >= 5.7 
- Support other SQL database also
- API Testing Tool : Postman, Swagger etc.

## Installation
 - Download or clone this repo
 - Navigate to the project directory
 - Run Command <b>"composer install"</b> (For vendor packages)
 - Create .env file and set mysql database credentials
 - Run command <b>"php artisan migrate"</b>
 - For restaurant table run command <b>"php artisan db:seed --class=RestaurantSeeder"</b>
 - (Optional) For rider location table run command <b>"php artisan db:seed --class=RiderLocationSeeder"</b>
 - Now run command <b>"php artisan serve"</b> and test api's

## API Endpoint
 - <b>{dev_url}/api/rider-location</b> (POST Request)
 - This API endpoint stores rider location data. Below is a sample of the input data:
 
 ```
 {   
    "rider_id": 1,
    "service_name": "Express Delivery",
    "lat": "23.82741200",
    "lng": "90.37241260",
    "capture_time": "2024-03-29 01:47:23"
}
 ```

 - <b>{dev_url}/api/nearby-rider</b> (GET Request)
 - This api endpoint show restaurant latitude & longitude wise nearest rider. 
 - Need to input restaurant_id . Below is a sample of the input data:

 ```
{
   "restaurant_id": 1
}
 ```

## Test Cases
 - Rider location store functionality test case
 - Find near by rider with valid resturant test case 

## ANY QUERY
 - shahnaouzrazu21@gmail.com
