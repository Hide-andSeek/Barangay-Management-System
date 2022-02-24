<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <title>Payment</title>

    
    <style>
        *{top: 0;}
        .fontweight{font-weight: 0.8;}
        :root {
        --primary-color: rgb(11, 78, 179);
        }

        /* Global Stylings */
        label {
        display: block;
        margin-bottom: 0.5rem;
        }

        input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        }
  

      
        .left_userpersonal_info{display: flex;}
    </style>
</head>
<body>
    <div style="padding: 25px 25px; background: #04AA6D;" class="fontweight">
       <label class="merchantname" style="color: white; font-size: 25px; margin-left: 45px;">BARANGAY COMMONWEALTH <i style="font-size: 20px;">doing business as</i></label> 
       <label class="merchantname" style="color: white; font-size: 35px; margin-left: 45px;">DOCUMENT REQUEST</label> 
        <div style="float: right; margin-top: -110px; ">
                <img style="width: 110px; height: 110px;" src="img/Brgy-Commonwealth.png" alt="">  
        </div>  
    </div>
    <div style="padding: 15px 15px; background: gray; " >
        <label style="margin-left: 45px;">Reference Number: (Put a Reference No. Here!)</label>
    </div>
    
    <div style="margin-top: 35px;">
        <form action="process.php" method="post">
            <input type="text" name="amount" id="currency" data-type="currency">
            <button type="submit">Donate</button>
        </form>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/payment.js"></script>
</body>
</html>