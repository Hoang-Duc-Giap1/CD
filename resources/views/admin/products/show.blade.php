<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - {{ $title }}</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #090b13; color: #f5f5f5; }
        .page { max-width: 860px; margin: 0 auto; padding: 2rem; }
        .card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); border-radius: 28px; padding: 2rem; box-shadow: 0 24px 60px rgba(0,0,0,0.34); }
        h1 { margin: 0 0 0.5rem; color: #d6b471; }
        .meta { color: #bbc2cf; margin-bottom: 1rem; }
        .gallery { margin-bottom: 1.8rem; }
        .gallery img { width: 100%; border-radius: 20px; object-fit: cover; max-height: 420px; }
        .detail { display: grid; grid-template-columns: 1fr; gap: 1rem; }
        .detail p { margin: 0; line-height: 1.8; color: #d7dce8; }
        .detail strong { color: #f5f5f5; }
        .actions { margin-top: 1.8rem; display: flex; flex-wrap: wrap; gap: 0.85rem; }
        .button { display: inline-flex; align-items: center; justify-content: center; padding: 0.95rem 1.4rem; border-radius: 999px; text-decoration: none; font-weight: 700; transition: transform 0.22s; }
        .button.primary { background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%); color: #0b0c10; border: none; }
        .button.secondary { background: rgba(255,255,255,0.08); color: #f5f5f5; border: 1px solid rgba(255,255,255,0.14); }
        .button.danger { background: #ff6b6b; color: white; }
        .button:hover { transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <h1>{{ $product->name }}</h1>
            <p class="meta">Danh mục: <strong>{{ $title }}</strong> · Giá: <strong>{{ number_format($product->price,0,',','.') }} VND</strong>{{ $product->attribute ? ' · ' . $product->attribute : '' }}</p>
            @if($product->image)
                <div class="gallery"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"></div>
            @endif
            <div class="detail">
                <p><strong>Mô tả:</strong> {{ $product->description }}</p>
            </div>
            <div class="actions">
                <a href="{{ route('admin.products.edit', [$category, $product]) }}" class="button primary">Sửa</a>
                <a href="{{ route('admin.products.index', $category) }}" class="button secondary">Quay lại</a>
                <form method="POST" action="{{ route('admin.products.destroy', [$category, $product]) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>