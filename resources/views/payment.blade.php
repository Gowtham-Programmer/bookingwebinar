<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            /* background: #f8f9fa; */
            /* background-color: silver; */
            background-image: url('{{ asset('uploads/img/payment.jpg') }}');
        }
        .payment-card {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .payment-header {
            background: #007bff;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            text-align: center;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-pay {
            background: #007bff;
            color: white;
            font-weight: bold;
        }
        .order-summary {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
        }
        .order-summary h5 {
            margin-bottom: 15px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .promo-link {
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="payment-card">
    <div class="payment-header">Secure Payment</div>
    <div class="row no-gutters">
        
        <!-- Left Side: Payment Form -->
        <div class="col-md-7 p-4">
            <h5 class="mb-3">Choose Your Plan</h5>
            <select id="plan" class="form-control mb-4">
                <option value="10">Basic - $10</option>
                <!-- <option value="79.99">Standard - $79.99</option>
                <option value="99.99">Premium - $99.99</option> -->
            </select>

            <h5 class="mb-3">Card Information</h5>
            <form>
                <div class="form-group">
                    <label>Cardholder Name</label>
                    <input type="text" class="form-control" placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Expiry Date</label>
                        <input type="text" class="form-control" placeholder="MM/YY">
                    </div>
                    <div class="form-group col-md-6">
                        <label>CVV</label>
                        <input type="text" class="form-control" placeholder="123">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="saveCard">
                    <label class="form-check-label" for="saveCard">Save card details for future</label>
                </div>
                <button type="button" class="btn btn-pay btn-block">Pay Now</button>
            </form>
        </div>

        <!-- Right Side: Order Summary -->
        <div class="col-md-5 p-4 order-summary">
            <h5>Order Summary</h5>
            <div class="summary-row">
                <span>Subtotal</span>
                <span id="subtotal">$46.98</span>
            </div>
            <div class="summary-row">
                <span>Discount</span>
                <span id="discount">$5.00</span>
            </div>
            <div class="summary-row font-weight-bold">
                <span>Total</span>
                <span id="total">$46.98</span>
            </div>
            <hr>
            <div class="summary-row">
                <span class="promo-link" id="promo-link">+ Add Promo Code</span>
            </div>
        </div>
    </div>
</div>

<!-- jQuery & Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
// $(document).ready(function() {
//     let discountRate = 0.5; // default no discount

//     function updateSummary() {
//         let price = parseFloat($("#plan").val());
//         let discountAmount = price * discountRate;
//         let total = price - discountAmount;

//         $("#subtotal").text(`$${price.toFixed(2)}`);
//         $("#discount").text(`$${discountAmount.toFixed(2)}`);
//         $("#total").text(`$${total.toFixed(2)}`);
//     }

//     $("#plan").on("change", function() {
//         updateSummary();
//     });

//     $("#promo-link").on("click", function() {
//         let promo = prompt("Enter promo code:");
//         if (promo && promo.toLowerCase() === "save10") {
//             discountRate = 0.50; // 10% discount
//             alert("Promo applied: 10% off!");
//         } else {
//             discountRate = 0;
//             alert("Invalid promo code.");
//         }
//         updateSummary();
//     });

//     updateSummary();

$(document).ready(function() {
    let discountRate = 0; // no discount by default

    function updateSummary() {
        let price = parseFloat($("#plan").val());
        let discountAmount = price * discountRate;
        let total = price - discountAmount;

        $("#subtotal").text(`$${price.toFixed(2)}`);
        $("#discount").text(`$${discountAmount.toFixed(2)}`);
        $("#total").text(`$${total.toFixed(2)}`);
    }

    $("#plan").on("change", function() {
        updateSummary();
    });

    $("#promo-link").on("click", function() {
        let promo = prompt("Enter promo code:");
        if (promo && promo.toLowerCase() === "save10") {
            discountRate = 0.10; // 10% discount
            alert("Promo applied: 10% off!");
        } else {
            discountRate = 0;
            alert("Invalid promo code.");
        }
        updateSummary();
    });

    updateSummary();
});
</script>

</body>
</html>
