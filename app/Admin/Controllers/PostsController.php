<?php

namespace App\Admin\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

// use Encore\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PostsController extends Controller
{
    // use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        // $header = "Edit Post"; $description = "";
        // $post = Post::find($id);
        // $categories = Category::all()->pluck(['id' => 'category_name']);
        //
        // return view('posts.edit')->with([
        //   'header' => $header, 'description' => $description, 'post' => $post, 'categories' => $categories,
        // ]);

        // return Admin::content(function (Content $content) use ($id) {
        //
        //     $content->header('header');
        //     $content->description('description');
        //
        //     $content->body($this->form()->edit($id));
        // });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        $header = "New Post";
        $description = "";
        $post = new Post();
        $categories = Category::all()->pluck('category_name', 'id');

        return view('posts.create')->with([
            'header'      => $header,
            'description' => $description,
            'post'        => $post,
            'categories'  => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $fileName = $request['image']->getClientOriginalName();
        Image::make($request['image'])->save(public_path() . '/image/topImages/' . $fileName);

        Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'top_image'   => $fileName,
            'user_id'     => Admin::user()->id,
            'category_id' => $request->category_id,
        ]);

        return redirect("admin/posts");
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Post::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('title');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Post::class, function (Form $form) {

            // desplay means show the field in edit screeen
            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
