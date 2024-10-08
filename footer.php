<!DOCTYPE html>
<html lang="en">
<head>
  <style>

/* Footer styling */
.footer {
    hight:100%;
    margin-top: 30px;
    margin-left: -45px;
    padding: 10px;
    
}


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
</style>

  <title>Document</title>
</head>
<body>
  
<!-- Footer -->
<footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Employee Management. All rights reserved.</p>
        </div>
    </footer>

    <!-- Include jQuery and Bootstrap JS for dynamic behavior (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>