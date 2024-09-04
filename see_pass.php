<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://kit.fontawesome.com/cbd855a2c0.js" crossorigin="anonymous"></script>

    <style>
    .form-pass{      
        /* display: block; */
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--bs-body-color);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: var(--bs-body-bg);
        background-clip: padding-box;
        border: var(--bs-border-width) solid var(--bs-border-color);
        border-radius: var(--bs-border-radius);
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        text-transform: none;

        }
    </style>

</head>
<body>
    
                <a href="#" onclick="togglePassword()">
                    <i id="togglePasswordIcon" class="far fa-eye" style="margin-left:30px;"></i>
                </a>
    
<script>

function togglePassword() {
        var passwordField = document.getElementById("password");
        var togglePasswordIcon = document.getElementById("togglePasswordIcon");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            // passwordField.style.fontSize = "20px";
            togglePasswordIcon.classList.remove("fa-eye");
            togglePasswordIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            // passwordField.style.fontSize = "initial";
            togglePasswordIcon.classList.remove("fa-eye-slash");
            togglePasswordIcon.classList.add("fa-eye");
        }
    }

</script>

</body>
</html>