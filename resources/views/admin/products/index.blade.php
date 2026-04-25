<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý {{ $title }}</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #090b13; color: #f5f5f5; }
        .page { max-width: 1160px; margin: 0 auto; padding: 2rem; }
        .topbar { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 1rem; align-items: center; }
        h1 { margin: 0; font-size: clamp(2rem, 3vw, 2.8rem); color: #d6b471; }
        .subtitle { margin: 0.75rem 0 1.5rem; color: #bbc2cf; max-width: 820px; line-height: 1.8; }
        .controls { display: flex; gap: 0.75rem; flex-wrap: wrap; }
        .button { display: inline-flex; align-items: center; justify-content: center; padding: 0.95rem 1.4rem; border-radius: 999px; text-decoration: none; font-weight: 700; letter-spacing: 0.04em; transition: transform 0.22s, background 0.22s; }
        .button.primary { background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%); color: #0b0c10; }
        .button.secondary { background: rgba(255,255,255,0.08); color: #f5f5f5; border: 1px solid rgba(255,255,255,0.12); }
        .button:hover { transform: translateY(-2px); }
        .message { margin: 1.5rem 0; padding: 1rem 1.2rem; background: rgba(78, 136, 57, 0.18); border: 1px solid rgba(214,180,113,0.3); border-radius: 18px; color: #e7f7d7; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(280px,1fr)); gap: 1.5rem; margin-top: 1.5rem; }
        .card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); border-radius: 28px; overflow: hidden; box-shadow: 0 24px 60px rgba(0,0,0,0.35); transition: transform 0.25s, border-color 0.25s; }
        .card:hover { transform: translateY(-4px); border-color: rgba(214,180,113,0.3); }
        .card img { width: 100%; height: 220px; object-fit: cover; display: block; }
        .card-body { padding: 1.5rem; }
        .card-title { margin: 0 0 0.75rem; font-size: 1.35rem; }
        .card-meta { color: #b0b6c0; font-size: 0.95rem; margin-bottom: 1rem; }
        .card-text { color: #d7dce8; line-height: 1.75; min-height: 72px; }
        .card-footer { margin-top: 1.5rem; display: flex; flex-wrap: wrap; gap: 0.75rem; }
        .small-btn { padding: 0.75rem 1rem; border-radius: 999px; border: none; cursor: pointer; font-weight: 700; transition: transform 0.22s; }
        .small-btn.view { background: rgba(214,180,113,0.14); color: #f5f5f5; }
        .small-btn.edit { background: rgba(255,255,255,0.08); color: #f5f5f5; }
        .small-btn.delete { background: #ff6b6b; color: white; }
        .small-btn:hover { transform: translateY(-2px); }
        .empty { margin-top: 2rem; padding: 1.8rem; border-radius: 24px; background: rgba(255,255,255,0.05); border: 1px dashed rgba(255,255,255,0.18); color: #bbc2cf; text-align: center; }
    </style>
</head>
<body>
    <div class="page">
        <div class="topbar">
            <div>
                <h1>Quản Lý {{ $title }}</h1>
                <p class="subtitle">Thêm, sửa và xóa sản phẩm cho danh mục <strong>{{ $title }}</strong>. Tất cả thao tác được thực hiện nhanh chóng và trực quan.</p>
            </div>
            <div class="controls">
                <a href="{{ route('admin.products.create', $category) }}" class="button primary">+ Thêm Sản Phẩm</a>
                <a href="{{ route('admin') }}" class="button secondary">← Trang Admin</a>
            </div>
        </div>

        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if($products->isEmpty())
            <div class="empty">Danh mục này chưa có sản phẩm. Hãy thêm ngay sản phẩm mới để quản lý.</div>
        @else
            <div class="grid">
                @foreach($products as $product)
                    <div class="card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $product->name }}</h2>
                            <div class="card-meta">{{ $product->attribute ? $product->attribute . ' • ' : '' }}{{ number_format($product->price, 0, ',', '.') }} VND</div>
                            <p class="card-text">{{ Str::limit($product->description, 120) }}</p>
                            <div class="card-footer">
                                <a href="{{ route('admin.products.show', [$category, $product]) }}" class="small-btn view">Xem</a>
                                <a href="{{ route('admin.products.edit', [$category, $product]) }}" class="small-btn edit">Sửa</a>
                                <form method="POST" action="{{ route('admin.products.destroy', [$category, $product]) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="small-btn delete" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
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