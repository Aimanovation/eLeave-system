# eLeave System

The eLeave System is a web-based application developed in PHP, designed to facilitate leave management for organizations. This repository contains the source code and resources for running the eLeave System locally on a Windows machine using XAMPP.

## Prerequisites

To run the eLeave System on your local machine, ensure you have the following software installed:

- [XAMPP](https://www.apachefriends.org/index.html): A web server solution that bundles Apache, MySQL, PHP, and other tools.

## Installation

Follow these steps to set up the eLeave System locally:

1. Clone this repository to your local machine.
```
git clone https://github.com/aimaniskndar/eLeave-system.git
```

2. Launch XAMPP and start the Apache and MySQL services.

3. Import the database.
- Open phpMyAdmin by accessing `http://localhost/phpmyadmin` in your web browser.
- Create a new database (e.g., `eleave_system`).
- Import the SQL dump file (`eleave.sql`) located in the repository's root directory into the newly created database.

4. Configure the application.
- Rename the `config.example.php` file located in the `config` directory to `config.php`.
- Open `config.php` and update the database connection details (hostname, database name, username, and password) according to your local setup.

5. Place the cloned repository into the appropriate web server directory:
- For XAMPP, move the `eleave-system` folder to the `htdocs` directory (usually located at `C:\xampp\htdocs\`).

6. Access the eLeave System in your web browser.
- Open your browser and navigate to `http://localhost/eleave-system/` to access the eLeave System.

## Usage

The eLeave System provides a user-friendly interface for managing employee leaves. It includes features such as leave requests, approval workflows, leave balance tracking, and reporting. Refer to the user documentation or any accompanying guides for detailed instructions on how to use the system effectively.

## Contributing

Contributions to the eLeave System are welcome! If you would like to contribute, please follow these steps:

1. Fork the repository and create a new branch for your feature or bug fix.

2. Make your changes and commit them to your branch.

3. Push your branch to your forked repository.

4. Submit a pull request, describing your changes and the rationale behind them.

## License

[MIT License](LICENSE)

Please note that this eLeave System is provided as-is without any warranty. Use it at your own risk.

## Contact

For any inquiries or support regarding the eLeave System, feel free to contact the project maintainer at [contact.aiman.azman@gmail.com](mailto:contact.aiman.azman@gmail.com).
