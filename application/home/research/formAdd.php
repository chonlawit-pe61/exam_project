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

    .form-card {
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
    }

    .form-header-bar {
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 20px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .input-group-custom {
        margin-bottom: 25px;
    }

    .input-group-custom label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .form-control-custom {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all var(--transition-speed) ease;
        outline: none;
    }

    .form-control-custom:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
    }

    .form-control-custom::placeholder {
        color: #94a3b8;
    }

    .radio-card-group {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .radio-card {
        flex: 1;
        min-width: 150px;
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        padding: 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all var(--transition-speed) ease;
    }

    .radio-card:hover {
        border-color: #6366f1;
        background-color: #f5f3ff;
    }

    .radio-card input[type="radio"] {
        accent-color: #4f46e5;
        width: 18px;
        height: 18px;
    }

    .radio-card.active {
        border-color: #4f46e5;
        background-color: #e0e7ff;
        color: #4338ca;
        font-weight: 600;
    }

    .btn-submit {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        transition: all var(--transition-speed) ease;
    }

    .btn-submit:hover {
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .btn-cancel {
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

    .btn-cancel:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .text-danger-custom {
        color: #ef4444;
        font-size: 0.8rem;
        margin-top: 4px;
        display: block;
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

if(!empty($_POST)){
    $research_id = isset($_POST['research_id']) ? intval($_POST['research_id']) : 0;
    $research_title = isset($_POST['research_title']) ? trim($_POST['research_title']) : '';
    $research_name = isset($_POST['research_name']) ? trim($_POST['research_name']) : '';
    $research_public_year = isset($_POST['research_public_year']) ? intval($_POST['research_public_year']) : 0;
    $research_type = isset($_POST['research_type']) ? intval($_POST['research_type']) : 0;
    $research_abstract = isset($_POST['research_abstract']) ? trim($_POST['research_abstract']) : '';
    $research_status = isset($_POST['research_status']) ? intval($_POST['research_status']) : -1;    

    if(
        $research_title === '' || 
        $research_name === '' || 
        $research_abstract === '' ||
        $research_public_year <= 0 ||  
        $research_status === -1
    ){
        echo json_encode(['status' => 'error', 'message' => 'กรุณากรอกข้อมูลใหม่ครบถ้วน']); 
        exit;
    }
    
    if($research_id > 0){
        $research_updated_at = date('Y-m-d H:i:s');
        $update = "UPDATE research SET 
            research_title = '$research_title', 
            research_name = '$research_name', 
            research_public_year = '$research_public_year', 
            research_type = '$research_type', 
            research_abstract = '$research_abstract', 
            research_status = '$research_status',
            research_updated_at = '$research_updated_at'
            WHERE research_id = '$research_id'";
        
        if($conn->query($update) === false){
            $error_mgs = (!empty($conn->last_error)) ? $conn->last_error : 'อัปเดตข้อมูลไม่สำเร็จ';
            echo json_encode(['status' => 'error', 'message' => $error_mgs]);
            exit; 
        }

        $com->gourl('index.php?application=home&module=research','อัปเดตข้อมูลสำเร็จ','success');
        exit;

    }else{
        $research_created_at = date('Y-m-d H:i:s');
        $research_updated_at = date('Y-m-d H:i:s');
        $insert = "INSERT INTO research (
            research_title, 
            research_name, 
            research_public_year, 
            research_type, 
            research_abstract, 
            research_status,
            research_created_at,
            research_updated_at
            ) VALUES (
            '$research_title', 
            '$research_name', 
            '$research_public_year', 
            '$research_type', 
            '$research_abstract', 
            '$research_status',
            '$research_created_at',
            '$research_updated_at'
        )";
        
        if($conn->query($insert) === false){
            $error_mgs = (!empty($conn->last_error)) ? $conn->last_error : 'เพิ่มข้อมูลไม่สำเร็จ';
            echo json_encode(['status' => 'error', 'message' => $error_mgs]);
            exit;
        }
        
        $com->gourl('index.php?application=home&module=research','เพิ่มข้อมูลสำเร็จ','success');
        exit;
    }
}
?>
<div class="container">
    <div class="form-card">
        <!-- Header -->
        <div class="form-header-bar">
            <div>
                <h3 class="fw-bold text-dark mb-1">แบบฟอร์มข้อมูลงานวิจัย</h3>
                <p class="text-muted mb-0 small">กรอกรายละเอียดเพื่อบันทึกข้อมูลงานวิจัยในระบบ</p>
            </div>
            <a href="index.php?application=home&module=research" class="btn-cancel py-2 px-3 fw-normal" style="font-size: 0.9rem;">
                <svg class="me-1" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                ย้อนกลับ
            </a>
        </div>

        <form method="POST" action="">
            <input type="hidden" name="research_id" value="<?php echo $research_id; ?>">
            <div class="row">
                <!-- Title -->
                <div class="col-12 input-group-custom">
                    <label for="research_title">ชื่อหัวข้องานวิจัย <span class="text-danger">*</span></label>
                    <input type="text" id="research_title" name="research_title" class="form-control-custom" placeholder="ระบุชื่อหัวข้องานวิจัยภาษาไทย หรือ ภาษาอังกฤษ" required value="<?php echo $research_title; ?>">
                </div>

                <!-- Researcher Name -->
                <div class="col-md-6 input-group-custom">
                    <label for="research_name">ชื่อผู้วิจัย <span class="text-danger">*</span></label>
                    <input type="text" id="research_name" name="research_name" class="form-control-custom" placeholder="ชื่อ-นามสกุล ผู้วิจัยหลัก" required value="<?php echo $research_name; ?>">
                </div>

                <!-- Public Year -->
                <div class="col-md-6 input-group-custom">
                    <label for="research_public_year">ปีที่เผยแพร่ (พ.ศ.) <span class="text-danger">*</span></label>
                    <select id="research_public_year" name="research_public_year" class="form-control-custom" required>
                        <option value="">-- เลือกปี พ.ศ. --</option>
                        <option value="2569" <?php if ($research_public_year == '2569') echo 'selected'; ?>>2569</option>
                        <option value="2568" <?php if ($research_public_year == '2568') echo 'selected'; ?>>2568</option>
                        <option value="2567" <?php if ($research_public_year == '2567') echo 'selected'; ?>>2567</option>
                        <option value="2566" <?php if ($research_public_year == '2566') echo 'selected'; ?>>2566</option>
                        <option value="2565" <?php if ($research_public_year == '2565') echo 'selected'; ?>>2565</option>
                        <option value="2564" <?php if ($research_public_year == '2564') echo 'selected'; ?>>2564</option>
                    </select>
                </div>

                <!-- Research Type -->
                <div class="col-md-12 input-group-custom">
                    <label for="research_type">ประเภทงานวิจัย <span class="text-danger">*</span></label>
                    <select id="research_type" name="research_type" class="form-control-custom" required value="<?php echo $research_type; ?>">
                        <option value="">-- เลือกประเภทงานวิจัย --</option>
                        <option value="1" <?php if ($research_type == '1') echo 'selected'; ?>>การวิจัยเชิงประวัติศาสตร์ (Historical Research)</option>
                        <option value="2" <?php if ($research_type == '2') echo 'selected'; ?>>การวิจัยเชิงพรรณนา (Descriptive Research)</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="col-12 input-group-custom">
                    <label>สถานะของงานวิจัย</label>
                    <div class="radio-card-group">
                        <label class="radio-card" id="label-draft">
                            <input type="radio" name="research_status" value="0" <?php if ($research_status == '0') echo 'checked'; ?> onclick="toggleStatusActive('draft')">
                            <div>
                                <div class="fw-semibold">ฉบับร่าง (Draft)</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">สำหรับอยู่ระหว่างการแก้ไข</div>
                            </div>
                        </label>
                        <label class="radio-card active" id="label-published">
                            <input type="radio" name="research_status" value="1" <?php if ($research_status == '1') echo 'checked'; ?> onclick="toggleStatusActive('published')">
                            <div>
                                <div class="fw-semibold">เผยแพร่แล้ว (Published)</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">เผยแพร่สู่สาธารณะทันที</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Abstract -->
                <div class="col-12 input-group-custom">
                    <label for="research_abstract">บทคัดย่อ (Abstract) <span class="text-danger">*</span></label>
                    <textarea id="research_abstract" name="research_abstract" class="form-control-custom" rows="6" placeholder="พิมพ์บทคัดย่อผลงานวิจัยโดยสรุป..." required><?php echo $research_abstract; ?></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                <a href="index.php?application=home&module=research" class="btn-cancel">
                    ยกเลิก
                </a>
                <button type="submit" class="btn-submit d-inline-flex align-items-center">
                    <svg class="me-2" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                    บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleStatusActive(type) {
        document.getElementById('label-draft').classList.remove('active');
        document.getElementById('label-published').classList.remove('active');
        document.getElementById('label-' + type).classList.add('active');
    }
</script>
