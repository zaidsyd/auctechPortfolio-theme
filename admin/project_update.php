<?php
// Include your database connection file
include('../db_con.php');

if (isset($_POST['submit'])) {
    // Start a database transaction
    $con->begin_transaction();

    try {
        // Retrieve form data
        $id = $_POST['id']; // Assuming you are passing the project ID in the form
        $pro_url_first = $_POST['pro_url'];
        $pro_url = str_replace(' ', '-', $pro_url_first);

        $pro_category = $_POST['pro_category'];
        $industry_name = $_POST['industry_name'];
        $country_name = $_POST['country_name'];
        $year = $_POST['year'];
        $pro_tile = $_POST['pro_tile'];
        $highlight_text = $_POST['highlight_text'];
        $client_name = $_POST['client_name'];
        $website_urls = $_POST['website_urls'];
        $status = $_POST['status'];
        $project_brief = $_POST['project_brief'];
        $create_at = date('Y-m-d');

        // Prepare SQL statement for updating the project
        $sql = "UPDATE add_project SET 
                pro_url = ?, 
                pro_category = ?, 
                industry_name = ?, 
                country_name = ?, 
                year = ?, 
                pro_tile = ?, 
                highlight_text = ?, 
                client_name = ?, 
                website_urls = ?, 
                status = ?, 
                project_brief = ?, 
                created_at = ? 
                WHERE id = ?";

        // Prepare the statement
        if (!$stmt = $con->prepare($sql)) {
            throw new Exception("Error preparing SQL query: " . $con->error);
        }

        // Bind parameters
        $stmt->bind_param("ssssssssssssi", $pro_url, $pro_category, $industry_name, $country_name, $year, $pro_tile, $highlight_text, $client_name, $website_urls, $status, $project_brief, $create_at, $id);

        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("Error updating project: " . $stmt->error);
        }

        // Handle multiple file uploads for images (delete old and update with new)
        $target_dir = "../project/project_upload/";

   
  
function deleteOldImages($tableName, $columnName, $id, $con)
{
    $sql_delete = "DELETE FROM $tableName WHERE project_id = ? AND $columnName IS NOT NULL";
    $stmt_delete = $con->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();
    $stmt_delete->close();
}


function insertImages($fileInput, $tableName, $columnName, $id, $con, $target_dir)
{
    if (isset($_FILES[$fileInput]) && !empty($_FILES[$fileInput]['name'][0])) {
        // Delete old images for this type
        deleteOldImages($tableName, $columnName, $id, $con);

        foreach ($_FILES[$fileInput]['name'] as $key => $image_name) {
            if ($_FILES[$fileInput]['error'][$key] == 0) {
                $unique_image_name = uniqid() . "_" . basename($image_name);
                $target_file = $target_dir . $unique_image_name;

                if (move_uploaded_file($_FILES[$fileInput]['tmp_name'][$key], $target_file)) {
                    // Insert a new row for each image
                    $sql_insert = "INSERT INTO $tableName (project_id, $columnName) VALUES (?, ?)";
                    $stmt_insert = $con->prepare($sql_insert);
                    $stmt_insert->bind_param("is", $id, $unique_image_name);

                    if (!$stmt_insert->execute()) {
                        throw new Exception("Error inserting into $tableName ($columnName): " . $stmt_insert->error);
                    }
                    $stmt_insert->close();
                } else {
                    throw new Exception("Error uploading file: $image_name");
                }
            }
        }
    }
}

    
    insertImages('images', 'banner_image', 'banner_image', $id, $con, $target_dir); 
   // insertImages('logos', 'project_images', 'project_image', $id, $con, $target_dir); 
    insertImages('two_photos', 'project_image', 'project_image', $id, $con, $target_dir); 
    insertImages('single_photos', 'slider_image', 'slider_image', $id, $con, $target_dir); 

        // Commit the transaction
        $con->commit();

        // Redirect to project list
        header('Location: project_list.php');
    } catch (Exception $e) {
        // Rollback transaction if error occurs
        $con->rollback();
        echo "Failed to update project and images: " . $e->getMessage();
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>
