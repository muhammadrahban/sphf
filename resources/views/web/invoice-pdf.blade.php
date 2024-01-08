<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        /* Styles for the invoice */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .invoice {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="invoice">

    <h1>Invoice</h1>

    <!-- Use the provided JSON data -->
    <p><strong>Transaction ID:</strong> {{ $decodedData['TransactionId'] }}</p>
    <p><strong>Transaction Amount:</strong> {{ $decodedData['TransactionAmount'] }}</p>
    <p><strong>Transaction Status:</strong> {{ $decodedData['TransactionStatus'] }}</p>
    <p><strong>Order Date & Time:</strong> {{ $decodedData['OrderDateTime'] }}</p>
    <p><strong>Transaction Date & Time:</strong> {{ $decodedData['TransactionDateTime'] }}</p>
    <p><strong>Merchant Name:</strong> {{ $decodedData['MerchantName'] }}</p>
    <p><strong>Store Name:</strong> {{ $decodedData['StoreName'] }}</p>
    <p><strong>Transaction Reference Number:</strong> {{ $decodedData['TransactionReferenceNumber'] }}</p>
    <p><strong>Mobile Number:</strong> {{ $decodedData['MobileNumber'] }}</p>
    <p><strong>Description:</strong> {{ $decodedData['Description'] }}</p>

</div>

</body>
</html>