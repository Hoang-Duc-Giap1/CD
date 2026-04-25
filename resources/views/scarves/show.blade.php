<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $scarf->name }}</title>
    <style>
        :root {
            --bg: #090b13;
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
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: var(--gold);
            text-align: center;
        }
        .details {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .details img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
        .price {
            font-size: 1.5rem;
            color: var(--gold);
            font-weight: 800;
        }
        .actions {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 0 0.5rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.22s;
        }
        .btn.primary {
            background: linear-gradient(135deg, var(--gold), #f0d08f);
            color: #0b0c10;
        }
        .btn.secondary {
            background: rgba(255,255,255,0.08);
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .btn.danger {
            background: #ff6b6b;
            color: white;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $scarf->name }}</h1>
        <div class="details">
            @if($scarf->image)
                <img src="{{ asset('storage/' . $scarf->image) }}" alt="{{ $scarf->name }}">
            @endif
            <p><strong>Mô Tả:</strong> {{ $scarf->description }}</p>
            <p class="price">{{ number_format($scarf->price, 0, ',', '.') }} VND</p>
            <p><strong>Màu Sắc:</strong> {{ $scarf->color }}</p>
            <p><strong>Chất Liệu:</strong> {{ $scarf->material }}</p>
            <p><strong>Mẫu:</strong> {{ $scarf->pattern }}</p>
        </div>
        <div class="actions">
            <a href="{{ route('scarves.edit', $scarf) }}" class="btn primary">Sửa</a>
            <a href="{{ route('scarves.index') }}" class="btn secondary">Về Danh Sách</a>
            <form method="POST" action="{{ route('scarves.destroy', $scarf) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </div>
    </div>
</body>
</html>