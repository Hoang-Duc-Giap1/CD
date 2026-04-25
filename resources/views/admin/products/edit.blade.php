<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm - {{ $title }}</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #090b13; color: #f5f5f5; }
        .page { max-width: 680px; margin: 0 auto; padding: 2rem; }
        .card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); border-radius: 28px; padding: 2rem; box-shadow: 0 24px 60px rgba(0,0,0,0.34); }
        h1 { margin: 0 0 1rem; color: #d6b471; }
        .field { margin-bottom: 1.3rem; }
        label { display: block; margin-bottom: 0.5rem; color: #bbc2cf; font-weight: 700; }
        input, textarea { width: 100%; padding: 0.95rem 1rem; border-radius: 14px; border: 1px solid rgba(255,255,255,0.14); background: rgba(255,255,255,0.05); color: #f5f5f5; font-size: 1rem; }
        textarea { min-height: 140px; resize: vertical; }
        .error { margin-top: 0.4rem; color: #ff6b6b; }
        .actions { display: flex; gap: 0.85rem; flex-wrap: wrap; }
        .button { display: inline-flex; align-items: center; justify-content: center; padding: 0.95rem 1.4rem; border-radius: 999px; text-decoration: none; font-weight: 700; transition: transform 0.22s; }
        .button.primary { background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%); color: #0b0c10; border: none; }
        .button.secondary { background: rgba(255,255,255,0.08); color: #f5f5f5; border: 1px solid rgba(255,255,255,0.14); }
        .button:hover { transform: translateY(-2px); }
        .submit { width: 100%; border: none; background: linear-gradient(135deg, #d6b471 0%, #f0d08f 100%); color: #0b0c10; font-weight: 700; border-radius: 999px; padding: 1rem; cursor: pointer; }
        .submit:hover { transform: translateY(-2px); }
        .current-image { margin-top: 0.65rem; display: flex; gap: 0.9rem; align-items: center; }
        .current-image img { max-width: 120px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.12); }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <h1>Sửa sản phẩm cho {{ $title }}</h1>
            <form method="POST" action="{{ route('admin.products.update', [$category, $product]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label for="description">Mô tả</label>
                    <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                    @error('description') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label for="price">Giá (VND)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
                    @error('price') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label for="attribute">Thuộc tính</label>
                    <input type="text" id="attribute" name="attribute" value="{{ old('attribute', $product->attribute) }}">
                    <small>VD: Màu sắc, chất liệu, kiểu dáng...</small>
                    @error('attribute') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label for="image">Hình ảnh</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    @if($product->image)
                        <div class="current-image"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"><span>Hình ảnh hiện tại</span></div>
                    @endif
                    @error('image') <div class="error">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="submit">Cập nhật sản phẩm</button>
            </form>
            <div class="actions" style="margin-top:1rem;">
                <a href="{{ route('admin.products.index', $category) }}" class="button secondary">← Quay lại danh sách</a>
            </div>
        </div>
    </div>
</body>
</html>