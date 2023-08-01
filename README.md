# JWT Authentication API

Secure your API with JWT-based authentication for user login, registration, logout, and user profile management.

## Overview

This project provides a simple yet powerful API with JWT (JSON Web Token) authentication. JWT is used to secure and authenticate user requests, providing a stateless and secure way to handle user sessions. Users can register, log in, and log out, and their profile information can be accessed through secure endpoints.

## Features

- User registration with validation for unique email addresses.
- User login with password validation and JWT generation.
- Secure endpoints using JWT authentication for user profile access.
- User logout for terminating sessions.
- Token refresh mechanism for extended access without re-authentication.
- Customizable response messages and error handling.
- Built with Laravel, a robust and feature-rich PHP framework.

## Getting Started

Follow these simple steps to get started with the JWT Authentication API:

1. Clone the repository to your local development environment.
2. Install the project dependencies using Composer.
3. Set up your environment variables and database configuration.
4. Migrate the database to create the necessary tables.
5. Start the development server and begin testing the API endpoints.

## API Endpoints

- **POST /api/auth/register**: Register a new user with a unique email address and a secure password.

- **POST /api/auth/login**: Log in an existing user with their email and password, and receive a JWT for authenticated requests.

- **POST /api/auth/logout**: Log out the authenticated user and invalidate the JWT.

- **GET /api/auth/profile**: Access the user profile by providing a valid JWT.

## How It Works

The API uses JWTs to authenticate users. When a user registers or logs in, the API generates a JWT containing user-specific information. This token is then sent with subsequent requests to access protected routes. The API also provides a logout endpoint to invalidate the token, ensuring secure session management.

## Usage

Refer to the [API documentation](/docs) for detailed information about the available endpoints and request parameters.

## Contributing

We welcome contributions from the community! If you find any bugs or want to add new features, please submit a pull request or open an issue.

## License

This project is licensed under the [MIT License](/LICENSE), allowing you to use, modify, and distribute the code freely.

Start building secure APIs with JWT authentication today!
