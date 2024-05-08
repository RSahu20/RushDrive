
<h1 align="center">RushDrive</h1> 

## About Project:
A self car rental agency platform which allows customers and employees to use their respective functionalities.

## Installation
1. Install XAMPP or WAMPP.
2. Open XAMPP Control panal and start [apache] and [mysql] .
3. Download project from github.
4. Extract files in C:\xampp\htdocs.
5. Open link localhost/phpmyadmin
6. Click on new at side navbar.
7. Give a database name as (rental) hit on create button.
8. After creating database name click on import.
9. Browse the file in directory[C:\xampp\htdocs\RushDruve\DATABASE FILE\rental.sql].
10. After importing successfully.


Schema Diagram---


+----------------+          +----------------+          +----------------+          +----------------+          +----------------+          +----------------+
|     cars       |          |   clientcars   |          |    clients     |          |   customers    |          |    feedback    |          |  rentedcars    |
+----------------+          +----------------+          +----------------+          +----------------+          +----------------+          +----------------+
| - car_id (PK)  |<---+     | - car_id (PK)  |          | - client_username (PK) |     | - customer_username (PK) |   |                |     | - id (PK)      |
| - car_name     |    |     | - client_username (FK) |   | - client_name    |          | - customer_name   |          | - name          |     | - customer_username (FK) |
| - car_model    |    |     +----------------+          | - client_phone   |          | - customer_phone  |          | - e_mail        |     | - car_id (FK)  |
| - car_nameplate|    +---->| - car_availability |       | - client_email   |          | - customer_email |          | - message       |     | - booking_date |
| - car_img      |          +----------------+          | - client_address |          | - customer_address |         +----------------+          | - rent_start_date |
| - price_per_day|                                       | - client_password|          | - customer_password |                                      | - rent_end_date   |
| - seating_capacity|                                    +----------------+          +----------------+                                      | - car_return_date|
+----------------+                                                                                                                               | - fare           |
                                                                                                                                               | - distance       |
                                                                                                                                               | - no_of_days     |
                                                                                                                                               | - total_amount   |
                                                                                                                                               | - return_status  |
                                                                                                                                               +------------------+
