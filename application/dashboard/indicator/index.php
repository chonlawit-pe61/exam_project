<?php
$total_research = $conn->get_var("SELECT COUNT(*) FROM research WHERE research_deleted_at IS NULL");
$research_type1 = $conn->get_var("SELECT COUNT(DISTINCT research_id) FROM research WHERE research_deleted_at IS NULL AND research_type = 1");

$research_type2 = $total_research - $research_type1;
?>
<!-- Include Chart.js -->
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h3>รายงาน Dashboard ภาพรวมงานวิจัย</h3>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <a class="text-decoration-none" href="?application=manage&module=Indicator_management">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">จำนวนงานวิจัยทั้งหมด</h5>
                        <h2 class="card-text text-center"><?= $total_research ?: 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none" href="?application=manage&module=evaluate&status=1">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">การวิจัยเชิงประวัติศาสตร์</h5>
                        <h2 class="card-text text-center"><?= $research_type1 ?: 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none" href="?application=manage&module=evaluate&status=0">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">การวิจัยเชิงพรรณนา</h5>
                        <h2 class="card-text text-center"><?= $research_type2 ?: 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Chart -->
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <strong>สัดส่วนความคืบหน้าการประเมินตัวชี้วัด</strong>
                </div>
                <div class="card-body" style="height: 350px;">
                    <canvas id="evaluationChart" 
                        data-type1="<?= $research_type1 ?: 0 ?>" 
                        data-type2="<?= $research_type2 ?: 0 ?>">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?application=home&module=research" class="btn btn-secondary" style="margin-top: 10px;">Back</a>
</div>