# Employee Management Project with Clean Architecture and Laravel

This project aims to implement a CRUD (Create, Read, Update, Delete) system to manage employees using Clean Architecture principles and the Laravel framework.

## Clean Architecture

Clean Architecture is a software design approach that promotes separation of concerns and modularity. It is based on the principles of hexagonal architecture and the use of layers to organize code in a clean and maintainable way.

The Clean Architecture consists of the following layers:

- **Domain**: Contains the business entities and business rules of the application. In our project, we have the "Employee" entity with the following attributes:

    ```php
    private int $id;
    private string $name;
    private string $email;
    private string $position;
    private string $dateBirth;
    private string $address;
    private array $skills;
    ```

- **Use Cases**: Defines the use cases or actions that can be performed in the application. In our case, we have use cases such as creating an employee, getting an employee by ID, updating an employee, and deleting an employee.

- **Services**: Implements the business logic specific to each use case. Here, the interaction with repositories and other external components takes place.

- **Infrastructure**: Contains the concrete implementation of the infrastructure, such as Laravel controllers, database repositories, and other external components.

## Routes

The application routes are defined in the `api.php` file and are grouped under the "employees" prefix. The following routes are available:

- `GET /employees/{id}`: Get the details of an employee by their ID.
- `POST /employees`: Create a new employee.
- `PUT /employees/{id}`: Update the data of an existing employee.
- `DELETE /employees/{id}`: Delete an employee.
- `GET /employees`: Get the list of all employees.

## Project Setup

To configure and run the project, follow these steps:

1. Clone the repository from GitHub.
2. Run `composer install` to install Laravel dependencies.
3. Configure the database connection in the `.env` file.
4. Run migrations with the `php artisan migrate` command to create the necessary tables in the database.
5. Run `php artisan serve` to start the Laravel development server.
6. Make HTTP requests to the mentioned routes using a tool like Insomnia or Postman.

Now you're ready to start managing employees using this Clean Architecture and Laravel-based project!
