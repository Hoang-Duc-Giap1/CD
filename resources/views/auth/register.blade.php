<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <style>
        body {
            background: linear-gradient(135deg, #ff9a56 0%, #ff6348 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 20px;
            max-width: 420px;
            width: 100%;
            padding: 2rem;
            box-shadow: 0 18px 40px rgba(0,0,0,0.16);
        }
        h1 {
            margin: 0 0 1rem 0;
            font-size: 2rem;
            text-align: center;
        }
        .field {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }
        .btn {
            width: 100%;
            padding: 14px 16px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 1rem;
        }
        .links {
            margin-top: 1rem;
            text-align: center;
            font-size: 0.95rem;
        }
        .links a {
            color: #ff6348;
            text-decoration: none;
        }
        .message {
            padding: 1rem;
            border-radius: 10px;
            background: #d4edda;
            color: #155724;
            margin-bottom: 1rem;
        }
        .errors {
            margin-bottom: 1rem;
            color: #c7254e;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Đăng Ký</h1>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="field">
                <label for="name">Tên</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
        </form>

        <div class="links">
            <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
            <p><a href="{{ route('home') }}">Về Trang Chủ</a></p>
        </div>
    </div>
</body>
</html>
