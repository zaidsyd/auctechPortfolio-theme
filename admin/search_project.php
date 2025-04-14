<?php
include '../db_con.php';

$search = isset($_POST['query']) ? mysqli_real_escape_string($con, $_POST['query']) : '';

// Modify query to search based on input
$sql = "SELECT * FROM add_project WHERE pro_tile LIKE '%$search%' OR website_urls LIKE '%$search%'";
$result = mysqli_query($con, $sql);

// Generate table structure
$output = '
<table class="table header-border table-responsive-sm table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Image</th>
            <th>Project Name</th>
            <th>Project Url</th>
            <th>Status</th>
            <th class="text-center">Featured</th>
            <th class="text-center">King</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>';

$i = 1;
while ($row = mysqli_fetch_array($result)) {
    // Fetch project image
    $image_query = "SELECT * FROM project_images WHERE project_id = '{$row['id']}' LIMIT 1";
    $image_result = mysqli_query($con, $image_query);
    $image_row = mysqli_fetch_array($image_result);
    $image_path = isset($image_row['image']) ? $image_row['image'] : 'default-image.jpg'; 

    $status_checked = ($row['status'] == 1) ? 'checked' : '';
    $king_status_checked = ($row['king_status'] == 1) ? 'checked' : '';
    $feature_status_checked = ($row['feature_status'] == 1) ? 'checked' : '';

    $output .= "
    <tr>
        <td>{$i}</td>
        <td><img src='../project/project_upload/{$image_path}' alt='Image' class='img-thumbnail' style='max-width: 80px; height: auto;'></td>
        <td>{$row['pro_tile']}</td>
        <td>{$row['website_urls']}</td>
        <td>
            <label class='switch'>
                <input type='checkbox' class='status-toggle' data-project-id='{$row['id']}' {$status_checked}>
                <span class='slider round'></span>
            </label>
        </td>
        <td class='text-center'>
            <input type='checkbox' class='feature-status-toggle' data-project-id='{$row['id']}' {$feature_status_checked} />
        </td>
        <td class='text-center'>
            <input type='checkbox' class='king-status-toggle' data-project-id='{$row['id']}' {$king_status_checked} />
        </td>
        <td>
            <a class='btn btn-primary shadow btn-xs sharp me-1' href='project_edit.php?user_id={$row['id']}' style='color:white;'>
                <i class='fas fa-pencil-alt'></i>
            </a>
            <form method='POST' action='project_dlt.php' style='display:inline;'>
                <input type='hidden' name='user_id' value='{$row['id']}'>
                <button type='submit' class='btn btn-danger shadow btn-xs sharp' name='delete' onclick='return confirm(\"Are you sure?\")'>
                    <i class='fa fa-trash'></i>
                </button>
            </form>
        </td>
    </tr>";
    $i++;
}

$output .= '</tbody></table>';

echo $output;
?>