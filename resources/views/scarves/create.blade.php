<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khăn</title>
    <style>
        :root {
            --bg: #090b13;
            --surface: rgba(255,255,255,0.06);
            --gold: #d6b471;
            --text: #f4f4f4;
            --muted: rgba(244,244,244,0.7);
        }
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #0c101a 0%, #090b13 100%);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .form-container {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 45px rgba(0,0,0,0.25);
        }
        h1 {
            margin: 0 0 1.5rem;
            text-align: center;
            color: var(--gold);
        }
        .field {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text);
        }
        input, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            background: rgba(255,255,255,0.08);
            color: var(--text);
            font-size: 1rem;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn {
            width: 100%;
            padding: 0.95rem;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--gold), #f0d08f);
            color: #0b0c10;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.22s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .back-link {
            text-align: center;
            margin-top: 1rem;
        }
        .back-link a {
            color: var(--gold);
            text-decoration: none;
        }
        .error {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Thêm Khăn Mới</h1>
        <form method="POST" action="{{ route('scarves.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="name">Tên Khăn</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="price">Giá (VND)</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" step="0.01" required>
                @error('price') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="color">Màu Sắc</label>
                <input type="text" id="color" name="color" value="{{ old('color') }}" required>
                @error('color') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="material">Chất Liệu</label>
                <input type="text" id="material" name="material" value="{{ old('material') }}" required>
                @error('material') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="pattern">Mẫu</label>
                <input type="text" id="pattern" name="pattern" value="{{ old('pattern') }}" required>
                @error('pattern') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="image">Hình Ảnh</label>
                <input type="file" id="image" name="image" accept="image/*">
                @error('image') <div class="error">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn">Thêm Khăn</button>
        </form>
        <div class="back-link">
            <a href="{{ route('scarves.index') }}">← Về Danh Sách</a>
        </div>
    </div>
</body>
</html>