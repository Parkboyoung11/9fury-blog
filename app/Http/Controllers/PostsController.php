<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostInterface;
use App\Services\BreadcrumbService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public $post;
    public $breadcrumb;
    public function __construct(PostInterface $post, BreadcrumbService $breadcrumbService)
    {
        $this->post = $post;
        $this->breadcrumb = $breadcrumbService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $data['columns'] = $this->post->getSortingColumns();
        $data['orders'] = $this->post->getSortingOrders();
        $data['column'] = $request->column ?: null ;
        $data['order'] = $request->order ?: null ;
        $data['search'] = $request->search ?: null;
        $data['posts'] = $this->post->paginate(ITEM_PER_PAGE, $request->all());
        $data['breadcrumbs'] = $this->breadcrumb->get('admin.dashboard.posts');
        return view('backend.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
