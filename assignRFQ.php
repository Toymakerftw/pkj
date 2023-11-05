<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign RFQ</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px; /* Adjust the max-width to your preference */
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
            width: 48%; /* Adjust the width to create two columns with a small gap */
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
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="container">
        <header>Assign RFQ</header>
        <form action="#">
            <div class="form-row">
                <div class="form-col">
                    <div class="input-field">
                        <input type="text" id="id" name="id" placeholder="ID" required class="email">
                    </div>
                </div>
                <div class="form-col">
                    <div class="input-field">
                        <input type="text" id="description" name="description" placeholder="Description" required class="password">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="input-field">
                        <input type="text" id="link" name="link" placeholder="Link" required class="cPassword">
                    </div>
                </div>
                <div class="form-col">
                    <div class="input-field">
                        <input type="date" id="allocation_date" name="allocation_date" value="<?php echo date('Y-m-d'); ?>" placeholder="Allocation Date" required class="email">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="input-field">
                        <input type="date" id="closing_date" name "closing_date" placeholder="Closing Date" required class="password">
                    </div>
                </div>
                <div class="form-col">
                    <div class input-field="">
                        <input type="time" id="closing_time" name="closing_time" placeholder="Closing Time" required class="cPassword">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="input-field">
                        <select id="associate" name="associate" required class="email">
                        <option value="" disabled selected>Select an Associate</option>
                            <!-- Populate this dropdown dynamically using JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="form-col">
                    <div class="input-field">
                        <select id="status" name="status" required class="password">
                            <option value="Pool">Pool</option>
                            <option value="Requested">Requested</option>
                            <option value="Received">Received</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="InQc">InQc</option>
                            <option value="Qc-accepted">Qc-accepted</option>
                            <option value="Qc-rejected">Qc-rejected</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="input-field">
                        <select id="form_status" name="form_status" required class="cPassword">
                            <option value="Drafted">Drafted</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>
                <div class="form-col">
                    <div class="input-field">
                        <textarea id="remarks" name="remarks" placeholder="Remarks" class="email"></textarea>
                    </div>
                </div>
            </div>
            <div class="input-field button">
                <input type="submit" value="Assign RFQ" class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-700 w-full">
            </div>
        </form>
    </div>
    <script src="assets/scripts/assign_rfqs.js"></script>
</body>
</html>
