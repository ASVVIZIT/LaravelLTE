<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ScoreController extends Controller
{
    public function index()
    {
        return view('page.admin.score.index');
    }

    public function dataTable(Request $request)
    {
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'email',
            2 => 'user_image',
            3 => 'id',
        );

        $totalDataRecord = User::count();

        $totalFilteredRecord = $totalDataRecord;

        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $score_data = User::where('id','!=',Auth::id())
                ->offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val,$dir_val)
                ->get();
        } else {
            $search_text = $request->input('search.value');

            $score_data =  User::where('id','!=',Auth::id())
                ->where('id','LIKE',"%{$search_text}%")
                ->orWhere('name', 'LIKE',"%{$search_text}%")
                ->orWhere('email', 'LIKE',"%{$search_text}%")
                ->offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val,$dir_val)
                ->get();

            $totalFilteredRecord = User::where('id','!=',Auth::id())
                ->where('id','LIKE',"%{$search_text}%")
                ->orWhere('name', 'LIKE',"%{$search_text}%")
                ->orWhere('email', 'LIKE',"%{$search_text}%")
                ->count();
        }

        $data_val = array();
        if(!empty($score_data))
        {
            foreach ($score_data as $score_val)
            {
                $url = route('score.edit',['id' => $score_val->id]);
                $urlDelete = route('score.delete',['id' => $score_val->id]);
                if ($score_val->user_image) {
                    $img = $score_val->user_image;
                } else {
                    $img = asset('vendor/adminlte3/img/user2-160x160.jpg');
                }
                $scorenestedData['name'] = $score_val->name;
                $scorenestedData['email'] = $score_val->email;
                $scorenestedData['user_image'] = "<img src='$img' class='img-thumbnail' width='100px'>";
                $scorenestedData['options'] = "<a href='$url'><i class='fas fa-edit fa-lg'></i></a> <a style='border: none; background-color:transparent;' class='deleteData' data-id='$score_val->id' data-url='$urlDelete'><i class='fas fa-trash fa-lg text-danger'></i></a>";
                $data_val[] = $scorenestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );

        echo json_encode($get_json_data);
    }

    public function addScore(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string|max:200|min:3',
                'email' => 'required|string|min:3|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img = null;
            if ($request->file('user_image')) {
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img = Storage::url($upload);
            }
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_image' => $img
            ]);
            return redirect()->route('score.add')->with('status', 'Данные были сохранены в базе данных');
        }
        return view('page.admin.score.addScore');
    }

    public function editScore($id, Request $request)
    {
        $usr = User::findOrFail($id);

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string|max:200|min:3',
                'email' => 'required|string|min:3|email|unique:users,email,'.$usr->id,
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img = $usr->user_image;
            if ($request->file('user_image')) {
                # delete old img
                if ($img && file_exists(public_path().$img)) {
                    unlink(public_path().$img);
                }
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img = Storage::url($upload);
            }
            $usr->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_image' => $img
            ]);
            return redirect()->route('score.edit',['id' => $usr->id ])->with('status', 'Данные были сохранены в базе данных');
        }
        return view('page.admin.score.editScore', [
            'usr' => $usr
        ]);
    }

    public function deleteScore($id)
    {
        $usr = User::findOrFail($id);
        if ($usr->user_image && file_exists(public_path().$usr->user_image)) {
            unlink(public_path().$usr->user_image);
        }
        $usr->delete($id);
        return response()->json([
            'title' => 'Удаление',
            'msg' => 'Выбранные данные были удалены'
        ]);
    }
}
