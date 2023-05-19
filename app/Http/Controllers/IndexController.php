<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $title = 'Блог';
        $subTitle = 'Все статьи';
        $posts = [
            [
                'title' => 'Статья №1',
                'description' => 'Краткое содержание №1',
                'created_at' => '2023-05-09 19:00',
            ],
            [
                'title' => 'Статья №2',
                'description' => 'Краткое содержание №2',
                'created_at' => '2023-05-09 19:20',
            ],
            [
                'title' => 'Статья №3',
                'description' => 'Краткое содержание №3',
                'created_at' => '2023-05-09 19:30',
            ],
        ];

        return view('index', [
            'title' => $title,
            'subTitle' => $subTitle,
            'posts' => $posts
        ]);
    }
}
