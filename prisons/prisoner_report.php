<?php
include("connect.php");

$prisonerId = $_GET['prisoner_id'];

// Fetch prisoner details
$query = "SELECT * FROM prisoner WHERE prisoner_id = $prisonerId";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Error executing the query: " . mysqli_error($con);
    exit;
}

$prisoner = mysqli_fetch_assoc($result);

if (!$prisoner) {
    echo "Prisoner not found.";
    exit;
}

// Fetch visitor details
$query = "SELECT name, COUNT(*) as visit_count FROM visit WHERE prisoner_id = $prisonerId GROUP BY name ORDER BY visit_date DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Error executing the query: " . mysqli_error($con);
    exit;
}

$visitors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch most recent visitor
$query = "SELECT * FROM visit WHERE prisoner_id = $prisonerId ORDER BY visit_date DESC LIMIT 1";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Error executing the query: " . mysqli_error($con);
    exit;
}

$mostRecentVisitor = mysqli_fetch_assoc($result);

// Calculate remaining time
if (isset($prisoner["incarsaration_date"])) {
    $sentenceLengthYears = $prisoner["sentence_length"];
    $incarsarationDate = new DateTime($prisoner["incarsaration_date"]);
    $releaseDate = $incarsarationDate->add(new DateInterval("P" . $sentenceLengthYears . "Y"));
    $remainingTime = $releaseDate->diff(new DateTime())->format("%y years, %m months, %d days");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prisoner Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Prisoner Report</h1>
        <h2>Prisoner Details</h2>
        <p>Name: <?php echo $prisoner['name']; ?></p>
        <p>Image:</p>
<div style="width: 100px; height: 100px; overflow: hidden;">
    <img src="<?php echo $prisoner['image_url']; ?>" alt="Prisoner Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
</div>

        <p>Date of Birth: <?php echo $prisoner['date_of_birth']; ?></p>
        <p>Gender: <?php echo $prisoner['gender']; ?></p>
        <p>Nationality: <?php echo $prisoner['nationality']; ?></p>
        <p>Offenses: <?php echo $prisoner['offenses']; ?></p>
        <p>Remaining Time: <?php echo $remainingTime; ?></p>

        <h2>Visitor Details</h2>
        <?php if ($visitors) : ?>
            <ul>
                <?php foreach ($visitors as $visitor) : ?>
                    <li>
                        <p>Name: <?php echo $visitor['name']; ?></p>
                        <p>Visit Count: <?php echo $visitor['visit_count']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No visitor records found.</p>
        <?php endif; ?>

        <h2>Most Recent Visitor</h2>
        <?php if ($mostRecentVisitor) : ?>
            <p>Name: <?php echo $mostRecentVisitor['name']; ?></p>
            <p>Visit Date: <?php echo $mostRecentVisitor['visit_date']; ?></p>
            <p>Reason: <?php echo $mostRecentVisitor['reason']; ?></p>
        <?php else : ?>
            <p>No recent visitor records found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
