# Cost Center Module Documentation

## Overview

The **Cost Center** module is a part of the Accounting system. It is designed to manage and track costs associated with specific departments, projects, or activities within an organization.

## Features

-   Create, update, and delete cost centers.
-   Assign cost centers to transactions.
-   Generate reports based on cost center data.
-   Integration with other accounting modules.

## Installation

To install the Cost Center module, follow these steps:

1. Navigate to the module directory:
    ```bash
    cd /var/www/html/LMS/app/Modules/Accounting
    ```
2. Run the installation script:
    ```bash
    php artisan module:install CostCenter
    ```

## Configuration

1. Open the configuration file:
    ```bash
    nano /var/www/html/LMS/config/accounting.php
    ```
2. Add the following entry:
    ```php
    'modules' => [
         'CostCenter' => true,
    ],
    ```

## Usage

### Creating a Cost Center

1. Navigate to the Cost Center section in the Accounting module.
2. Click on **Add New Cost Center**.
3. Fill in the required details:
    - Name
    - Description
    - Department/Project
4. Save the cost center.

### Assigning a Cost Center

1. While creating a transaction, select the appropriate cost center from the dropdown.
2. Save the transaction.

### Generating Reports

1. Go to the **Reports** section.
2. Select **Cost Center Report**.
3. Choose the desired filters (e.g., date range, department).
4. Generate the report.

## API Endpoints

### List Cost Centers

```http
GET /api/cost-centers
```

### Create a Cost Center

```http
POST /api/cost-centers
Body:
{
  "name": "Marketing",
  "description": "Marketing Department Costs"
}
```

### Delete a Cost Center

```http
DELETE /api/cost-centers/{id}
```

## Troubleshooting

-   **Issue:** Cost center not appearing in the dropdown.
    -   **Solution:** Ensure the cost center is active and assigned to the correct department.
-   **Issue:** Report generation fails.
    -   **Solution:** Check the logs for errors and ensure all required filters are applied.

## Contributing

Contributions to the Cost Center module are welcome. Please follow the project's [contribution guidelines](../../CONTRIBUTING.md).

## License

This module is licensed under the [MIT License](../../LICENSE).
