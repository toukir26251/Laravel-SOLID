# Laravel SOLID Payment System

This repository demonstrates a basic structure for an order and payment system using Laravel, following SOLID principles. This is a boilerplate implementation with no business logic, focused on adhering to a clean architecture and maintainable code.

## Understanding SOLID

SOLID is an acronym that represents five principles of object-oriented programming and design:

1. **Single Responsibility Principle (SRP)** - Each class should have only one responsibility or reason to change.
2. **Open/Closed Principle (OCP)** - Classes should be open for extension but closed for modification.
3. **Liskov Substitution Principle (LSP)** - Subtypes should be substitutable for their base types without altering the correctness of the program.
4. **Interface Segregation Principle (ISP)** - Clients should not be forced to depend on methods they do not use.
5. **Dependency Inversion Principle (DIP)** - High-level modules should not depend on low-level modules, but both should depend on abstractions.

## Project Structure

This project implements a basic payment flow, with the following routes and structure:

### Routes

- **`GET /payment-amount/{orderId?}`**: Fetches the payment amount for a given order.
- **`GET /payment-gateway-link/{orderId?}/{gatewayId?}`**: Generates a link to the selected payment gateway for the given order.
- **`GET /payment-verification/{orderId?}`**: Verifies the payment status for the given order.

These routes are defined in `web.php` and handled by the `PaymentController`.

### Controller

The `PaymentController` manages the payment process. It interacts with the following repositories and services:

- **`PaymentRepository`**: Implements `PaymentRepositoryInterface`. This repository is responsible for interacting with multiple payment gateways.
- **`StripePaymentRepository`** & **`PaypanPaymentRepository`**: Both implement `PaymentGatewayRepositoryInterface` as they handle similar tasks: generating payment URLs, taking payments, and validating them.

### Services

- **`OrderService`**: Handles order-specific logic.
- **`PaymentService`**: Manages payment-related operations. All logical operations are broken down into single responsibility services to keep the code clean and modular.

### Repositories

All service classes are used within the repository classes to adhere to the **Single Responsibility Principle**. This allows for each part of the application to focus on one aspect, while also making it easier to test and extend in the future.
