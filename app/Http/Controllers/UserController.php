<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class UserController extends Controller
{
    public function index()
    {
        // Lấy ra toàn bộ bản ghi trong DB bảng users
        // $users = User::all();
        $users = User::select('id', 'name', 'username', 'email')
            ->where('id', '>', 5) // (trường, toán tử so sánh, giá trị)
            ->where('id', '<', 7) // (trường, toán tử so sánh, giá trị)
            ->get();
        // dd($users);
        $usersPaginate = User::select('id', 'name', 'username', 'email', 'role', 'avatar')
            // ->cursorPaginate(5);
            ->paginate(5);
        // dd($usersPaginate);
        return view('admin.user.list', ['user_list' => $usersPaginate]);
    }
    public function delete(User $user)
    {
        // Nếu sử dụng model binding thì tên tham số === tên biến trên url
        // Cách 1
        if($user) {
            // Tìm ra $user có id = $id
            // $user = User::find($id); // không cần nếu dùng model binding
            // Tìm ra toàn bộ Post có user_id = $id;
            $posts = Post::where('user_id', '=', $user->id)->get();
            // Chạy qua toàn bộ post liên quan và update user_id
            // Update relation cách 1
            // foreach($posts as $post) {
            //     $post->update(['user_id' => 0]);
            // }
            // Update relation cách 2
            $postIds = $posts->pluck('id'); // Lấy ra mảng id
            Post::whereIn('id', $postIds)->update(['user_id' => 0]); // update các post có id trong mảng
            $user->delete();
            // return redirect()->route('users.list');
            return redirect()->back();
            // dd($posts->pluck('id'));
        }
    }

    public function create()
    {
        $user = new User();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        $user->role = '';
        $user->code = '';
        $user->username = '';
        $user->avatar = '';
        $user->status = '';
        return view('admin.user.create',['user'=>$user]);
    }

    public function store(Request $request)
    {

        $user = new User();
        // $user->name = $request->name;
        // 1. Nhập các trường dữ liệu gửi lên vào $user
        // Chú ý đặt tên cho name === tên thuộc tính
        $user->fill($request->all());
        // 2. Kiểm tra file và lưu
        if ($request->hasFile('avatar')) {
            // 2.1 Xử lý tên file
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            // 2.2 Lưu file vào trong bộ nhớ
            // dd($avatar->storeAs('users/avatar', $avatarName));
            // 2.3 Lấy đường dẫn file vừa lưu gán vào cho $user
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
            // Lưu vào thư mục storages/app/images/users
            // Cần link vào public để đọc ảnh
            // config/filesystems.php mảng links public images ~ storage images
            // chạy lệnh php artisan storage:link để link thư mục
        } else {
            $user->avatar = '';
        }
        // 3. Lưu $user vào CSDL
        $user->save();
        return redirect()->route('users.list');
    }

    public function edit(User $user)
    {
        return view('admin.user.create', [
            'user' => $user
        ]);
    }
    public function update(Request $request,$id)
    {
        $user = new User();
        $user ->fill($request->all());
        $users = User::find($id);
        if($user){
            if($user->avatar != null){
                if ($request->hasFile('avatar')) {
                    $avatar = $request->avatar;
                    $avatarName = $avatar->hashName();
                    $avatarName = $request->username . '_' . $avatarName;
                    $users->avatar = $avatar->storeAs('images/users', $avatarName);
                } 
            }
            $users->name = $user->name;
            $users->email = $user->email;
            $users->username = $user->username;
            $users->code = $user->code;
            $users->role = $user->role;
            $users->status = $user->status;
            $users->save();
            return redirect()->route('users.list');
        }
       
    }
}