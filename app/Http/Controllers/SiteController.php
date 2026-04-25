<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Scarf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class SiteController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->email === 'ADMIN@gmail.com') {
                return redirect('/admin');
            }
            return redirect('/')->with('success', 'Đăng nhập thành công.');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Đăng xuất thành công.');
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Auth::user()->update($request->only('name', 'email', 'address', 'phone'));

        return back()->with('success', 'Cập nhật thông tin thành công.');
    }

    public function admin()
    {
        return view('admin', ['categories' => $this->categories()]);
    }

    public function category(string $slug)
    {
        $categories = $this->categories();

        if (!isset($categories[$slug])) {
            abort(404);
        }

        return view('categories.show', ['category' => $categories[$slug]]);
    }

    private function categories(): array
    {
        return [
            'tui-xach' => [
                'slug' => 'tui-xach',
                'title' => 'Túi Xách',
                'description' => 'Bộ sưu tập túi xách đa phong cách cho công sở, dạo phố và các dịp đặc biệt.',
                'icon' => 'TX',
                'items' => $this->itemsForBagCategory(),
            ],
            'khan' => [
                'slug' => 'khan',
                'title' => 'Khăn',
                'description' => 'Khám phá khăn lụa, khăn len và khăn thời trang cho mọi phong cách.',
                'icon' => 'KH',
                'items' => $this->itemsForScarfCategory(),
            ],
            'vong-co' => [
                'slug' => 'vong-co',
                'title' => 'Vòng Cổ',
                'description' => 'Những mẫu vòng cổ sang trọng, tinh tế, dễ dàng phối với nhiều kiểu trang phục.',
                'icon' => 'VC',
                'items' => [
                    [
                        'name' => 'Vòng Cổ Pha Lê',
                        'description' => 'Thiết kế ánh kim lấp lánh, phù hợp cho tiệc tối và sự kiện đặc biệt.',
                        'price' => '950.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                    [
                        'name' => 'Vòng Cổ Ngọc Trai',
                        'description' => 'Phong cách cổ điển, mang đến vẻ đẹp thanh lịch và nữ tính.',
                        'price' => '1.150.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                ],
            ],
            'nhan' => [
                'slug' => 'nhan',
                'title' => 'Nhẫn',
                'description' => 'Những mẫu nhẫn tinh xảo cho phong cách năng động và hiện đại.',
                'icon' => 'NH',
                'items' => [
                    [
                        'name' => 'Nhẫn Bạc Đơn Giản',
                        'description' => 'Thiết kế tối giản, phù hợp dùng hằng ngày.',
                        'price' => '420.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                    [
                        'name' => 'Nhẫn Đính Đá',
                        'description' => 'Chi tiết đá nổi bật, thích hợp làm quà tặng.',
                        'price' => '780.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                ],
            ],
            'day-chuyen' => [
                'slug' => 'day-chuyen',
                'title' => 'Dây Chuyền',
                'description' => 'Dây chuyền phong cách nhẹ nhàng, sang trọng, phù hợp mọi dịp.',
                'icon' => 'DC',
                'items' => [
                    [
                        'name' => 'Dây Chuyền Mảnh',
                        'description' => 'Kiểu dáng thanh thoát, dễ dàng phối với nhiều trang phục.',
                        'price' => '650.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                    [
                        'name' => 'Dây Chuyền Kim Loại',
                        'description' => 'Thiết kế cá tính, nổi bật cho phong cách hiện đại.',
                        'price' => '870.000 VND',
                        'image' => null,
                        'detailUrl' => '#',
                    ],
                ],
            ],
        ];
    }

    private function itemsForBagCategory(): array
    {
        if (Schema::hasTable('bags')) {
            $bags = Bag::all();

            if ($bags->isNotEmpty()) {
                return $bags->map(function (Bag $bag) {
                    return [
                        'name' => $bag->name,
                        'description' => $bag->description,
                        'price' => number_format($bag->price, 0, ',', '.') . ' VND',
                        'image' => $bag->image,
                        'detailUrl' => route('bags.show', $bag),
                    ];
                })->toArray();
            }
        }

        return [
            [
                'name' => 'Túi Xách Da Thuộc',
                'description' => 'Thiết kế sang trọng với đường may tỉ mỉ, phù hợp phong cách công sở.',
                'price' => '1.250.000 VND',
                'image' => null,
                'detailUrl' => '#',
            ],
            [
                'name' => 'Túi Xách Clutch',
                'description' => 'Mẫu clutch hiện đại, tối giản và thời thượng cho buổi tiệc tối.',
                'price' => '890.000 VND',
                'image' => null,
                'detailUrl' => '#',
            ],
        ];
    }

    private function itemsForScarfCategory(): array
    {
        if (Schema::hasTable('scarves')) {
            $scarves = Scarf::all();

            if ($scarves->isNotEmpty()) {
                return $scarves->map(function (Scarf $scarf) {
                    return [
                        'name' => $scarf->name,
                        'description' => $scarf->description,
                        'price' => number_format($scarf->price, 0, ',', '.') . ' VND',
                        'image' => $scarf->image,
                        'detailUrl' => route('scarves.show', $scarf),
                    ];
                })->toArray();
            }
        }

        return [
            [
                'name' => 'Khăn Lụa Tinh Tế',
                'description' => 'Khăn lụa mềm mại, thiết kế hoa văn sang trọng và tinh tế.',
                'price' => '520.000 VND',
                'image' => null,
                'detailUrl' => '#',
            ],
            [
                'name' => 'Khăn Cashmere',
                'description' => 'Chất liệu cashmere ấm áp, phù hợp mọi phong cách mùa thu.',
                'price' => '750.000 VND',
                'image' => null,
                'detailUrl' => '#',
            ],
        ];
    }
}
