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
  

        .ml-auto {
        margin-left: auto;
        }

        .text-center {
        text-align: center;
        }

        /* Progressbar */
        .progressbar, .progressbar0, .progressbar1{
        position: relative;
        display: flex;
        justify-content: space-between;
        counter-reset: step;
        margin: 2rem 0 4rem;
        }

        .progressbar::before,
        .progress {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }
		.progressbar0::before,
        .progress0 {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }
		.progressbar1::before,
        .progress1 {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }

        .progress, .progress0, .progress1{
        background-color: var(--primary-color);
        width: 0%;
        transition: 0.3s;
        }

        .progress-step, .progress-step0, .progress-step1{
        width: 2.1875rem;
        height: 2.1875rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .progress-step::before {
        counter-increment: step;
        content: counter(step);
        }

		.progress-step0::before {
        counter-increment: step;
        content: counter(step);
        }

		.progress-step1::before {
        counter-increment: step;
        content: counter(step);
        }

        .progress-step::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }
		.progress-step0::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }
		.progress-step1::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }

        .progress-step-active {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }

		.progress-step-active0 {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }
		.progress-step-active1 {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }


        /* Form 
        .form, .form0 {
        width: clamp(320px, 30%, 430px);
        margin: 0 auto;
        border-radius: 0.35rem;
        padding: 1.5rem;
        }*/

        .form-step, .form-step0, .form-step1 {
        display: none;
        transform-origin: top;
        animation: animate 0.5s;
        }

        .form-step-active, .form-step-active0, .form-step-active1 {
        display: block;
        }

        .input-group {
        margin: 2rem 0;
        }

        @keyframes animate {
        from {
            transform: scale(1, 0);
            opacity: 0;
        }
        to {
            transform: scale(1, 1);
            opacity: 1;
        }
        }

        /* Button */
        .btns-group, .btns-group0, .btns-group1 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        }

        .btn, .btn0, .btn1 {
        padding: 0.75rem;
        display: block;
        text-decoration: none;
        background-color: var(--primary-color);
        color: #f3f3f3;
        text-align: center;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: 0.3s;
        }
        .btn:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }
		.btn0:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }
		.btn1:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

        .left_userpersonal_info{display: flex;}
    </style>
</head>
<body>
    <div style="padding: 25px 25px; background: #71b280;" class="fontweight">
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