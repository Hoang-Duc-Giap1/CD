<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private array $categories = [
        'tui-xach' => 'Túi Xách',
        'khan' => 'Khăn',
        'vong-co' => 'Vòng Cổ',
        'nhan' => 'Nhẫn',
        'day-chuyen' => 'Dây Chuyền',
    ];

    private function assertCategory(string $category): void
    {
        if (!isset($this->categories[$category])) {
            abort(404);
        }
    }

    private function assertProductCategory(Product $product, string $category): void
    {
        if ($product->category !== $category) {
            abort(404);
        }
    }

    private function categoryTitle(string $category): string
    {
        return $this->categories[$category] ?? 'Sản Phẩm';
    }

    public function index(string $category)
    {
        $this->assertCategory($category);

        $products = Product::where('category', $category)->get();

        return view('admin.products.index', [
            'products' => $products,
            'category' => $category,
            'title' => $this->categoryTitle($category),
        ]);
    }

    public function create(string $category)
    {
        $this->assertCategory($category);

        return view('admin.products.create', [
            'category' => $category,
            'title' => $this->categoryTitle($category),
        ]);
    }

    public function store(Request $request, string $category)
    {
        $this->assertCategory($category);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'attribute' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store("products/{$category}", 'public');
        }

        $validated['category'] = $category;

        Product::create($validated);

        return redirect()->route('admin.products.index', $category)->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function show(string $category, Product $product)
    {
        $this->assertCategory($category);
        $this->assertProductCategory($product, $category);

        return view('admin.products.show', [
            'product' => $product,
            'category' => $category,
            'title' => $this->categoryTitle($category),
        ]);
    }

    public function edit(string $category, Product $product)
    {
        $this->assertCategory($category);
        $this->assertProductCategory($product, $category);

        return view('admin.products.edit', [
            'product' => $product,
            'category' => $category,
            'title' => $this->categoryTitle($category),
        ]);
    }

    public function update(Request $request, string $category, Product $product)
    {
        $this->assertCategory($category);
        $this->assertProductCategory($product, $category);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'attribute' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store("products/{$category}", 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.show', [$category, $product])->with('success', 'Sản phẩm đã được cập nhật!');
    }

    public function destroy(string $category, Product $product)
    {
        $this->assertCategory($category);
        $this->assertProductCategory($product, $category);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index', $category)->with('success', 'Sản phẩm đã được xóa!');
    }
}
