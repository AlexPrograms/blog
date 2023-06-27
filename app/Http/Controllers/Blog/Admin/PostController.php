<?php

namespace App\Http\Controllers\Blog\Admin;

// use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Requests\BlogPostCreateRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogPostUpdateRequest;

class PostController extends BaseController
{
     /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
     /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository; // властивість через яку будемо звертатись в репозиторій категорій


    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class); //app вертає об'єкт класа
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();

        return view('blog.admin.posts.index', compact('paginator'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
        
        // $item = new BlogCategory();
        // $categoryList = BlogCategory::all();
        // return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        // $data = $request->input(); //отримаємо масив даних, які надійшли з форми
        // if (empty($data['slug'])) { //якщо псевдонім порожній
        //     $data['slug'] = Str::slug($data['title']); //генеруємо псевдонім
        // }

        // $item = (new BlogCategory())->create($data); //створюємо об'єкт і додаємо в БД

        // if ($item) {
        //     return redirect()
        //         ->route('blog.admin.categories.edit', [$item->id])
        //         ->with(['success' => 'Успішно збережено']);
        // } else {
        //     return back()
        //         ->withErrors(['msg' => 'Помилка збереження'])
        //         ->withInput();
        // }



        $data = $request->input(); //отримаємо масив даних, які надійшли з форми

        $item = (new BlogPost())->create($data); //створюємо об'єкт і додаємо в БД

        if ($item) {
            return redirect()
                ->route('blog.admin.posts.edit', [$item->id])
                ->with(['success' => 'Успішно збережено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка збереження'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $item = BlogCategory::findOrFail($id);
        // $item = $this->blogPostRepository->getEdit($id);
        // if (empty($item)) {                         //помилка, якщо репозиторій не знайде наш ід
        //     abort(404);
        // }
        // $categoryList = $this->blogCategoryRepository->getForComboBox();
     
        // return view('blog.admin.posts.edit', compact('item', 'categoryList'));
        // $categoryList = BlogCategory::all();

        // return view('blog.admin.categories.edit', compact('item', 'categoryList'));
        // dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        // $item = BlogCategory::find($id);
        // if (empty($item)) { //якщо ід не знайдено
        //     return back() //redirect back
        //         ->withErrors(['msg' => "Запис id=[{$id}] не знайдено"]) //видати помилку
        //         ->withInput(); //повернути дані
        // }

        // $data = $request->all(); //отримаємо масив даних, які надійшли з форми
        // if (empty($data['slug'])) { //якщо псевдонім порожній
        //     $data['slug'] = Str::slug($data['title']); //генеруємо псевдонім
        // }

        // $result = $item->update($data);  //оновлюємо дані об'єкта і зберігаємо в БД

        // if ($result) {
        //     return redirect()
        //         ->route('blog.admin.categories.edit', $item->id)
        //         ->with(['success' => 'Успішно збережено']);
        // } else {
        //     return back()
        //         ->with(['msg' => 'Помилка збереження'])
        //         ->withInput();
        // }
        // $item = $this->blogPostRepository->getEdit($id);
        // if (empty($item)) { //якщо ід не знайдено
        //     return back() //redirect back
        //         ->withErrors(['msg' => "Запис id=[{$id}] не знайдено"]) //видати помилку
        //         ->withInput(); //повернути дані
        // }

        // $data = $request->all(); //отримаємо масив даних, які надійшли з форми
          
        // $result = $item->update($data); //оновлюємо дані об'єкта і зберігаємо в БД

        // if ($result) {
        //     return redirect()
        //         ->route('blog.admin.posts.edit', $item->id)
        //         ->with(['success' => 'Успішно збережено']);
        // } else {
        //     return back()
        //         ->with(['msg' => 'Помилка збереження'])
        //         ->withInput();
        // }
        // dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = BlogPost::destroy($id); //софт деліт, запис лишається

        //$result = BlogPost::find($id)->forceDelete(); //повне видалення з БД

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.index')
                ->with(['success' => "Запис id[$id] видалено"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка видалення']);
        }
    }
}
