<?php

namespace App\Admin\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Requests;

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
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
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

        return view('posts.create')->with(['header' => $header, 'description' => $description]);
        // return Admin::content(function (Content $content) {
        //
        //     $content->header('header');
        //     $content->description('description');
        //
        //     $content->body($this->form());
        // });
    }

    public function store(Request $request)
    {
        Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'top_image' => $request->image,
        'user_id' => Admin::user()->id,
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

            $form->text('title');
            $form->textarea('content')->rows(20);

             
            $form->select('category_id')->options(Category::all()->pluck('category_name', 'id'));
            //$form->hasMany('categories', function (Form\NestedForm $form) {
            //    $form->select('category_name')->options([1 => 'english']);
            //});

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
