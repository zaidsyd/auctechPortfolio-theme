<?phpinclude 'check_session.php';  // Ensure session is valid// Check if 'user_id' is passed in the URLif (isset($_GET['user_id']) && !empty($_GET['user_id'])) {    $user_id = $_GET['user_id'];} else {    // Redirect or display an error if user_id is missing    die("Invalid Project ID.");}// Include database connectioninclude '../db_con.php';// Sanitize the user input to prevent SQL injection$user_id = intval($user_id);  // Make sure user_id is an integer// Query to fetch project details based on user_id$que = "SELECT * FROM add_project WHERE id = ?";$stmt = $con->prepare($que);// Check if the statement is prepared successfullyif ($stmt === false) {    die("Error preparing the SQL query: " . $con->error);}// Bind the parameter to the query$stmt->bind_param("i", $user_id);// Execute the query$stmt->execute();// Get the result$res = $stmt->get_result();// Check if the query returned any rowsif ($res->num_rows > 0) {    // Fetch the project data    $project = $res->fetch_array();} else {    // If no project found, display an error message    die("Project not found with the specified ID.");}// Close the prepared statement and database connection$stmt->close();$con->close();?><!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width,initial-scale=1">    <title>Auctech Portfolio | Admin Dashboard</title>    <!-- Favicon icon -->    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">    <!-- Datatable -->    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">    <link href="./css/style.css" rel="stylesheet">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="        crossorigin="anonymous" referrerpolicy="no-referrer" />    <style> label {        color: #302f2f;        font-weight: bold;    }    .form-control {        background: #fff;        border: 1px solid #cbc3c3;        color: #454545;        padding: 0.3rem 0.7rem;    }    .maxsize{        margin-top:-1vh;        font-size:12px;    }    .file{        margin-top:-1vh !important;    }    span{        font-weight:100;        font-size:13px;    }body, label, .form-control, .note-editor p, .note-editor h1, .note-editor h2, .note-editor h3, .note-editor h4, .note-editor h5, .note-editor h6 {    font-family: "Albert Sans", sans-serif;}.note-editor {    font-family: "Albert Sans", sans-serif !important;    line-height: 1.5 !important;}.note-editor p {    line-height: 1.5 !important;}.note-editor h1, .note-editor h2, .note-editor h3, .note-editor h4, .note-editor h5, .note-editor h6 {    font-family: "Albert Sans", sans-serif !important;    line-height: 1.5 !important;}/* Custom styling for Summernote */.note-editor h1, .note-editor h2, .note-editor h3, .note-editor h4, .note-editor h5, .note-editor h6 {    color: #000000 !important;    font-weight: bold !important;}.note-editor p {    color: #000000 !important;    font-weight: normal !important;}/* List styling */li {    list-style: black;}.note-editor ol {    list-style-type: disc !important;    color: black;}::marker {    margin-left: 10px;}.note-editable {    line-height: 1.8;}    </style></head><body>    <?php            include('header.php');        ?>    <div class="content-body" style="background:#93938a29">        <div class="container-fluid">            <!-- row -->            <div class="row">                <div class="col-xl-6 col-xxl-12 col-xl-12">                    <div class="card">                        <div class="card-header">                            <h4 class="card-title">Update Project</h4>                        </div>                        <hr>                        <div class="card-body">                            <div class="basic-form">                                <form method="POST" action="project_update.php" enctype="multipart/form-data">                                    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">                                    <!-- Project Information -->                                    <div class="form-row">                                        <div class="form-group col-md-3">                                            <label>Project Category Name</label>                                            <input type="text" name="pro_category" id="pro_category"                                                class="form-control"                                                value="<?php echo htmlspecialchars($project['pro_category']); ?>">                                        </div>                                        <div class="form-group col-md-3">                                            <label>Industry Name</label>                                            <input type="text" name="industry_name" id="industry_name"                                                class="form-control"                                                value="<?php echo htmlspecialchars($project['industry_name']); ?>">                                        </div>                                        <div class="form-group col-md-3">                                            <label>Country Name</label>                                            <input type="text" name="country_name" id="country_name"                                                class="form-control"                                                value="<?php echo htmlspecialchars($project['country_name']); ?>">                                        </div>                                        <div class="form-group col-md-3">                                            <label>Year</label>                                            <input type="text" name="year" id="year" class="form-control"                                                value="<?php echo htmlspecialchars($project['year']); ?>">                                        </div>                                    </div>                                    <div class="form-group">                                        <label>Project Title</label>                                        <input type="text" name="pro_tile" id="pro_tile" class="form-control"                                            value="<?php echo htmlspecialchars($project['pro_tile']); ?>">                                    </div>                                    <div class="form-group">                                        <label>Project Highlight</label>                                        <textarea name="highlight_text" id="highlight_text" class="form-control"                                            placeholder="Enter Project Highlight"                                            required><?php echo htmlspecialchars($project['highlight_text']); ?></textarea>                                    </div>                                    <div class="form-group">                                        <label>Project Brief (Case Story)</label>                                        <textarea name="project_brief" id="project_brief"                                            class="form-control mt-2"><?php echo htmlspecialchars($project['project_brief']); ?></textarea>                                    </div>                                    <!-- URL and Client Information -->                                    <div class="form-row">                                        <div class="form-group col-md-6">                                            <label>Project Details URL</label>                                            <input type="text" name="pro_url" id="pro_url" class="form-control"                                                value="<?php echo str_replace('-', ' ', $project['pro_url']); ?>">                                        </div>                                        <div class="form-group col-md-6">                                            <label>Client Name</label>                                            <input type="text" name="client_name" id="client_name" class="form-control"                                                value="<?php echo htmlspecialchars($project['client_name']); ?>">                                        </div>                                    </div>                                    <!-- Image Upload Section -->                                    <div class="form-row">                                        <!--<div class="form-group col-md-6">-->                                        <!--    <label>Client Logo <span class="text-primary">(Resolution: 250 ×-->                                        <!--            250)</span></label>-->                                        <!--    <p class="maxsize">(Max size: 12.0 KB)</p>-->                                        <!--    <input type="file" name="logos[]" id="logos" class="form-control file"-->                                        <!--        multiple >-->                                        <!--</div>-->                                        <div class="form-group col-md-6">                                            <label>Choose Project Thumbnail Image <span class="text-primary">(Resolution: 1920 ×                                                    1080)</span></label>                                            <p class="maxsize">(Max size: 864 KB)</p>                                            <input type="file" name="images[]" id="images" class="form-control file"                                                >                                        </div>                                                                            </div>                                    <div class="form-row">                                        <div class="form-group col-md-6">                                            <label>Choose Project Top Image <span class="text-primary">(Resolution: 600 ×                                                    900)</span></label>                                            <p class="maxsize">(Max size: 223 KB)</p>                                            <input type="file" name="single_photos[]" id="single_photos"                                                class="form-control file" multiple >                                        </div>                                        <div class="form-group col-md-6">                                            <label>Choose Bottom Slider Images <span class="text-primary">(Resolution: 600 ×                                                    900)</span></label>                                            <p class="maxsize">(Max size: 223 KB)</p>                                            <input type="file" name="two_photos[]" id="two_photos"                                                class="form-control file" multiple >                                        </div>                                    </div>                                    <div class="form-row">                                        <div class="form-group col-md-6">                                            <label>Website Multiple URLs <span>(comma separated)</span></label>                                            <input type="text" name="website_urls" id="website_urls"                                                class="form-control"                                                value="<?php echo htmlspecialchars($project['website_urls']); ?>">                                        </div>                                        <div class="form-group col-md-6">                                            <label>Select Status</label>                                            <select name="status" id="status" class="form-control">                                                <option selected>--Select--</option>                                                <option value="1"                                                    <?php echo ($project['status'] == '1') ? 'selected' : ''; ?>>Publish                                                </option>                                                <option value="0"                                                    <?php echo ($project['status'] == '0') ? 'selected' : ''; ?>>                                                    Unpublish</option>                                            </select>                                        </div>                                    </div>                                    <!-- Submit Button -->                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>                                </form>                            </div>                        </div>                    </div>                </div>            </div>        </div>    </div>    <!--**********************************            Content body end        ***********************************-->        <?php include('footer.php'); ?>  <!-- Required JavaScript Libraries -->  <script src="./vendor/global/global.min.js"></script>    <script src="./js/quixnav-init.js"></script>    <script src="./js/custom.min.js"></script>    <!-- Include jQuery -->    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>    <!-- Include Bootstrap JS -->    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    <!-- Include Summernote JS -->    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script><!-- Include Bootstrap and Summernote CSS --><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet"><script>    $(document).ready(function() {    // Initialize Summernote for the project brief textarea    $('#project_brief').summernote({        height: 300, // Editor height        fontNames: ['"Albert Sans"', 'Arial', ' sans-serif'], // Add 'Albert Sans' to the font list        fontName: '"Albert Sans"', // Set the default font        lineHeight: 1.5, // Set default line height        toolbar: [            ['style', ['style', 'paragraph']],            ['font', ['bold', 'italic', 'underline', 'clear']],            ['fontname', ['fontname']],            ['fontsize', ['fontsize']],            ['color', ['color']],            ['para', ['ul', 'ol', 'paragraph']],  // Bullet and numbered list            ['table', ['table']],            ['insert', ['link', 'picture', 'video']],            ['view', ['fullscreen', 'codeview', 'help']]        ]    });});</script></body></html>