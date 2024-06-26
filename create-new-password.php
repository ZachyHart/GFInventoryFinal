<?php 
    include_once './helpers/session_helper.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Got Funko Collections</title>
    <!-- Cool Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Our stylesheet -->
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- Sweetalerts & Jquery --> 
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div id="form_container" class="col-md-6">
                <div id="form_header_container" class="text-center">
                    <div id="logo_container">
                        <img id="logo" src="img/CircularLogo.jpg" alt="Logo" class="img-fluid">
                    </div>
                    <h1 id="form_header" class="text-center mt-3">Enter New Password</h1>
                    </div>
<?php 
    if(empty($_GET['selector']) || empty($_GET['validator'])){
        echo 'Could not validate your request!';
    }else{
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
        
        if(ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>


    <form method="post" action="./controllers/ResetPasswords.php">
    <div id="form_content_container" class="bg-white p-4 rounded">
        <div id="form_content_inner_container">
        <input type="hidden" name="type" value="reset" />
        <input type="hidden" name="selector" value="<?php echo $selector ?>" />
        <input type="hidden" name="validator" value="<?php echo $validator ?>" />
        <input type="hidden" name="role" value="admin"/>
        <input type="password" class="form-control mb-3" name="pwd" placeholder="Enter New Password..."/>
        <input type="password" class="form-control mb-3" name="pwd-repeat" placeholder="Repeat new password..."/>

        <div id="button_container" class="text-center mt-3" name="submit">
                            <button type="submit" button class="btn btn-primary">CHANGE PASSWORD</button>
                        </div>
                        </form>

            
<?php 
    }else{
        echo 'Could not validate your request!';
    }
}
?>

    <!-- Bootstrap and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- ... (other scripts and closing tags) ... -->
</body>
<?php
    if(isset($_SESSION['flash-msg'])){
        $msg = $_SESSION['flash-msg'];
        if($msg == 'password-invalid'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Your password should be at least 8 characters, uppercase, lowercase, and numeric.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'fill-fields'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Please fill all fields.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'password-unmatched'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Password and Repeat Password are not matched.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }
    }
?>
</html>
    