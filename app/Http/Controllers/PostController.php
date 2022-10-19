<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts', compact('posts'));
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'four',
                'content' => 'four content',
                'image' => 'image4',
                'likes' => 25,
                'is_published' => 1,
            ],
            [
                'title' => 'five',
                'content' => 'five content',
                'image' => 'image5',
                'likes' => 30,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }

    public function update() {
        $post = Post::find(5);

        $post->update([
            'title' => 'update five',
            'content' => 'update five content',
            'image' => 'update image5',
            'likes' => 35,
            'is_published' => 1,
        ]);

        dd('update');
    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate() {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image',
            'likes' => 45,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'four1'
        ],[
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image',
            'likes' => 45,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');

    }
}
