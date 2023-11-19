<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    //
    public function explore(Request $request)
    {
        $cond_title = $request->cond_title;

        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Topic::where('title', $cond_title)->get()->sortByDesc('updated_at');
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Topic::all()->sortByDesc('updated_at');
        }

        return view('topic.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function post(Request $request)
    {
        $id = $request->id;
        
        $post = Topic::find($id);
        
        if ($post == null) {
            return redirect('top/top');
        }
        
        return view('topic.view', ['post' => $post]);
    }
}
