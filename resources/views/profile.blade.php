<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
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
            border-radius: 10px;
            background: #ff6348;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.25s;
        }
        .btn:hover {
            background: #e55a47;
        }
        .back-link {
            text-align: center;
            margin-top: 1rem;
        }
        .back-link a {
            color: #ff6348;
            text-decoration: none;
        }
        .message {
            padding: 10px;
            margin-bottom: 1rem;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Thông Tin Người Dùng</h1>
        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="field">
                <label for="name">Tên</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
            </div>
            <div class="field">
                <label for="address">Địa Chỉ</label>
                <input type="text" id="address" name="address" value="{{ old('address', Auth::user()->address) }}">
            </div>
            <div class="field">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
            </div>
            <button type="submit" class="btn">Cập Nhật</button>
        </form>
        <div class="back-link">
            <a href="{{ route('home') }}">Về Trang Chủ</a>
        </div>
    </div>
</body>
</html>