<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associate Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Include your custom style.css -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        header {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-col {
            width: 48%;
        }
        .input-field {
            position: relative;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: none;
        }
        select {
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            font-weight: bold;
        }
        .hidden {
            display: none;
        }
        #table-container {
            overflow-x: auto;
        }
        .button {
            margin: 25px 0 6px;
        }
        .button a {
            display: block;
            padding: 10px 20px; /* Adjust the padding to make buttons more rectangular */
            text-align: center;
            color: #fff;
            font-size: 16px;
            font-weight: 400;
            text-decoration: none;
            background-color: #11101d; /* Change the button background color */
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button a:hover {
            background-color: #000000; /* Change the button hover color */
        }

    </style>
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg">
        <header>Welcome, Associate!</header>
        <p class="text-center text-gray-700 mb-4">This is your dashboard for managing assigned RFQs.</p>

        <!-- Display assigned RFQ count (Sample data) -->
        <div class="text-center text-lg text-11101d font-semibold mb-4">Assigned RFQs: 10</div>

        <div id="table-container">
            <table class="hidden" id="rfq-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Allocation Date</th>
                        <th>Closing Date</th>
                        <th>Closing Time</th>
                        <th>Associate</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sample RFQ 1</td>
                        <td><a href="#">Sample Link</a></td>
                        <td>2023-01-15</td>
                        <td>2023-01-30</td>
                        <td>15:00:00</td>
                        <td>John Doe</td>
                        <td>Received</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sample RFQ 2</td>
                        <td><a href="#">Sample Link</a></td>
                        <td>2023-02-05</td>
                        <td>2023-02-20</td>
                        <td>14:30:00</td>
                        <td>Jane Smith</td>
                        <td>InQC</td>
                    </tr>
                    <!-- Add more sample data rows as needed -->
                </tbody>
            </table>
        </div>

        <div class="button" onclick="showTable()">
            <a href="#" class="text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full mt-4">View Assigned RFQ</a>
        </div>
        <div class="button">
            <a href="#" class="text-white px-4 py-2 rounded-lg hover:bg-red-700 w-full mt-4">Logout</a>
        </div>
    </div>

    <script>
        function showTable() {
            const table = document.getElementById('rfq-table');
            const container = document.getElementById('table-container');
            
            if (table && container) {
                table.classList.remove('hidden');
                container.style.width = table.offsetWidth + 'px';
            }
        }
    </script>
</body>
</html>
