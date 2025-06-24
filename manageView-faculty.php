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
        background-color: #ffffff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .myCard img {
        border-radius: 8px;
        border: 1px solid #ccc;
        height: 300px;
        width: 100%;
        object-fit: contain;
        background-color: #f0f0f0; /* Optional: to show image padding space */
    }

    h4 p {
        font-size: 16px;
        color: #343a40;
        margin-bottom: 10px;
    }

    .btn .p-2 {
        text-align: center;
        background-color: #0d6efd;
        border-radius: 6px;
        padding: 10px 15px;
        transition: background 0.3s ease;
    }

    .btn .p-2 a {
        text-decoration: none;
        color: white;
        font-weight: 500;
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
            $myQuery = "SELECT * FROM facultydata WHERE Email='" . $myVar . "'";
            $result = $conn->query($myQuery);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row["Name"];
                    $email = $row["Email"];
                    $contact = $row["Contact"];
                    $gender = $row["Gender"];
                    $dob = $row["DOB"];
                    $des = $row["Designation"];
                    $qua = $row["Qualification"];
                    $exp = $row["totalExperience"];
                    $spe = $row["Specialization"];
                    $ach = $row["Achievements"];
                    $address = $row["Address"];
                    $ph = $row["Photo"];

                    echo '
                    <div class="container mb-4">
                        <div class="row p-2">
                            <div class="myCard p-4 col-md-5" style="text-align: center;">
                                <img src="uploads/faculty/' . $ph . '" alt="Faculty Photo" class="img-fluid mb-2">
                            </div>
                            <div class="col-md-7 p-4">
                                <h4>
                                    <p><strong>Name:</strong> ' . $des . ' ' . $name . '</p>
                                    <p><strong>Email:</strong> ' . $email . '</p>
                                    <p><strong>Contact:</strong> ' . $contact . '</p>
                                    <p><strong>Gender:</strong> ' . $gender . '</p>
                                    <p><strong>DOB:</strong> ' . $dob . '</p>
                                    <p><strong>Qualification:</strong> ' . $qua . '</p>
                                    <p><strong>Experience:</strong> ' . $exp . '</p>
                                    <p><strong>Specialization:</strong> ' . $spe . '</p>
                                    <p><strong>Achievements:</strong> ' . $ach . '</p>
                                    <p><strong>Address:</strong> ' . $address . '</p>
                                </h4>
                                <div class="row mt-2">
                                    <div class="btn col-md-6">
                                        <div class="p-2 bg-secondary-light">
                                            <a href="manageFaculty-edit.php?myVar=' . $email . '&role=' . $role . '">Update</a>
                                        </div>
                                    </div>
                                    <div class="btn col-md-6">
                                        <div class="p-2 bg-secondary-light">
                                            <a href="manageFaculty-delete.php?myVar=' . $email . '&role=' . $role . '">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "<div class='text-center text-danger'>Faculty record not found.</div>";
            }
            ?>

        </div>
    </div>
</main>

<?php include("footer.php"); ?>
