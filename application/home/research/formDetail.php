<!-- Google Fonts: Sarabun & Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
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

    .detail-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        padding: 40px;
        max-width: 900px;
        margin: 0 auto;
        transition: all var(--transition-speed) ease;
        position: relative;
        overflow: hidden;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: var(--primary-gradient);
    }

    .meta-container {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .meta-item {
        margin-bottom: 15px;
    }

    .meta-item:last-child {
        margin-bottom: 0;
    }

    .meta-label {
        font-weight: 600;
        color: #64748b;
        font-size: 0.85rem;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .meta-value {
        color: #1e293b;
        font-weight: 500;
        font-size: 1rem;
    }

    .abstract-box {
        background-color: #fff;
        border-left: 4px solid #6366f1;
        padding: 25px;
        border-radius: 4px 12px 12px 4px;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        line-height: 1.8;
        color: #334155;
        font-size: 1.02rem;
        text-align: justify;
    }

    .custom-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-primary {
        background-color: #e0e7ff;
        color: #4338ca;
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

    .btn-edit-action {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        transition: all var(--transition-speed) ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-edit-action:hover {
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .btn-back {
        background: #f1f5f9;
        color: #475569;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all var(--transition-speed) ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }
</style>
<?php
$research_id = isset($_GET['research_id']) ? $_GET['research_id'] : 0;
$research_title = "";
$research_name = "";
$research_public_year = "";
$research_type = 0;
$research_abstract = "";
$research_status = "1";

if ($research_id > 0) {
    $sql = "SELECT * FROM research r WHERE research_id = '$research_id'";
    $row = $conn->get_row($sql);
    if ($row) {
        $research_id = $row->research_id;
        $research_title = $row->research_title;
        $research_name = $row->research_name;
        $research_public_year = $row->research_public_year;
        $research_type = $row->research_type;
        $research_abstract = $row->research_abstract;
        $research_status = $row->research_status;
        $research_created_at = $row->research_created_at;
        $research_updated_at = $row->research_updated_at;
        $research_deleted_at = $row->research_deleted_at;
    }
}
?>  
<div class="container">
    <div class="detail-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="index.php?application=home&module=research" class="btn-back py-2 px-3 fw-normal" style="font-size: 0.9rem;">
                <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                กลับหน้าหลัก
            </a>
        </div>
        <?php
            if($research_status != 0){
        ?> 
            <h2 class="fw-bold text-dark mb-3" style="line-height: 1.4;">
                <?= $research_title; ?>
            </h2>

            <div class="d-flex gap-2 mb-4">
                <span class="custom-badge badge-primary"><?= $research_type == 1 ? 'การวิจัยเชิงประวัติศาสตร์' : 'การวิจัยเชิงวิชาการ' ?></span>
                <span class="custom-badge badge-success"><?= $research_status == 1 ? 'เผยแพร่แล้ว' : 'ไม่เผยแพร่' ?></span>
            </div>

            <div class="meta-container">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="meta-item">
                            <div class="meta-label">ผู้วิจัยหลัก (Researcher)</div>
                            <div class="meta-value"><?= $research_name; ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="meta-item">
                            <div class="meta-label">ปีที่เผยแพร่ผลงาน (Publication Year)</div>
                            <div class="meta-value"><?= $research_public_year; ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="meta-item">
                            <div class="meta-label">วันที่เพิ่มข้อมูลในระบบ (Created At)</div>
                            <div class="meta-value" style="font-family: 'Inter', sans-serif;"><?= $research_created_at; ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="meta-item">
                            <div class="meta-label">แก้ไขล่าสุดเมื่อ (Updated At)</div>
                            <div class="meta-value" style="font-family: 'Inter', sans-serif;"><?= $research_updated_at; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h5 class="fw-bold text-dark mb-3">บทคัดย่อ (Abstract)</h5>
                <div class="abstract-box">
                    <?= $research_abstract; ?>
                </div>
            </div>
        <?php
            }else{
        ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">ไม่พบข้อมูลงานวิจัย!</h4>
            <p>ขออภัย ระบบไม่สามารถค้นหาข้อมูลงานวิจัยที่ท่านต้องการได้</p>
        </div>
        <?php
            }
        ?> 

        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
            <a href="index.php?application=home&module=research" class="btn-back">
                ย้อนกลับ
            </a>
        <?php
            if($research_status != 0){
        ?>
            <a href="index.php?application=home&module=research&com=formAdd.php&research_id=<?= $research_id; ?>" class="btn-edit-action d-inline-flex align-items-center">
                <svg class="me-2" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                แก้ไขข้อมูลงานวิจัย
            </a>
        <?php
            }
        ?>
        </div>
    </div>
</div>
