<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Phụ Kiện Thời Trang</title>
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
            align-items: center;
            flex-wrap: wrap;
        }
        .nav-auth {
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            align-items: flex-end;
        }
        .nav-button,
        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            padding: 0.82rem 1.25rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.05);
            transition: transform 0.25s, background 0.25s, border-color 0.25s;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .nav-button:hover,
        .nav-links a:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }
        .admin-button {
            border-color: rgba(214,180,113,0.4);
            background: rgba(214,180,113,0.16);
            color: var(--gold);
            margin-top: 0.25rem;
        }
        .logout-button {
            background: rgba(255,255,255,0.08);
            color: var(--text-light);
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
        .hero-poster {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            min-height: 420px;
            background: radial-gradient(circle at top left, rgba(214,180,113,0.18), transparent 30%),
                        linear-gradient(160deg, rgba(11,13,16,0.95), rgba(15,23,42,0.7));
            box-shadow: 0 16px 60px rgba(0,0,0,0.45);
            display: grid;
            align-items: center;
            justify-items: center;
        }
        .hero-poster::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.18;
            filter: blur(2px);
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
            color: white;
        }
        .hero-content p {
            margin: 1.5rem auto 2rem;
            font-size: 1.1rem;
            max-width: 680px;
            color: rgba(245,245,245,0.86);
            line-height: 1.9;
        }
        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }
        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 999px;
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.25s, box-shadow 0.25s, opacity 0.25s;
            cursor: pointer;
        }
        .btn-primary {
            background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%);
            color: #0b0c10;
            box-shadow: 0 18px 40px rgba(214,180,113,0.24);
        }
        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: var(--text-light);
            border: 1px solid rgba(255,255,255,0.18);
        }
        .btn-primary:hover,
        .btn-secondary:hover {
            transform: translateY(-2px);
            opacity: 0.95;
        }
        .info-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        .info-card {
            padding: 1.4rem 1.5rem;
            border-radius: 20px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .info-card span {
            display: block;
            font-size: 1.75rem;
            margin-bottom: 0.9rem;
        }
        .info-card h3 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.03em;
        }
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin: 2rem auto 0;
            max-width: 1200px;
            padding: 0 1rem;
        }
        .category-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 24px;
            padding: 1.6rem;
            min-height: 260px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
            transition: transform 0.3s, border-color 0.3s;
        }
        .category-card:hover {
            transform: translateY(-6px);
            border-color: rgba(214,180,113,0.45);
        }
        .category-card .icon {
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            border-radius: 22px;
            background: rgba(214,180,113,0.12);
            border: 1px solid rgba(214,180,113,0.25);
            color: var(--gold);
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .category-card .icon span {
            padding: 0.5rem 0.65rem;
        }
        .category-card h3 {
            margin: 0 0 0.8rem;
            font-size: 1.35rem;
        }
        .category-card p {
            margin: 0 0 1.5rem;
            color: rgba(245,245,245,0.8);
            line-height: 1.75;
            flex: 1;
        }
        .footer {
            text-align: center;
            padding: 2rem 1rem;
            color: rgba(245,245,245,0.65);
        }
        @media (max-width: 768px) {
            .hero {
                padding: 1.5rem;
            }
            .hero-content {
                padding: 2rem 1.5rem;
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: scale(0.8) translateY(-20px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="brand">HOANGDUCGIAP</div>
        <nav class="nav-links">
            @if(Auth::check())
                <div class="nav-auth">
                    <a href="#" onclick="showProfileModal()" class="nav-button profile-button" style="border-color: rgba(214,180,113,0.4); background: rgba(214,180,113,0.14); color: var(--gold); cursor: pointer;">Chào, {{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-button logout-button">Đăng Xuất</button>
                    </form>
                    @if(Auth::user()->email === 'ADMIN@gmail.com')
                        <a href="{{ route('admin') }}" class="nav-button admin-button">Quản Lý</a>
                    @endif
                </div>
            @else
                <a href="{{ route('login') }}">Đăng Nhập</a>
                <a href="{{ route('register') }}">Đăng Ký</a>
            @endif
        </nav>
    </header>

    <main class="hero">
        <section class="hero-poster">
            <div class="hero-content">
                <p style="text-transform: uppercase; letter-spacing: 0.35em; color: rgba(214,180,113,0.95); font-size: 0.9rem; margin-bottom: 1.2rem;">Phiên bản giới hạn</p>
                <h1>Phụ kiện thời thượng cho phong cách dẫn đầu</h1>
                <p>Khám phá bộ sưu tập túi xách, khăn, vòng cổ, nhẫn và dây chuyền thiết kế cao cấp. Đẳng cấp mới, sang trọng hơn, hiện đại hơn.</p>
                <div class="hero-actions">
                    <a href="{{ route('category.show', 'tui-xach') }}" class="btn-primary">Xem Bộ Sưu Tập</a>
                    <a href="{{ route('category.show', 'khan') }}" class="btn-secondary">Khám Phá Khăn</a>
                </div>
            </div>
            <div class="info-bar">
                <div class="info-card">
                    <span>150+</span>
                    <h3>Sản phẩm thời trang</h3>
                </div>
                <div class="info-card">
                    <span>24K</span>
                    <h3>Khách hàng hài lòng</h3>
                </div>
                <div class="info-card">
                    <span>5+</span>
                    <h3>Phong cách sang trọng</h3>
                </div>
            </div>
        </section>
    </main>

    <section class="category-grid">
        <article class="category-card">
            <div>
                <div class="icon"><span>TX</span></div>
                <h3>Túi Xách</h3>
                <p>Sang trọng, tiện dụng và đậm chất phong cách đường phố hiện đại.</p>
            </div>
            <a href="{{ route('category.show', 'tui-xach') }}" class="btn-secondary">Xem danh mục</a>
        </article>
        <article class="category-card">
            <div>
                <div class="icon"><span>KH</span></div>
                <h3>Khăn</h3>
                <p>Thiết kế mềm mại, tinh tế, tạo điểm nhấn hoàn hảo cho trang phục.</p>
            </div>
            <a href="{{ route('category.show', 'khan') }}" class="btn-secondary">Xem danh mục</a>
        </article>
        <article class="category-card">
            <div>
                <div class="icon"><span>VC</span></div>
                <h3>Vòng Cổ</h3>
                <p>Thiết kế lấp lánh, sang trọng, phù hợp mọi dịp đặc biệt.</p>
            </div>
            <a href="{{ route('category.show', 'vong-co') }}" class="btn-secondary">Xem danh mục</a>
        </article>
        <article class="category-card">
            <div>
                <div class="icon"><span>NH</span></div>
                <h3>Nhẫn</h3>
                <p>Nhẫn phong cách độc đáo, phù hợp cá tính mạnh mẽ hoặc dịu dàng.</p>
            </div>
            <a href="{{ route('category.show', 'nhan') }}" class="btn-secondary">Xem danh mục</a>
        </article>
        <article class="category-card">
            <div>
                <div class="icon"><span>DC</span></div>
                <h3>Dây Chuyền</h3>
                <p>Mẫu dây chuyền thanh lịch, tạo nét quyến rũ và sang trọng.</p>
            </div>
            <a href="{{ route('category.show', 'day-chuyen') }}" class="btn-secondary">Xem danh mục</a>
        </article>
    </section>

    <footer class="footer">
        &copy; 2024 HOANGDUCGIAP | Phụ kiện thượng lưu dành cho người dẫn đầu xu hướng
    </footer>

    @if(Auth::check())
    <!-- Profile Modal -->
    <div id="profileModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(11,13,16,0.9); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: linear-gradient(135deg, rgba(31,31,41,0.95), rgba(15,23,42,0.9)); border: 2px solid var(--gold); border-radius: 28px; max-width: 480px; width: 90%; padding: 2.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.5); position: relative; color: var(--text-light);">
            <button onclick="hideProfileModal()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 2rem; color: var(--gold); cursor: pointer; transition: color 0.25s;">&times;</button>
            <h1 style="margin: 0 0 1.5rem 0; font-size: 2.5rem; text-align: center; letter-spacing: 0.1em; color: var(--gold); text-transform: uppercase; font-weight: 800;">Thông Tin Người Dùng</h1>
            @if (session('success'))
                <div style="padding: 15px; margin-bottom: 1.5rem; border-radius: 12px; text-align: center; background: rgba(214,180,113,0.2); border: 1px solid var(--gold); color: var(--gold-light);">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div style="padding: 15px; margin-bottom: 1.5rem; border-radius: 12px; text-align: center; background: rgba(255,99,71,0.2); border: 1px solid #ff6348; color: #ff9a56;">
                    <ul style="margin: 0; padding-left: 1rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: var(--gold-light); text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.9rem;">Tên</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" style="width: 100%; padding: 15px 18px; border-radius: 12px; border: 1px solid rgba(214,180,113,0.3); background: rgba(255,255,255,0.08); color: var(--text-light); font-size: 1rem; transition: border-color 0.25s;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: var(--gold-light); text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.9rem;">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" style="width: 100%; padding: 15px 18px; border-radius: 12px; border: 1px solid rgba(214,180,113,0.3); background: rgba(255,255,255,0.08); color: var(--text-light); font-size: 1rem; transition: border-color 0.25s;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: var(--gold-light); text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.9rem;">Địa Chỉ</label>
                    <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" style="width: 100%; padding: 15px 18px; border-radius: 12px; border: 1px solid rgba(214,180,113,0.3); background: rgba(255,255,255,0.08); color: var(--text-light); font-size: 1rem; transition: border-color 0.25s;">
                </div>
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: var(--gold-light); text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.9rem;">Số Điện Thoại</label>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" style="width: 100%; padding: 15px 18px; border-radius: 12px; border: 1px solid rgba(214,180,113,0.3); background: rgba(255,255,255,0.08); color: var(--text-light); font-size: 1rem; transition: border-color 0.25s;">
                </div>
                <button type="submit" style="width: 100%; padding: 16px 20px; border: none; border-radius: 12px; background: linear-gradient(135deg, var(--gold), var(--gold-light)); color: #0b0c10; font-size: 1.1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; cursor: pointer; transition: transform 0.25s, box-shadow 0.25s; box-shadow: 0 8px 20px rgba(214,180,113,0.3);">Cập Nhật</button>
            </form>
        </div>
    </div>
    @endif

    <script>
        function showProfileModal() {
            document.getElementById('profileModal').style.display = 'flex';
        }
        function hideProfileModal() {
            document.getElementById('profileModal').style.display = 'none';
        }
    </script>
</body>
</html>
