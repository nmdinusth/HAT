<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .table thead { background: #f1f5f9; }
        .filament-btn { border: none; background: #6366f1; color: #fff; border-radius: 4px; padding: 4px 12px; margin-right: 4px; }
        .filament-btn-danger { background: #ef4444; }
        .filament-btn-add { background: #22c55e; float: right; }
        .filament-search { width: 220px; margin-bottom: 12px; }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Quản lý người dùng</h2>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <input type="text" class="form-control filament-search" placeholder="Tìm kiếm...">
        <button class="filament-btn filament-btn-add">+ Thêm mới</button>
    </div>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nguyễn Văn A</td>
                <td>a@gmail.com</td>
                <td>01/07/2024</td>
                <td>
                    <button class="filament-btn">Sửa</button>
                    <button class="filament-btn filament-btn-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Trần Thị B</td>
                <td>b@gmail.com</td>
                <td>02/07/2024</td>
                <td>
                    <button class="filament-btn">Sửa</button>
                    <button class="filament-btn filament-btn-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Lê Văn C</td>
                <td>c@gmail.com</td>
                <td>03/07/2024</td>
                <td>
                    <button class="filament-btn">Sửa</button>
                    <button class="filament-btn filament-btn-danger">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>
    <button class="filament-btn filament-btn-danger">Xóa đã chọn</button>
</div>
</body>
</html> 