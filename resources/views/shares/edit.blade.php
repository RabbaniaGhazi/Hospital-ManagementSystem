<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1>Edit User Share</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('shares.update', $share->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="share">Share:</label>
            <input type="text" name="share" class="form-control" value="{{ old('share', $share->share) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Share</button>
    </form>
</div>
</body>
</html>