<?php
include 'db_con.php';

$filter = $_POST['filter'] ?? 'all';
$page = intval($_POST['page'] ?? 1);
$limit = 8;
$offset = ($page - 1) * $limit;

$where = "WHERE ap.status = 1";
if ($filter == 'feature') $where .= " AND ap.feature_status = 1";
elseif ($filter == 'king') $where .= " AND ap.king_status = 1";
elseif (!in_array($filter, ['all', '', 'feature', 'king'])) {
    $filter = strtolower(preg_replace('/[^a-z0-9]/', '', $filter));
    $where .= " AND LOWER(REPLACE(REPLACE(ap.industry_name, ' ', ''), '-', '')) = '$filter'";
}

$sql = "SELECT ap.*, pi.project_image FROM add_project ap
        LEFT JOIN (SELECT project_id, project_image FROM project_image GROUP BY project_id) pi
        ON ap.id = pi.project_id $where ORDER BY ap.id DESC LIMIT $limit OFFSET $offset";

$result = $con->query($sql);
while ($project = $result->fetch_assoc()):
    $slug = strtolower(str_replace(' ', '-', $project['pro_tile']));
    $image = $project['project_image'] ?: 'default.jpg';
?>
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="portfolio-item p-2">
            <div class="portfolio-image shadow-lg rounded">
                <a href="project/<?= htmlspecialchars($slug) ?>" target="_blank">
                    <img class="lazy" src="project/project_upload/<?= $image ?>" height="242" alt="Preview">
                </a>
            </div>
            <div class="portfolio-desc text-center pt-4 pb-0">
                <h3><a href="project/<?= htmlspecialchars($slug) ?>" target="_blank">
                    <?= htmlspecialchars($project['pro_tile']) ?></a></h3>
                <span><?= htmlspecialchars($project['industry_name']) ?></span>
            </div>
        </div>
    </div>
<?php endwhile; ?>
