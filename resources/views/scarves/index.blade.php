<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khăn</title>
    <style>
        :root {
            --bg: #07090f;
            --surface: rgba(255,255,255,0.06);
            --surface-strong: rgba(255,255,255,0.14);
            --gold: #d6b471;
            --text: #f5f5f5;
            --muted: rgba(245,245,245,0.75);
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #10131c 0%, #07090f 100%);
            color: var(--text);
            min-height: 100vh;
        }
        .page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        .topbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .topbar h1 {
            margin: 0;
            font-size: clamp(2rem, 3vw, 2.8rem);
            letter-spacing: -0.05em;
        }
        .topbar .actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        .subtitle {
            margin: 0.5rem 0 2rem;
            color: var(--muted);
            max-width: 720px;
            line-height: 1.85;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.95rem 1.5rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.22s, background 0.22s;
        }
        .btn.primary {
            background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%);
            color: #0b0c10;
        }
        .btn.secondary {
            background: rgba(255,255,255,0.08);
            color: var(--text);
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .message {
            margin-bottom: 1.5rem;
            padding: 1rem 1.2rem;
            border-radius: 18px;
            background: rgba(48,120,61,0.14);
            border: 1px solid rgba(48,120,61,0.26);
            color: #dcf3d8;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(0,0,0,0.26);
            transition: transform 0.25s, border-color 0.25s;
        }
        .card:hover {
            transform: translateY(-6px);
            border-color: rgba(214,180,113,0.35);
        }
        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card h3 {
            margin: 0 0 0.75rem;
            font-size: 1.4rem;
        }
        .card p {
            margin: 0.5rem 0;
            color: var(--muted);
            line-height: 1.75;
        }
        .price {
            margin: 1rem 0;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--gold);
        }
        .actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        .btn-small {
            flex: 1;
            padding: 0.85rem 1rem;
            border-radius: 999px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-small:hover {
            transform: translateY(-1px);
        }
        .btn-small.detail {
            background: rgba(214,180,113,0.16);
            color: var(--text);
        }
        .btn-small.edit {
            background: rgba(255,255,255,0.08);
            color: var(--text);
        }
        .btn-danger {
            background: #ff6b6b;
            color: white;
        }
        .btn-danger:hover {
            background: #ee5a52;
        }
        .empty-state {
            padding: 1.6rem;
            border-radius: 22px;
            background: rgba(255,255,255,0.05);
            border: 1px dashed rgba(255,255,255,0.14);
            text-align: center;
            color: var(--muted);
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="topbar">
            <div>
                <h1>Danh Sách Khăn</h1>
                <p class="subtitle">Bộ sưu tập khăn thời trang cao cấp với kiểu dáng tinh tế, chất liệu mềm mại và thiết kế sang trọng.</p>
            </div>
            <div class="actions">
                <a href="{{ route('scarves.create') }}" class="btn primary">+ Thêm Khăn</a>
                <a href="{{ route('home') }}" class="btn secondary">← Trang Chủ</a>
            </div>
        </div>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if ($scarves->isEmpty())
            <div class="empty-state">Chưa có khăn nào. <a href="{{ route('scarves.create') }}" style="color: var(--gold); text-decoration: underline;">Thêm khăn mới</a></div>
        @else
            <div class="grid">
                @foreach ($scarves as $scarf)
                    <div class="card">
                        @if ($scarf->image)
                            <img src="{{ $scarf->image }}" alt="{{ $scarf->name }}">
                        @endif
                        <div class="card-body">
                            <h3>{{ $scarf->name }}</h3>
                            <p><strong>Chất liệu:</strong> {{ $scarf->material }}</p>
                            <p><strong>Màu sắc:</strong> {{ $scarf->color }}</p>
                            <p><strong>Họa tiết:</strong> {{ $scarf->pattern }}</p>
                            <p class="price">{{ number_format($scarf->price, 0, ',', '.') }} VND</p>
                            <p>{{ Str::limit($scarf->description, 90) }}</p>
                            <div class="actions">
                                <a href="{{ route('scarves.show', $scarf) }}" class="btn-small detail">Chi Tiết</a>
                                <a href="{{ route('scarves.edit', $scarf) }}" class="btn-small edit">Sửa</a>
                                <form method="POST" action="{{ route('scarves.destroy', $scarf) }}" style="flex:1; display:flex;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-small btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
