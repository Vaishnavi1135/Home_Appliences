<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .order-info {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .order-info div {
            text-align: left;
        }
        .status {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin: 10px 0;
        }
        .timeline {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin: 40px 0;
        }
        .timeline::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 5%;
            width: 90%;
            height: 5px;
            background: #ddd;
            transform: translateY(-50%);
            z-index: 0;
        }
        .step {
            position: relative;
            background: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            flex: 1;
        }
        .step .icon {
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            background: #ddd;
            color: white;
            position: relative;
            z-index: 1;
        }
        .completed .icon {
            background: #28a745;
        }
        .active .icon {
            background: #007bff;
        }
    </style>
</head>
<body>

    <div class="container">
        <p>Please note that these are accurate but not guaranteed estimates. Delivery dates may change.</p>

        <div class="order-info">
            <div><strong>ORDER PLACED</strong><br>May 30, 2021</div>
            <div><strong>TOTAL</strong><br>$2365.00 USD</div>
            <div><strong>SHIP TO</strong><br>John Doe</div>
            <div><strong>ORDER #</strong><br>#1606</div>
        </div>

        <h2 class="status">Order Status: <span style="color: green;">Ocean Transit</span></h2>
        <p>Estimated Delivery: <strong>July 29 - Aug 8</strong></p>

        <div class="timeline">
            <div class="step completed">
                <div class="icon">✔</div>
                <p>Order Placed<br><strong>May 30, 2021</strong></p>
            </div>
            <div class="step completed">
                <div class="icon">📦</div>
                <p>In Production<br><strong>May 31, 2021</strong></p>
            </div>
            <div class="step active">
                <div class="icon">🚢</div>
                <p>Ocean Transit<br><strong>June 29, 2021</strong></p>
            </div>
            <div class="step">
                <div class="icon">🚚</div>
                <p>Shipping Final Mile<br><strong>July 26 - 29</strong></p>
            </div>
            <div class="step">
                <div class="icon">🎁</div>
                <p>Delivered<br><strong>July 29 - Aug 8</strong></p>
            </div>
        </div>
    </div>

</body>
</html>
