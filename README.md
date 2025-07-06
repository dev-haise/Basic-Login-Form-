# Basic PHP Login System

This project is a simple, fundamental PHP-based login and registration system. It provides core functionalities for user account creation, secure authentication, and session management, serving as a solid base for web applications requiring user access.

## Project Structure

Markdown

# Basic PHP Login System

This project is a simple, fundamental PHP-based login and registration system. It provides core functionalities for user account creation, secure authentication, and session management, serving as a solid base for web applications requiring user access.

## Project Structure
Basic-Login-Form-/
├── config.php            # Database connection settings (MySQL host, name, user, pass)
├── home.php              # User dashboard/welcome page after successful login
├── index.html            # Main entry point, typically the login form
├── login.html            # (Optional) Alternative or linked login form page
├── login.php             # Server-side script to handle user login authentication
├── logout.php            # Handles user session termination
├── README.md             # This file, providing project overview and instructions
├── register.php          # Server-side script to handle new user registration
├── showpw.js             # JavaScript to toggle password visibility in forms
└── style.css             # Global stylesheets for consistent UI design

## Getting Started
To get this basic login system up and running on your local machine, primarily using XAMPP, follow these detailed steps.

### Prerequisites
* **Web Browser:** Any modern web browser (e.g., Chrome, Firefox, Edge).
* **XAMPP:** A free and open-source cross-platform web server solution stack. It bundles Apache, MariaDB (MySQL), PHP, and Perl, which are all necessary to run this project locally. Download from [apachefriends.org](https://www.apachefriends.org/).

### Installation

1.  **Clone the Repository:**
    Open your Git Bash or command prompt and run the following command to clone the project to your local machine:

    ```bash
    git clone [https://github.com/delulu-haise/Basic-Login-Form-.git](https://github.com/delulu-haise/Basic-Login-Form-.git)
    ```

2.  **Navigate to the Project Directory:**
    Change your current directory to the newly cloned project folder:

    ```bash
    cd Basic-Login-Form-
    ```

3.  **Place Project in XAMPP's `htdocs`:**
    After cloning, you will find a folder named `Basic-Login-Form-`.
    Copy this entire folder and paste it into your XAMPP installation's `htdocs` directory.
    * Typical Path: `C:\xampp\htdocs\` (on Windows) or `/Applications/XAMPP/htdocs/` (on macOS).

4.  **Start Apache and MySQL in XAMPP:**
    * Open the XAMPP Control Panel.
    * Click the "Start" button next to "Apache" to launch the web server.
    * Click the "Start" button next to "MySQL" to launch the database server.

5.  **Set Up Your Database (using phpMyAdmin):**
    * Open your web browser and navigate to `http://localhost/phpmyadmin/`.
    * In phpMyAdmin, click on the "New" option in the left sidebar (or "Databases" tab then "Create new database").
    * For the "Database name", type `loginfdb`. This exact name is expected by your `config.php` file.
    * Click the "Create" button.
    * Once `loginfdb` is created, click on its name in the left sidebar to select it.
    * Go to the "SQL" tab.
    * Paste the following SQL query into the text area and click "Go" to create the `users` table:

    ```sql
    CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```
    (Make sure this matches the actual schema your project expects for the users table. This is a common basic structure.)

6.  **Configure Database Connection in `config.php`:**
    * Open the `config.php` file located inside your `Basic-Login-Form-` project folder using a code editor (like VS Code, Sublime Text, Notepad++, etc.).
    * Verify that the database connection details are correctly set. For a default XAMPP installation and the database name created above, it should look like this:

    ```php
    <?php
    // config.php
    $localhost = "localhost";
    $dbname = "loginfdb"; // IMPORTANT: This must match the database name you created
    $username = "root";   // Default XAMPP MySQL username
    $password = "";       // Default XAMPP MySQL password (usually empty for 'root')

    // Create connection
    $conn = new mysqli($localhost, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```
    * **Note:** If you have set a password for your MySQL `root` user in XAMPP, you must update `$password = "";` to `$password = "your_mysql_root_password";`.

7.  **Run the Application:**
    * Open your web browser.
    * Navigate to the following URL: `http://localhost/Basic-Login-Form-/`
    * You should now see the login or registration page of your application.

## Usage

### User Registration:
* Open your web browser and navigate to `http://localhost/Basic-Login-Form-/register.php`.
* Fill in the registration form with your desired username, email, and password.
* Click the "Register" (or equivalent) button to create your account.

### User Login:
* Open your web browser and navigate to `http://localhost/Basic-Login-Form-/index.html` (or `login.html`).
* Fill in the login form with your registered username and password.
* Click the "Login" (or equivalent) button.

### Home Page:
* Upon successful login, you will be redirected to `home.php`, which typically serves as the user's dashboard or a protected content area.

### Logout:
* To end your session, click on the "Logout" link or button, which will redirect you to `logout.php`.

## Technologies Used
* **PHP:** Server-side scripting language for handling logic, database interactions, and session management.
* **MySQL / MariaDB:** Relational database management system used to store user information (usernames, hashed passwords, etc.).
* **HTML5:** Markup language for structuring the web pages (forms, links, etc.).
* **CSS3:** Stylesheet language for styling the user interface (layout, colors, fonts).
* **JavaScript:** Client-side scripting (specifically `showpw.js`) for interactive elements like toggling password visibility.

## Contributing
Contributions are welcome! If you'd like to improve this basic login system, please follow these steps:

1.  Fork the repository on GitHub.
2.  Create a new branch for your feature or bug fix (`git checkout -b feature/your-feature-name`).
3.  Make your changes and commit them with clear, descriptive messages (`git commit -m 'Add new feature X'`).
4.  Push your changes to your forked repository (`git push origin feature/your-feature-name`).
5.  Open a [Pull Request](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-with-pull-requests/creating-a-pull-request) to the `main` branch of this repository.