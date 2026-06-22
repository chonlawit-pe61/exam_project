<!-- Google Fonts: Sarabun & Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        --secondary-gradient: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.5);
        --card-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.08);
        --transition-speed: 0.3s;
    }

    body {
        font-family: 'Sarabun', 'Inter', sans-serif;
        background-color: #f8fafc;
        color: #1e293b;
    }

    .main-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        padding: 30px;
        transition: all var(--transition-speed) ease;
    }

    .header-banner {
        background: var(--primary-gradient);
        border-radius: 16px;
        padding: 40px;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.2);
    }

    .header-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        pointer-events: none;
    }

    .header-banner::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .stat-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 12px 20px;
        color: white;
        text-align: center;
        transition: transform var(--transition-speed) ease;
    }

    .stat-badge:hover {
        transform: translateY(-5px);
    }

    .table-container {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: white;
    }

    table.dataTable.custom-table,
    .custom-table {
        margin-bottom: 0 !important;
        border-collapse: collapse !important;
        border-spacing: 0 !important;
        width: 100% !important;
        border: none !important;
    }

    table.dataTable.custom-table thead th,
    .custom-table th {
        background-color: #f1f5f9 !important;
        color: #475569 !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 0.85rem !important;
        letter-spacing: 0.5px !important;
        padding: 16px 20px !important;
        border-bottom: 2px solid #e2e8f0 !important;
        box-shadow: none !important;
        outline: none !important;
        position: relative !important;
    }

    table.dataTable.custom-table tbody td,
    .custom-table td {
        padding: 18px 20px !important;
        vertical-align: middle !important;
        color: #334155 !important;
        border-bottom: 1px solid #f1f5f9 !important;
        background-color: transparent !important;
    }

    table.dataTable.custom-table tbody tr:hover,
    .custom-table tr:hover {
        background-color: #f8fafc !important;
    }

    table.dataTable thead th::before,
    table.dataTable thead th::after,
    table.dataTable thead td::before,
    table.dataTable thead td::after {
        display: none !important;
        content: "" !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding-right: 20px !important;
    }

    .dt-container,
    .dataTables_wrapper {
        padding: 0 !important;
        margin: 0 !important;
        background: transparent !important;
    }

    .action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all var(--transition-speed) ease;
        border: none;
        margin-right: 5px;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    .btn-view {
        background-color: #e0f2fe;
        color: #0369a1;
    }

    .btn-view:hover {
        background-color: #0369a1;
        color: white;
    }

    .btn-edit {
        background-color: #fef3c7;
        color: #b45309;
    }

    .btn-edit:hover {
        background-color: #b45309;
        color: white;
    }

    .btn-delete {
        background-color: #fee2e2;
        color: #b91c1c;
    }

    .btn-delete:hover {
        background-color: #b91c1c;
        color: white;
    }

    .custom-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
    }

    .badge-primary {
        background-color: #e0e7ff;
        color: #4338ca;
    }

    .badge-secondary {
        background-color: #f1f5f9;
        color: #475569;
    }

    .badge-success {
        background-color: #dcfce7;
        color: #15803d;
    }

    .badge-warning {
        background-color: #fef3c7;
        color: #d97706;
    }

    .badge-info {
        background-color: #ecfeff;
        color: #0891b2;
    }

    .search-card {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #fff;
        padding: 20px;
        margin-bottom: 25px;
    }

    .btn-add-new {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 22px;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        transition: all var(--transition-speed) ease;
        text-decoration: none;
    }

    .btn-add-new:hover {
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .btn-dashboard {
        background: var(--secondary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 22px;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(6, 182, 212, 0.25);
        transition: all var(--transition-speed) ease;
        margin-right: 10px;
        text-decoration: none;
    }

    .btn-dashboard:hover {
        box-shadow: 0 6px 16px rgba(6, 182, 212, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .abstract-tooltip {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: help;
    }

    /* Tabs Styling */
    .custom-nav-tabs {
        border-bottom: 2px solid #e2e8f0;
        margin-bottom: 25px;
    }

    .custom-nav-tabs .nav-link {
        border: none;
        color: #64748b;
        font-weight: 600;
        padding: 12px 24px;
        border-bottom: 3px solid transparent;
        transition: all 0.2s ease;
    }

    .custom-nav-tabs .nav-link:hover {
        color: #4f46e5;
    }

    .custom-nav-tabs .nav-link.active {
        color: #4f46e5;
        background: transparent;
        border-bottom-color: #4f46e5;
    }
</style>
<?php
$filter_type = isset($_GET['filter_type']) ? $_GET['filter_type'] : '';
$filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql_filter = "";
if (!empty($filter_type)) {
    $sql_filter .= " AND r.research_type = '{$filter_type}'";
}
if ($filter_status !== '') {
    $sql_filter .= " AND r.research_status = '{$filter_status}'";
}
if (!empty($search)) {
    $search_escaped = $conn->escape($search);
    $sql_filter .= " AND (r.research_title LIKE '%{$search_escaped}%' OR r.research_name LIKE '%{$search_escaped}%')";
}

$sql = "SELECT r.*,rt.type_name 
        FROM research r 
        LEFT JOIN research_type rt ON r.research_type = rt.type_id 
        WHERE r.research_deleted_at IS NULL {$sql_filter}
        ORDER BY r.research_public_year DESC,r.research_created_at DESC";
$research = $conn->get_results($sql, ARRAY_A);

$research_type = $conn->get_results("SELECT * FROM research_type", ARRAY_A);

$countType = $conn->get_row("SELECT COUNT(type_id) as count FROM research_type");

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $research_deleted_at = date('Y-m-d H:i:s');
    $delete_sql = "UPDATE research SET research_deleted_at = '$research_deleted_at' WHERE research_id = '$delete_id'";

    if ($conn->query($delete_sql) === false) {
        $error_mgs = (!empty($conn->last_error)) ? $conn->last_error : 'ลบข้อมูลไม่สำเร็จ';
        $com->gourl('index.php?application=home&module=research', $error_mgs, 'error');
        exit;
    }

    $com->gourl('index.php?application=home&module=research', 'ลบข้อมูลสำเร็จ', 'success');
    exit;
}
?>
<div class="container">
    <div class="header-banner">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h1 class="fw-bold mb-2">ระบบจัดการข้อมูลงานวิจัย</h1>
                <p class="lead mb-0 text-white-50">จัดการ ติดตาม และเผยแพร่ข้อมูลผลงานวิจัยอย่างเป็นระบบ</p>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="stat-badge">
                            <div class="small text-white-50">ประเภทงานวิจัย</div>
                            <div class="fs-3 fw-bold"><?= $countType->count; ?> ประเภท</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content" id="researchTabsContent">
        <div class="tab-pane fade show active" id="papers-panel" role="tabpanel" aria-labelledby="papers-tab">
            <div class="main-card">
                <form method="GET" action="index.php">
                    <input type="hidden" name="application" value="home">
                    <input type="hidden" name="module" value="research">

                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                        <h4 class="fw-bold mb-0 text-primary">รายการงานวิจัย</h4>
                        <div class="d-flex align-items-center">
                            <a href="index.php?application=dashboard&module=indicator" class="btn-dashboard d-inline-flex align-items-center">
                                <svg class="me-2" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                                แดชบอร์ดภาพรวม
                            </a>
                            <a href="index.php?application=home&module=research&com=formAdd.php" class="btn-add-new d-inline-flex align-items-center">
                                <svg class="me-2" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                                </svg>
                                เพิ่มข้อมูลงานวิจัย
                            </a>
                        </div>
                    </div>

                    <div class="search-card">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted small fw-bold">ค้นหาคำค้น</label>
                                <input type="text" name="search" class="form-control form-control-lg bg-light border-0" placeholder="ชื่อวิจัย หรือ ชื่อผู้วิจัย..." style="font-size: 0.95rem; border-radius: 8px;" value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-muted small fw-bold">ประเภทงานวิจัย</label>
                                <select class="form-select form-select-lg bg-light border-0" style="font-size: 0.95rem; border-radius: 8px;" id="filterType" name="filter_type">
                                    <option value="">ทั้งหมด</option>
                                    <?php foreach ($research_type as $rt): ?>
                                        <option value="<?php echo $rt['type_id']; ?>" <?php echo ($filter_type == $rt['type_id']) ? 'selected' : ''; ?>><?php echo $rt['type_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-muted small fw-bold">สถานะ</label>
                                <select class="form-select form-select-lg bg-light border-0" style="font-size: 0.95rem; border-radius: 8px;" id="filterStatus" name="filter_status">
                                    <option value="">ทั้งหมด</option>
                                    <option value="0" <?php echo ($filter_status === '0') ? 'selected' : ''; ?>>ฉบับร่าง</option>
                                    <option value="1" <?php echo ($filter_status === '1') ? 'selected' : ''; ?>>เผยแพร่แล้ว</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button class="btn btn-primary btn-lg w-100 fw-bold border-0" style="background: var(--primary-gradient); font-size: 0.95rem; border-radius: 8px; padding-top: 11px; padding-bottom: 11px;">
                                    ค้นหา
                                </button>
                                <a class="btn btn-primary btn-lg w-100 fw-bold border-0" style="background: var(--primary-gradient); font-size: 0.95rem; border-radius: 8px; padding-top: 11px; padding-bottom: 11px;" href="?application=home&module=research">
                                    รีเฟรช
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-container shadow-sm p-3">
                        <table class="table custom-table align-middle DataTable">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 30px;">ลำดับ</th>
                                    <th>ข้อมูลงานวิจัย</th>
                                    <th>ผู้วิจัย</th>
                                    <th style="width: 250px;">ประเภท</th>
                                    <th class="text-center" style="width: 120px;">ปีที่เผยแพร่</th>
                                    <th class="text-center" style="width: 150px;">สถานะ</th>
                                    <th class="text-center" style="width: 150px;">วันที่สร้าง</th>
                                    <th class="text-center" style="width: 180px;">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($research as $row) {
                                ?>
                                    <tr>
                                        <td class="text-center fw-bold text-muted"><?php echo $i; ?></td>
                                        <td>
                                            <div class="fw-bold text-dark mb-1"><?php echo $row['research_title']; ?></div>
                                            <div class="text-muted small abstract-tooltip" title="<?php echo $row['research_abstract']; ?>">
                                                <?php echo $row['research_abstract']; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold"><?php echo $row['research_name']; ?></div>
                                        </td>
                                        <td><span class="custom-badge badge-primary"><?php echo $row['type_name']; ?></span></td>
                                        <td class="text-center"><?php echo $row['research_public_year']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($row['research_status'] == 1) {
                                            ?>
                                                <span class="custom-badge badge-success">เผยแพร่แล้ว</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="custom-badge badge-danger">ฉบับร่าง</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $exp = explode(' ', $row['research_created_at']);
                                            echo $com->dateFormat($exp[0], 'engthai'); ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="index.php?application=home&module=research&com=formDetail.php&research_id=<?php echo $row['research_id']; ?>" class="action-btn btn-view" title="ดูรายละเอียด">
                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="index.php?application=home&module=research&com=formAdd.php&research_id=<?php echo $row['research_id']; ?>" class="action-btn btn-edit" title="แก้ไข">
                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <a href="index.php?application=home&module=research&delete_id=<?php echo $row['research_id']; ?>" class="action-btn btn-delete" title="ลบ">
                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#filterType, #filterStatus').on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>