<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="../../public/css/style.css" type="text/css">
    
</head>
<body>
    <div class="container">
        <h1 class="my-4">Todo List</h1>
        <div class="form-section">
            <h2>Add New Todo</h2>
            <form method="post" action="/?action=add" class="row g-3">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="form-label">Work Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="form-label">Starting Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="end_date" class="form-label">Ending Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Planning">Planning</option>
                            <option value="Doing">Doing</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 form-buttons">
                    <button type="submit" class="btn btn-primary">Add Work</button>
                    <a href="/?action=calendar" class="btn btn-success calendar-btn">Calendar View</a>
                </div>
            </form>
        </div>

        <!-- Hiển thị danh sách công việc -->
        <div class="table-section">
            <h2>List Todo</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name Work</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($works as $work): ?>
                    <tr>
                        <td><?= $work['id'] ?></td>
                        <td><?= $work['name'] ?></td>
                        <td><?= $work['start_date'] ?></td>
                        <td><?= $work['end_date'] ?></td>
                        <td><?= $work['status'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="/?action=edit&id=<?= $work['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form method="post" action="/?action=delete" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $work['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
