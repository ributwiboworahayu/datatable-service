# DataTable Service for Laravel

The `datatable-service` package is designed to integrate DataTables with Laravel, making it easy to manage table data with efficient searching, sorting, and pagination.

## Installation

### 1. Add the Package to Your Laravel Project

To add this package to your Laravel project, open your terminal and run the following command:

```bash
composer require ributwiboworahayu/datatable-service
```

### 2. Register the Service Provider

Add the service provider to the `providers` array in the `config/app.php` file:

```php
'providers' => [
    // ...
    DatatableService\DataTableServiceProvider::class,
],
```

## Usage

### 1. Using `DataTableService` in a Controller

You can use `DataTableService` in your Laravel controllers. Here is an example of how to use it:

```php
<?php

namespace App\Http\Controllers;

use DatatableService\DataTableService; // Import the class
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    protected $dataTableService;

    public function __construct(DataTableService $dataTableService) // Dependency injection
    {
        $this->dataTableService = $dataTableService;
    }

    public function index(Request $request)
    {
        $query = YourModel::query(); // Replace with your model
        $columns = ['tableName.column1', 'tableName.column2']; // Replace with relevant columns

        // Using applyDataTables to get DataTables response
        $dataTablesResponse = $this->dataTableService->applyDataTables($query, $request, $columns);
        if(!$dataTablesResponse['ajax']) return redirect()->route('dashboard.index')->withErrors('Invalid request'); // redirect if needed

        return response()->json($dataTablesResponse);
    }
}
```

### 2. Adding Routes

Make sure to add the appropriate route in `routes/web.php` or `routes/api.php`:

```php
use App\Http\Controllers\ExampleController;

Route::get('/data', [ExampleController::class, 'index']);
```

### 3. Using DataTables on the Frontend

You can use DataTables on the frontend to display the managed data. Here’s an example of how to use DataTables with jQuery:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be populated here by DataTables -->
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/data', // URL endpoint used to fetch data
            type: 'GET'
        },
        columns: [
            { data: 'column1', name: 'column1' },
            { data: 'column2', name: 'column2' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false } // Adding actions column
        ]
    });
});
</script>

</body>
</html>
```

## Configuration

If you have default settings, you can add them in the `config/datatable.php` configuration file. Make sure to publish the configuration file if necessary.

```bash
php artisan vendor:publish --provider="DatatableService\DataTableServiceProvider"
```

## Conclusion

The `datatable-service` package allows you to easily manage data tables in Laravel with features like searching, sorting, and pagination. By following the tutorial above, you can now easily integrate DataTables with your Laravel application.

If you have any questions or need further assistance, please open an [issue on GitHub](https://github.com/ributwiboworahayu/datatable-service/issues).

---

# Layanan DataTable untuk Laravel

Paket `datatable-service` dirancang untuk mengintegrasikan DataTables dengan Laravel, memudahkan Anda mengelola data tabel dengan pencarian, pengurutan, dan paginasi yang efisien.

## Instalasi

### 1. Tambahkan Paket ke Proyek Laravel Anda

Untuk menambahkan paket ini ke proyek Laravel Anda, buka terminal dan jalankan perintah berikut:

```bash
composer require ributwiboworahayu/datatable-service
```

### 2. Mendaftarkan Service Provider

Tambahkan service provider ke dalam array `providers` di file `config/app.php`:

```php
'providers' => [
    // ...
    DatatableService\DataTableServiceProvider::class,
],
```

## Penggunaan

### 1. Menggunakan `DataTableService` dalam Controller

Anda dapat menggunakan `DataTableService` di dalam controller Laravel Anda. Berikut adalah contoh cara menggunakannya:

```php
<?php

namespace App\Http\Controllers;

use DatatableService\DataTableService; // Mengimpor kelas
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    protected $dataTableService;

    public function __construct(DataTableService $dataTableService) // Dependency injection
    {
        $this->dataTableService = $dataTableService;
    }

    public function index(Request $request)
    {
        $query = YourModel::query(); // Ganti dengan model Anda
        $columns = ['tableName.column1', 'tableName.column2']; // Ganti dengan kolom yang relevan

        // Menggunakan applyDataTables untuk mendapatkan response DataTables
        $dataTablesResponse = $this->dataTableService->applyDataTables($query, $request, $columns);
        if(!$dataTablesResponse['ajax']) return redirect()->route('dashboard.index')->withErrors('Invalid request'); // redirect if needed

        return response()->json($dataTablesResponse);
    }
}
```

### 2. Menambahkan Routing

Pastikan Anda menambahkan route yang sesuai dalam `routes/web.php` atau `routes/api.php`:

```php
use App\Http\Controllers\ExampleController;

Route::get('/data', [ExampleController::class, 'index']);
```

### 3. Menggunakan DataTables di Frontend

Anda bisa menggunakan DataTables di frontend untuk menampilkan data yang telah dikelola. Berikut adalah contoh penggunaan DataTables dengan jQuery:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be populated here by DataTables -->
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/data', // URL endpoint yang digunakan untuk mengambil data
            type: 'GET'
        },
        columns: [
            { data: 'column1', name: 'column1' },
            { data: 'column2', name: 'column2' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false } // Menambahkan kolom actions
        ]
    });
});
</script>

</body>
</html>
```

## Kesimpulan

Paket `datatable-service` memungkinkan Anda untuk dengan mudah mengelola tabel data di Laravel dengan fitur-fitur seperti pencarian, pengurutan, dan paginasi. Dengan mengikuti tutorial di atas, Anda sekarang dapat mengintegrasikan DataTables dengan aplikasi Laravel Anda dengan mudah.

Jika Anda memiliki pertanyaan atau butuh bantuan lebih lanjut, silakan buka [issue di GitHub](https://github.com/ributwiboworahayu/datatable-service/issues).
