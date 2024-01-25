<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order</title>
</head>

<body>
    <br>
    You have a new Order from {{ ucwords($order->user->name) }}
    <br><br>
    click here to see it
    <a href="{{ route('orders.show', $order->id) }}">View</a>
    <br>
</body>

</html>