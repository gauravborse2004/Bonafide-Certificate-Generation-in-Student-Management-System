<?php 
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";

if ($role == "faculty") {
    include("header_faculty.php");
    include("sidebar_faculty.php");
} elseif ($role == "student") {
    include("header_student.php");
    include("sidebar_student.php");
} else {
    include("header.php");
    include("sidebar.php");
}
?>

<style>
    .main {
        padding: 40px 0;
        background-color: #f8f9fa;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        padding: 25px;
        margin-top: 30px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .myCard img {
        border-radius: 8px;
        border: 1px solid #ccc;
        height: 300px;
        width: 100%;
        object-fit: contain;
        background-color: #f0f0f0; /* Optional: to show image padding space */
    }

    h3 p {
        font-size: 16px;
        color: #333;
        margin: 8px 0;
    }

    .btn .p-2 {
        text-align: center;
        background-color: #0d6efd;
        color: white;
        border-radius: 5px;
        padding: 10px;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .btn .p-2 a {
        text-decoration: none;
        color: white;
        display: block;
    }

    .btn .p-2:hover {
        background-color: #084298;
    }

    @media (max-width: 768px) {
        .row.p-2 {
            flex-direction: column;
        }

        .col-md-5,
        .col-md-7 {
            width: 100% !important;
        }

        .btn {
            margin-top: 10px;
        }
    }
</style>

<main id="main" class="main">
    <div class="container">
        <div class="row">

        <?php
        include("connection.php");
        $myVar = $_GET["myVar"];
        $myQuery = "SELECT * FROM studentdata WHERE PRN='" . $myVar . "'";
        $result = $conn->query($myQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prn = $row["PRN"];
                $fullname = $row["fullName"];
                $class = $row["Class"];
                $gender = $row["Gender"];
                $dob = $row["DOB"];
                $category = $row["Category"];
                $contact = $row["Contact"];
                $email = $row["Email"];
                $ch = $row["collegeHostel"];
                $bf = $row["busFacility"];
                $address = $row["Address"];
                $ph = $row["photo"];

                echo '
                <div class="row p-2">
                    <div class="myCard p-2 col-md-5" style="text-align: center;">
                        <img src="uploads/student/' . $ph . '" class="img-fluid mb-2" alt="Student Photo">
                    </div>
                    <div class="col-md-7 p-4">
                        <h3>
                            <p><strong>Name:</strong> ' . $fullname . '</p>
                            <p><strong>PRN:</strong> ' . $prn . '</p>
                            <p><strong>Class:</strong> ' . $class . '</p>
                            <p><strong>Gender:</strong> ' . $gender . '</p>
                            <p><strong>DOB:</strong> ' . $dob . '</p>
                            <p><strong>Category:</strong> ' . $category . '</p>
                            <p><strong>Contact:</strong> ' . $contact . '</p>
                            <p><strong>Email:</strong> ' . $email . '</p>
                            <p><strong>Address:</strong> ' . $address . '</p>
                        </h3>
                        <div class="row mt-2">  
                            <div class="btn col-md-6">
                                <div class="p-2">
                                    <a href="manageStudent-edit.php?myVar=' . $prn . '&role=' . $role . '">Update</a>
                                </div>
                            </div>
                            <div class="btn col-md-6">
                                <div class="p-2">
                                    <a href="manageStudent-delete.php?myVar=' . $prn . '&role=' . $role . '">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;
            }
        } else {
            echo "<div class='text-center text-danger'>Student record not found.</div>";
        }
        ?>

        </div>
    </div>
</main>

<?php include("footer.php"); ?>
