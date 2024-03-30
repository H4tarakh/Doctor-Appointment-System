<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor or Patient?</title>
   
<link rel="stylesheet" href="selection.css">

</head>
<body>
    <div id="selectionForm"  class="container">

        <form id="selection">
            <h2>Are you a Doctor or a Patient?</h2>
            <div class="options">
                <label class="option-box" for="doctor">
                    <img src="demo1.jpg" alt="Doctor">
                    <p>Doctor</p>
                    <div class="radio-container">
                        <input type="radio" id="doctor" name="role" value="doctor">
                    </div>
                </label>
                <label class="option-box" for="patient">
                    <img src="demo3.png"  alt="Patient">
                    <p>Patient</p>
                    <div class="radio-container">
                        <input type="radio" id="patient" name="role" value="patient">
                    </div>
                </label>
            </div>
            <div class=sub>
                <input type="submit" value="Submit" onclick="nextForm()">  
            </div>
        </form>

    </div>

    <script>
        function nextForm() {

            var role = document.querySelector('input[name="role"]:checked').value;
            if (role === 'doctor') {
                window.open('dreg.php', '_blank');
            } else if (role === 'patient') {
                window.open('preg.php', '_blank');
            }
        }
    </script>
</body>
</html>

