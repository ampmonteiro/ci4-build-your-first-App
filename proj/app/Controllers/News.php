<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->get(),
            'title' => 'News archive',
        ];

        return view('news/index', $data);
    }

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->get($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('news/show', $data);
    }


    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (!$this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('news/create', ['title' => 'Create a news item']);
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.

        $isValid = $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ]);

        if (!$isValid) {
            // The validation fails, so returns the form.
            return view('news/create', ['title' => 'Create a news item']);
        }

        $model = model(NewsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        $data = ['title' => "Create a news item successfully", 'item' => $post['title']];

        return view('news/success', $data);
    }
}
