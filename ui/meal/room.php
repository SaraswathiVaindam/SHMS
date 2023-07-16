<!DOCTYPE html>
<html>
<head>
    <title>Room Details</title>
    <style>
            body {
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTwpSX3pNKVdZQp3XDZUnuU6W-KP1tqq36wMZa9MPt6fwhYAGfRQNHV-ysQlk16rhF-cg&usqp=CAU");
  background-repeat: no-repeat;
  background-size: cover;
}

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-group > div {
            margin-right: 20px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        // Check if there is stored form data in localStorage
        echo '<script>var storedData = localStorage.getItem("formData");</script>';
        echo '<script>if (storedData) { var formData = JSON.parse(storedData); }</script>';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $formData = array();
            for ($i = 0; $i < 6; $i++) {
                $name = isset($_POST['name'][$i]) ? $_POST['name'][$i] : '';
                $studentId = isset($_POST['studentId'][$i]) ? $_POST['studentId'][$i] : '';
                $phoneNumber = isset($_POST['phoneNumber'][$i]) ? $_POST['phoneNumber'][$i] : '';
                $formData[] = [
                    'name' => $name,
                    'studentId' => $studentId,
                    'phoneNumber' => $phoneNumber
                ];
            }

            // Store the form data in session
            $_SESSION['formData'] = $formData;

            // Store the form data in localStorage
            $formDataJson = json_encode($formData);
            echo '<script>localStorage.setItem("formData", ' . $formDataJson . ');</script>';
        }

        ?>

        <h1 style="margin-top: 20px;">Enter Details</h1>
        <div class="form-group">
            <div>
                <h2 style="text-align:center;">Left </h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        echo "<h4>Entry " . ($i + 1) . "</h4>";
                        echo "<table style='width:100%;'>";
                        echo "<tr><td><label for='name'>Name:</label></td><td><input type='text' name='name[]' id='name' value='" . (isset($_SESSION['formData'][$i]['name']) ? $_SESSION['formData'][$i]['name'] : '') . "'></td></tr>";
                        echo "<tr><td><label for='studentId'>Student ID:</label></td><td><input type='text' name='studentId[]' id='studentId' value='" . (isset($_SESSION['formData'][$i]['studentId']) ? $_SESSION['formData'][$i]['studentId'] : '') . "'></td></tr>";
                        echo "<tr><td><label for='phoneNumber'>Phone Number:</label></td><td><input type='text' name='phoneNumber[]' id='phoneNumber' value='" . (isset($_SESSION['formData'][$i]['phoneNumber']) ? $_SESSION['formData'][$i]['phoneNumber'] : '') . "'></td></tr>";
                        echo "</table>";
                    }
                    ?>
                </div>
                <div>
                    <h2 style="text-align:center;">Right</h2>
                    <?php
                    for ($i = 3; $i < 6; $i++) {
                        echo "<h4>Entry " . ($i + 1) . "</h4>";
                        echo "<table style='width:100%;'>";
                        echo "<tr><td><label for='name'>Name:</label></td><td><input type='text' name='name[]' id='name' value='" . (isset($_SESSION['formData'][$i]['name']) ? $_SESSION['formData'][$i]['name'] : '') . "'></td></tr>";
                        echo "<tr><td><label for='studentId'>Student ID:</label></td><td><input type='text' name='studentId[]' id='studentId' value='" . (isset($_SESSION['formData'][$i]['studentId']) ? $_SESSION['formData'][$i]['studentId'] : '') . "'></td></tr>";
                        echo "<tr><td><label for='phoneNumber'>Phone Number:</label></td><td><input type='text' name='phoneNumber[]' id='phoneNumber' value='" . (isset($_SESSION['formData'][$i]['phoneNumber']) ? $_SESSION['formData'][$i]['phoneNumber'] : '') . "'></td></tr>";
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
            <div style="text-align: center;">
                <input type="submit" value="Submit">
            </div>
        </form>

        <?php
        if (isset($_SESSION['formData']) && count($_SESSION['formData']) > 0) {
            echo "<h2 style='margin-top:50px;'>Submitted Data:</h2>";
            echo "<table style='text-align: center;'>";
            echo "<tr><th>Name</th><th>Student ID</th><th>Phone Number</th></tr>";
            foreach ($_SESSION['formData'] as $data) {
                echo "<tr><td>{$data['name']}</td><td>{$data['studentId']}</td><td>{$data['phoneNumber']}</td></tr>";
            }
            echo "</table>";
        }
        ?>

        <button onclick="location.href='reset.php'" style="margin:20px;">Reset Data</button>
    </div>
</body>
</html>
