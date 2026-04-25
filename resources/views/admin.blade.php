<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm - Admin</title>
    <style>
        :root {
            --bg-dark: #0b0c10;
            --bg-gradient: linear-gradient(135deg, #1f1f29 0%, #0f172a 100%);
            --gold: #d6b471;
            --gold-light: #f1d18a;
            --text-light: #f5f5f5;
            --card-bg: rgba(255,255,255,0.06);
            --border: rgba(255,255,255,0.12);
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-gradient);
            color: var(--text-light);
            min-height: 100vh;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
        }
        .brand {
            font-size: 1.8rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 800;
            color: var(--gold);
        }
        .nav-links {
            display: flex;
            gap: 1rem;
        }
        .nav-links a, .nav-links form button {
            color: var(--text-light);
            text-decoration: none;
            padding: 0.85rem 1.3rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.05);
            transition: transform 0.25s, background 0.25s;
            font-weight: 600;
            cursor: pointer;
        }
        .nav-links a:hover, .nav-links form button:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }
        .hero {
            position: relative;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            padding: 3rem 2rem;
            max-width: 760px;
            text-align: center;
        }
        .hero-content h1 {
            font-size: clamp(2.75rem, 4vw, 4.5rem);
            line-height: 1.02;
            margin: 0;
            letter-spacing: -0.04em;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            padding: 3rem 2rem;
            max-width: 1080px;
            text-align: center;
        }
        .hero-meta {
            display: inline-flex;
            gap: 0.75rem;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .hero-meta .tag {
            background: rgba(214,180,113,0.16);
            color: var(--gold);
            padding: 0.75rem 1.2rem;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .hero-content p {
            max-width: 760px;
            margin: 1rem auto 0;
            color: rgba(245,245,245,0.78);
            line-height: 1.8;
            font-size: 1.05rem;
        }
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 2.5rem;
            padding: 0 1rem;
        }
        .category-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(214,180,113,0.18);
            border-radius: 28px;
            padding: 1.8rem;
            box-shadow: 0 24px 50px rgba(0,0,0,0.28);
            transition: transform 0.28s, border-color 0.28s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 320px;
            backdrop-filter: blur(12px);
        }
        .category-card:hover {
            transform: translateY(-8px);
            border-color: rgba(214,180,113,0.32);
        }
        .category-card .category-icon {
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: rgba(214,180,113,0.14);
            color: var(--gold);
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: 0.15em;
            margin-bottom: 1.2rem;
        }
        .category-card h2 {
            margin: 0 0 0.75rem;
            font-size: 1.45rem;
            letter-spacing: -0.03em;
        }
        .category-card p {
            margin: 0 0 1.5rem;
            color: rgba(245,245,245,0.82);
            line-height: 1.7;
        }
        .category-card .card-actions {
            margin-top: auto;
            display: flex;
            gap: 0.85rem;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .category-card .btn {
            padding: 0.85rem 1.3rem;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.9rem;
            border: none;
            box-shadow: 0 12px 25px rgba(0,0,0,0.18);
            transition: transform 0.22s, opacity 0.22s;
        }
        .category-card .btn.primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: #0b0c10;
        }
        .category-card .btn.secondary {
            background: rgba(255,255,255,0.08);
            color: var(--text-light);
        }
        .category-card .btn:hover {
            transform: translateY(-2px);
        }
        .footer {
            text-align: center;
            padding: 2rem 1rem;
            color: rgba(245,245,245,0.65);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="brand">HOANGDUCGIAP - ADMIN</div>
        <nav class="nav-links">
            <a href="{{ route('home') }}">Về Trang Chủ</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit">Đăng Xuất</button>
            </form>
        </nav>
    </header>

    <main class="hero">
        <section class="hero-poster" style="background: radial-gradient(circle at top left, rgba(214,180,113,0.18), transparent 30%), linear-gradient(160deg, rgba(11,13,16,0.95), rgba(15,23,42,0.7));">
            <div class="hero-content">
                <div class="hero-meta">
                    <span class="tag">Admin Dashboard</span>
                    <span>{{ count($categories) }} danh mục</span>
                </div>
                <h1>Quản Lý Sản Phẩm Sang Trọng</h1>
                <p>Hệ thống quản lý chuyên nghiệp cho từng danh mục sản phẩm. Thiết kế này giúp bạn điều hướng nhanh và thao tác trực quan hơn.</p>
                <div class="admin-grid">
                    @foreach($categories as $category)
                        <article class="category-card">
                            <div class="category-icon">{{ $category['icon'] }}</div>
                            <h2>{{ $category['title'] }}</h2>
                            <p>{{ $category['description'] }}</p>
                            <div class="card-actions">
                                <a href="{{ route('admin.products.index', $category['slug']) }}" class="btn primary">Quản Lý</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        &copy; 2024 HOANGDUCGIAP | Quản lý sản phẩm
    </footer>
</body>
</html>