# Halcon Web Application

The Halcon Web Application is designed to streamline and automate the internal processes of a construction material distributor. It enables customers to track their order status and allows company staff to manage orders, generate invoices, and upload delivery photos.

## Features

- **Customer Order Tracking**: Customers can view the status of their orders.
- **Order Management**: Sales staff can place and update orders.
- **Invoice Generation**: Invoices are created for each order.
- **Photo Evidence**: Delivery photos can be uploaded and viewed.
- **Role-Based Access**: Employees have different roles with specific permissions.

## Technologies Used

- **Front-end**: HTML, CSS, JavaScript
- **Back-end**: PHP
- **Database**: MySQL
- **Development Tools**: XAMPP, Git

## Installation and Setup

1. **Clone the Repository**

   git clone https://github.com/OG-Rodriguez/Halcon-WebApp.git


   ## Changes Made 10/24/2024
- Created views for user management:
  - List of users (active and inactive)
  - User creation
  - User editing
  
- Created views for order management:
  - List of orders
  - Order creation
  - Order update
  - Status change
  - View order details
  - Archived orders management
  
## Setup Instructions
- Run `php artisan migrate` to set up the database.
- Run `php artisan db:seed` to seed initial data.