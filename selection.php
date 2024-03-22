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
                    <img src="https://www.medibuddy.in/assets/services/mb-gold/unlimited-consultations.svg" alt="Doctor">
                    <p>Doctor</p>
                    <div class="radio-container">
                        <input type="radio" id="doctor" name="role" value="doctor">
                    </div>
                </label>
                <label class="option-box" for="patient">
                    <img src="demo2.png" width="90px" alt="Patient">
                    <p>Patient</p>
                    <div class="radio-container">
                        <input type="radio" id="patient" name="role" value="patient">
                    </div>
                </label>
            </div>
            <input type="submit" value="Submit" onclick="nextForm()">  
        </form>

    </div>

    <script>
        function nextForm() {

            var role = document.querySelector('input[name="role"]:checked').value;
            if (role === 'doctor') {
                window.open('docform.php', '_blank');
            } else if (role === 'patient') {
                window.open('index.php', '_blank');
            }
        }
    </script>
</body>
</html>
