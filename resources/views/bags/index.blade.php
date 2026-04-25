<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Túi Xách</title>
    <style>
        :root {
            --bg: #090b13;
            --surface: rgba(255,255,255,0.06);
            --surface-strong: rgba(255,255,255,0.12);
            --gold: #d6b471;
            --text: #f4f4f4;
            --muted: rgba(244,244,244,0.7);
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #0c101a 0%, #090b13 100%);
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
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.95rem 1.5rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.1);
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.22s, background 0.22s;
        }
        .btn.primary {
            background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%);
            color: #0b0c10;
            border: none;
        }
        .btn.secondary {
            background: rgba(255,255,255,0.08);
            color: var(--text);
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .subtitle {
            margin: 0 0 2rem;
            color: var(--muted);
            max-width: 720px;
            line-height: 1.85;
        }
        .message {
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            border-radius: 18px;
            background: rgba(48,120,61,0.16);
            border: 1px solid rgba(48,120,61,0.3);
            color: #dff5e1;
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
            box-shadow: 0 20px 45px rgba(0,0,0,0.25);
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
            padding: 0.8rem 1rem;
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
                <h1>Danh Sách Túi Xách</h1>
                <p class="subtitle">Bộ sưu tập túi xách thời thượng với thiết kế tinh tế và chất liệu cao cấp, dành cho phong cách hiện đại.</p>
            </div>
            <div class="actions">
                <a href="{{ route('bags.create') }}" class="btn primary">+ Thêm Túi Xách</a>
                <a href="{{ route('home') }}" class="btn secondary">← Trang Chủ</a>
            </div>
        </div>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if ($bags->isEmpty())
            <div class="empty-state">Chưa có túi xách nào. <a href="{{ route('bags.create') }}" style="color: var(--gold); text-decoration: underline;">Thêm túi xách mới</a></div>
        @else
            <div class="grid">
                @foreach ($bags as $bag)
                    <div class="card">
                        @if ($bag->image)
                            <img src="{{ $bag->image }}" alt="{{ $bag->name }}">
                        @endif
                        <div class="card-body">
                            <h3>{{ $bag->name }}</h3>
                            <p><strong>Chất liệu:</strong> {{ $bag->material }}</p>
                            <p><strong>Màu sắc:</strong> {{ $bag->color }}</p>
                            <p class="price">{{ number_format($bag->price, 0, ',', '.') }} VND</p>
                            <p>{{ Str::limit($bag->description, 90) }}</p>
                            <div class="actions">
                                <a href="{{ route('bags.show', $bag) }}" class="btn-small detail">Chi Tiết</a>
                                <a href="{{ route('bags.edit', $bag) }}" class="btn-small edit">Sửa</a>
                                <form method="POST" action="{{ route('bags.destroy', $bag) }}" style="flex:1; display:flex;">
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
