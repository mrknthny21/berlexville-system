<?php
include '../db_connect.php';

if (isset($_POST['meetingID']) && isset($_POST['deleteMeeting'])) {
    // Delete existing meeting
    $meetingID = $_POST['meetingID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_meeting WHERE meetingID = '$meetingID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the meeting list
    header('Location: admin-records-meeting.php');
    exit();
} elseif (isset($_POST['editMeeting'])) {
    // Retrieve form data
    $meetingID = $_POST['editMeetingID'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $minutes = $_POST['minutes'];
    $transcript = $_POST['transcript'];

    // Construct the update query
    $query = "UPDATE tbl_meeting SET
                title = '$title',
                date = '$date',
                minutes = '$minutes',
                transcript = '$transcript'
            WHERE meetingID = '$meetingID'";

    // Execute the update query
    if ($conn->query($query)) {
        header("Location: admin-records-meeting.php");
    } else {
        // Update failed
        echo "Error updating meeting details: " . mysqli_error($conn);
    }
} elseif (isset($_POST['addMeeting'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $minutes = $_POST['minutes'];
    $transcript = $_POST['transcript'];

    // Construct the insert query
    $insertQuery = "INSERT INTO tbl_meeting (title, date, minutes, transcript) 
                    VALUES ('$title', '$date', '$minutes', '$transcript')";

    if ($conn->query($insertQuery)) {
        // Set a success message in the session
        $_SESSION['meetingAdded'] = true;
        // Close the form by redirecting to the same page
        header('Location: admin-records-meeting.php');
        exit();
    } else {
        // Set an error message in the session if insertion fails
        $_SESSION['meetingAdded'] = false;
    }
}
?>
