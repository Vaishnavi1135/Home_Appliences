
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
    </style>

<body>

<div class="container">
    <h2>Set User Role</h2>
    <form action="save_role<?=base_url('users/setRole')?>" method="POST">
        <label for="username">User</label>
        <input type="text" id="username" name="username" required>

        <label for="role">Select Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="driver">Driver</option>
        </select>

        <button type="submit">Save Role</button>
    </form>
</div>

</body>

