<?php

namespace App\Http\Controllers;

use App\Models\clients\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    protected function getUserId()
    {
        if (!session()->has('user_id')) {
            $username = session()->get('username');
            if ($username) {
                $userId = $this->user->getUserId($username);
                session()->put('user_id', $userId);
            }
        }
        return session()->get('user_id');
    }

    /**
     * Thêm một mục mới vào breadcrumb session.
     * Nó cũng xử lý việc "rewind" lịch sử nếu người dùng quay lại một trang trước đó.
     *
     * @param string $title Tiêu đề của trang.
     * @param string $url URL của trang.
     */
    protected function addBreadcrumb($title, $url)
    {
        // Lấy danh sách breadcrumbs hiện tại từ session, nếu không có thì tạo mới
        // Luôn bắt đầu với trang chủ
        $breadcrumbs = session('breadcrumbs', [
            ['title' => 'Trang chủ', 'url' => route('home')]
        ]);

        // Kiểm tra xem URL mới có phải là trang chủ không, nếu phải thì reset lại
        if ($url === route('home')) {
            $breadcrumbs = [['title' => 'Trang chủ', 'url' => route('home')]];
            session(['breadcrumbs' => $breadcrumbs]);
            return;
        }

        // Tìm xem URL mới đã tồn tại trong breadcrumbs chưa
        $existing_key = null;
        foreach ($breadcrumbs as $key => $crumb) {
            if ($crumb['url'] === $url) {
                $existing_key = $key;
                break;
            }
        }

        if ($existing_key !== null) {
            // Nếu đã tồn tại, cắt mảng đến vị trí đó (người dùng đã back lại)
            $breadcrumbs = array_slice($breadcrumbs, 0, $existing_key + 1);
        } else {
            // Nếu chưa tồn tại, thêm mục mới vào cuối
            $breadcrumbs[] = ['title' => $title, 'url' => $url];
        }

        // Lưu lại vào session
        session(['breadcrumbs' => $breadcrumbs]);
    }
}
