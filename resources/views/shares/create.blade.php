<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, #0f0c29,rgb(137, 130, 201), #24243e);
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 40%;
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 10px;
        background: #e0dede;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: rgb(81, 136, 168);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: rgba(200, 183, 231, 0.77);
    }

    .alert {
        padding: 10px;
        background-color: #f44336; 
        color: white;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .alert.alert-error {
        background-color: #f44336; 
    }
</style>

<div class="container">
    <h2>Define User Share</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('shares.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Select User:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select a user</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="share">Share:</label>
            <input type="text" name="share" class="form-control" required placeholder="Enter share percentage">
        </div>
        <button type="submit" class="btn">Save Share</button>
    </form>

    <h4 class="text-center mt-4">Edit Existing Shares</h4>
    @foreach ($users as $user)
        <a href="{{ route('shares.edit', $user->id) }}" class="btn btn-link">{{ $user->name }}</a>
    @endforeach
</div>
</body>
</html>
