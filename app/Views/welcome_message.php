<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Supplier Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #dd4814;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .table th {
            background-color: #e9ecef;
        }

        .btn-custom {
            background-color: #dd4814;
            color: white;
        }

        .btn-custom:hover {
            background-color: #c75d19;
        }
    </style>
</head>

<body>

    <header class="header">
        <h1>Supplier Management</h1>
    </header>

    <div class="container mt-4">
        <h2>Supplier List</h2>
        <a href="add_supplier.php" class="btn btn-custom mb-3">Add New Supplier</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Supplier</th>
                    <th>Name</th>
                    <th>PIC Name</th>
                    <th>PIC Phone</th>
                    <th>Phone Company</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
                    $stmt = $pdo->query("SELECT * FROM suppliers");
                    while ($supplier = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$supplier['idsupplier']}</td>";
                        echo "<td>{$supplier['name']}</td>";
                        echo "<td>{$supplier['pic_name']}</td>";
                        echo "<td>{$supplier['pic_phone']}</td>";
                        echo "<td>{$supplier['phone_company']}</td>";
                        echo "<td>{$supplier['email']}</td>";
                        echo "<td>{$supplier['address']}</td>";
                        echo "<td>
                            <a href='edit_supplier.php?id={$supplier['idsupplier']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_supplier.php?id={$supplier['idsupplier']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>