<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function search(){
        $postsQuery = Post::query();
        $userQuery = User::query();

        /* キーワードから検索処理 */
        $keyword = request()->input('keyword');
        if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $postsQuery->where('caption', 'LIKE', "%{$keyword}%");
            $userQuery->where('username', 'LIKE', "%{$keyword}%");
        };

        /* ページネーション */
        $users = $userQuery->latest()->paginate(2);
        $posts = $postsQuery->latest()->paginate(3);

        return view('posts.search', compact('postsQuery', 'keyword', 'users', 'posts'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::inRandomOrder()->take(20)->with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create(User $user){

        return view('posts.create', compact('user'));
    }

    public function notification(User $user){
        $dt = Carbon::today();
        $postSuggest = Post::inRandomOrder($dt)->take(1)->first();
        return view('posts.notification', compact('postSuggest', 'dt'));
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'image',
        ]); 

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');

            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            // $image->save();
            $imageArray = ['image' => $imagePath];
        }
    
        

        auth()->user()->posts()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
}
