<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function add()
    {
        return view('admin.topic.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Topic::$rules);
        $genre_item = "";
        $topic = new Topic;
        $form = $request->all();
        
        // genreの加工編集
        foreach ($form['genre'] as $value) {
            $genre_item .= $value . "&";
        }
        $genre_item = substr($genre_item, 0, -1);
        $form['genre'] = $genre_item;

        // フォームから画像が送信されてきたら、保存して、$topic->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $topic->image_path = basename($path);
        } else {
            $topic->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $topic->fill($form);
        $topic->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/topic/create');
    }
    
    // 以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Topic::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Topic::all();
        }
        return view('admin.topic.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
     public function edit(Request $request)
    {
        // Topic Modelからデータを取得する
        $topic = Topic::find($request->id);
        if (empty($topic)) {
            abort(404);
        }
        return view('admin.topic.edit', ['topic_form' => $topic]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Topic::$rules);
        // Topic Modelからデータを取得する
        $topic = Topic::find($request->id);
        // 送信されてきたフォームデータを格納する
        $topic_form = $request->all();

        if ($request->remove == 'true') {
            $topic_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/img');
            $topic_form['image_path'] = basename($path);
        } else {
            $topics_form['image_path'] = $topic->image_path;
        }

        unset($topic_form['image']);
        unset($topic_form['remove']);
        unset($topic_form['_token']);

        // 該当するデータを上書きして保存する
        $topic->fill($topic_form)->save();

        return redirect('admin/topic/index');
    }
    
        public function delete(Request $request)
    {
        // 該当するTopic Modelを取得
        $topic = Topic::find($request->id);

        // 削除する
        $topic->delete();

        return redirect('admin/topic/index');
    }
}
