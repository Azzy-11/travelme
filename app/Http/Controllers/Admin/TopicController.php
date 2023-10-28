<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function add()
    {
        return view('admin.topic.create');
    }
    
    public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
        return redirect('admin/topic/create');
    }
}
