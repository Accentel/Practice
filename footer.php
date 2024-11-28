<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Set html and body to take up the full height */
        html, body {
            height: 100%;
        }

        /* Flexbox container for the entire page */
        body {
            display: flex;
            flex-direction: column;
        }

        /* Main content area, takes up all available space */
        .content {
            flex: 1;
        }

/* Footer styling */
/* .footer {
    height:100%;
    margin-top: 260px;
    margin-left: -70px;
    padding: 30px;
    
}
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */


        /* Footer styling */
        .footer {
            margin-top: 100px;
            padding: 30px;
            text-align: center;
            background-color: #333; /* Dark background */
            color: #fff; /* White text */
            width: calc(100% + 100px); /* Extend 100px beyond the page width */
            margin-left: -40px; /* Shift to align the extra width evenly */
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }
  </style>

  <title>Document</title>
</head>
<body>
  
<!-- Footer -->
<footer class="footer text-center py-3">
    <div class="container">
        <p>&copy; 2024 Employee Management | All rights reserved.</p>
    </div>
</footer>

<!-- Include jQuery and Bootstrap JS for dynamic behavior (optional) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
