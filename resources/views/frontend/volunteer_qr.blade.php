<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <!-- Header Section -->
                <div class="d-flex justify-content-between m-3 text-center">
                    <img src="{{ $volunteer->photo ? $volunteer->photo->getUrl('preview2') : '' }}" alt="">
                </div>
                @if($task->status == 'done' || $task->status =='canceled') 
                    <div class="alert alert-danger">هوية رقمية منتهية</div>
                @endif
                <!-- Main Content Table -->
                <table class="table table-bordered mt-3">
                    <tbody> 
                        <tr>
                            <th>الاسم</th>
                            <td>{{ $volunteer->name }}</td>
                        </tr>
                        <tr>
                            <th>رقم الهوية</th>
                            <td>{{ $volunteer->identity_num }}</td>
                        </tr>
                        <tr>
                            <th>البريد الإلكتروني</th>
                            <td>{{ $volunteer->email }}</td>
                        </tr>
                        <tr>
                            <th>رقم الهاتف</th>
                            <td>{{ $volunteer->phone_number }}</td>
                        </tr> 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
