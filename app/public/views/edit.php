<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Work</title>
    <link rel="stylesheet" href="../../public/css/edit.css" type="text/css">

</head>
<body>
    <div class="container">
        <div class="form-section">
            <h1>Edit Work</h1>
            <form action="/?action=edit" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($work['id']) ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Work Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($work['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Starting Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?= htmlspecialchars($work['start_date']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Ending Date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?= htmlspecialchars($work['end_date']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Planning" <?= $work['status'] === 'Planning' ? 'selected' : '' ?>>Planning</option>
                        <option value="Doing" <?= $work['status'] === 'Doing' ? 'selected' : '' ?>>Doing</option>
                        <option value="Complete" <?= $work['status'] === 'Complete' ? 'selected' : '' ?>>Complete</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update Work</button>
                    <a href="/?action=index" class="btn btn-success">Back to List</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
