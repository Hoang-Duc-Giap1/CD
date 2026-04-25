<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách {{ $category['title'] }}</title>
    <style>
        :root {
            --bg: #08090d;
            --surface: rgba(255,255,255,0.05);
            --surface-strong: rgba(255,255,255,0.12);
            --gold: #d6b471;
            --text: #f7f7f7;
            --muted: #c8c8c8;
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at top, rgba(214,180,113,0.08), transparent 30%), linear-gradient(180deg, #0b0c10 0%, #11151f 100%);
            color: var(--text);
            min-height: 100vh;
        }
        .page-wrapper {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2rem;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .logo {
            font-size: 1.95rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
        }
        .breadcrumbs {
            color: var(--muted);
            font-size: 0.95rem;
        }
        .hero {
            background: linear-gradient(135deg, rgba(214,180,113,0.16), rgba(255,255,255,0.03));
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 28px;
            padding: 2rem;
            box-shadow: 0 25px 80px rgba(0,0,0,0.18);
            margin-bottom: 2rem;
        }
        .hero h1 {
            margin: 0;
            font-size: clamp(2.2rem, 3vw, 3rem);
            letter-spacing: -0.05em;
        }
        .hero .icon-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: rgba(214,180,113,0.16);
            color: var(--gold);
            font-weight: 800;
            letter-spacing: 0.2em;
            margin-right: 0.85rem;
            font-size: 0.95rem;
        }
        .hero p {
            margin: 1rem 0 0;
            color: var(--muted);
            line-height: 1.85;
            max-width: 760px;
        }
        .hero .hero-actions {
            margin-top: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .hero .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.95rem 1.8rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.06);
            color: var(--text);
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s, background 0.2s;
        }
        .hero .btn.primary {
            background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%);
            color: #0b0c10;
            border: none;
        }
        .hero .btn:hover {
            transform: translateY(-2px);
        }
        .message {
            margin-top: 1.5rem;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            background: rgba(61,142,86,0.12);
            color: #d1f8d6;
            border: 1px solid rgba(61,142,86,0.25);
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .section-header h2 {
            margin: 0;
            font-size: 1.9rem;
        }
        .section-header p {
            margin: 0.5rem 0 0;
            color: var(--muted);
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .product-card {
            background: var(--surface);
            border: 1px solid var(--surface-strong);
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(0,0,0,0.25);
            transition: transform 0.25s, border-color 0.25s;
        }
        .product-card:hover {
            transform: translateY(-6px);
            border-color: rgba(214,180,113,0.4);
        }
        .product-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }
        .product-card .card-body {
            padding: 1.6rem;
        }
        .product-card h2 {
            margin: 0 0 0.75rem;
            font-size: 1.35rem;
        }
        .product-card p {
            color: var(--muted);
            line-height: 1.75;
            margin: 0 0 1rem;
        }
        .product-card .price {
            margin: 0 0 1.25rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gold);
        }
        .product-card .details-btn {
            display: inline-block;
            padding: 0.85rem 1.4rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%);
            color: #0b0c10;
            text-decoration: none;
            font-weight: 700;
        }
        .product-card .details-btn:hover {
            opacity: 0.95;
        }
        .empty-state {
            padding: 1.5rem;
            border-radius: 20px;
            background: rgba(255,255,255,0.04);
            border: 1px dashed rgba(255,255,255,0.16);
            color: var(--muted);
        }
        .page-footer {
            margin-top: 3rem;
            text-align: center;
            color: rgba(255,255,255,0.65);
        }
        @media (max-width: 760px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="topbar">
            <div>
                <div class="logo">HOANGDUCGIAP</div>
                <div class="breadcrumbs">Trang chủ / Danh mục / {{ $category['title'] }}</div>
            </div>
            <a href="{{ route('home') }}" class="hero btn">Về Trang Chủ</a>
        </div>

        <section class="hero">
            <div style="display:flex; align-items:center; gap:0.9rem; margin-bottom:0.8rem;">
            <div class="icon-label">{{ $category['icon'] }}</div>
            <h1 style="margin:0;">{{ $category['title'] }}</h1>
        </div>
            <p>{{ $category['description'] }}</p>
            <div class="hero-actions">
                @if(Auth::check())
                    <a href="{{ route('profile') }}" style="color: #d6b471; font-weight: 600; text-decoration: none;">Chào, {{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn">Đăng Xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn primary">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn">Đăng ký</a>
                @endif
            </div>
            @if (session('success'))
                <div class="message">{{ session('success') }}</div>
            @endif
        </section>

        <section class="product-list-section">
            <div class="section-header">
                <div>
                    <h2>Danh sách sản phẩm</h2>
                    <p>{{ count($category['items']) }} sản phẩm trong danh mục {{ $category['title'] }}</p>
                </div>
                <a href="{{ route('home') }}" class="hero btn">Quay lại trang chủ</a>
            </div>

            @if (count($category['items']) === 0)
                <div class="empty-state">Hiện tại không có sản phẩm nào trong danh mục này. Vui lòng quay lại sau hoặc chọn danh mục khác.</div>
            @else
                <div class="product-grid">
                    @foreach ($category['items'] as $item)
                    <article class="product-card">
                        @if (!empty($item['image']))
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                        @endif
                        <div class="card-body">
                            <h2>{{ $item['name'] }}</h2>
                            <p>{{ $item['description'] }}</p>
                            <div class="price">{{ $item['price'] }}</div>
                            @if ($item['detailUrl'] !== '#')
                                <a href="{{ $item['detailUrl'] }}" class="details-btn">Xem chi tiết</a>
                            @else
                                <span class="details-btn">Xem chi tiết</span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <div class="page-footer">
            © 2024 HOANGDUCGIAP - Phụ kiện thượng lưu dành cho người dẫn đầu xu hướng
        </div>
    </div>
</body>
</html>
