<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get task data from form
    $tasks = $_POST['tasks'];
    $startDates = $_POST['start_dates'];
    $endDates = $_POST['end_dates'];
    $dependencies = $_POST['dependencies'];

    // Loop through tasks and display on Gantt chart
    for ($i = 0; $i < count($tasks); $i++) {
        echo '<div class="task">';
        echo '<div class="task-name">' . $tasks[$i] . '</div>';
        $startDate = strtotime($startDates[$i]);
        $endDate = strtotime($endDates[$i]);
        $duration = $endDate - $startDate;
        echo '<div class="task-bar" style="width:' . ($duration / 86400) . 'px;"></div>';

        // If task has dependency, draw a line
        if (!empty($dependencies[$i])) {
            echo '<div class="dependency-line" style="left:' . ($duration / 86400) . 'px; width: ' . ((strtotime($dependencies[$i]) - $startDate) / 86400) . 'px;"></div>';
        }

        echo '</div>';
    }
}

