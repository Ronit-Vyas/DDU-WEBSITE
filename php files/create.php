 
<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_name = trim($_POST["Name"]);
    $name = $input_name;

    $input_department = trim($_POST["Department"]);
    $department = $input_department;

    $input_cnname = trim($_POST["Company_Name"]);
    $cnname = $input_cnname;

    $input_salary = trim($_POST["Package"]);
    $salary = $input_salary;
    $input_img = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $img = $input_img;

    // Prepare an insert statement
    $sql = "INSERT INTO alumni (Name, Department, Company_Name , Package ,Image) VALUES (?, ?, ? ,?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssis", $param_name, $param_department, $param_cnname, $param_salary, $param_img,);

        // Set parameters
        $param_name = $name;
        $param_department = $department;
        $param_cnname = $cnname;
        $param_salary = $salary;
        $param_img = $img;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records created successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
}
?>

<?php include "upload.php";?>
<h2>Create Record</h2>

<p>Please fill this form and submit to add employee record to the database.</p>
<form action="  " method="post" enctype="multipart/form-data">

<label>Name</label>
<input type="text" name="Name"><br><br>
<label>Department</label>
<input type="text" name="Department"><br><br>
<label>Company name</label>
<input type="text" name="Country_Name"><br><br>
<label>Package</label>
<input type="text" name="Package"><br><br>
<input type="file" name="fileUpload" id="chooseFile">
<button type="submit" name="submit">Upload Photo</button>

<?php if(!empty($resMessage)) {
    echo $resMessage['message'];
}
?>
<br><br><br><br>
<input type="submit" value="Submit">
<a href="index.php">Cancel</a>
</form>
 