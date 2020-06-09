<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['newArticle', 'deleteArticle','updateArticle','getArticle']]);
    }


    public function newArticle(ArticleRequest $request)
    {
        Post::create($request->all());

        //Article::create($request->all());

        return $this->saveArticle($request->all());

      /*  $attributes = $request(['title', 'description','category','content','email']);

        if($this->saveArticle($attributes)){
            return $this->successResponse();
        }
        return $this->failedResponse();*/
    }

/*
    public function deleteArticle(ArticleRequest $request)
    {
        Article::delete($request->all());
    }


    public function getArticle(ArticleRequest $request)
    {
        Article::get($request->all());
    }

    public function updateArticle(ArticleRequest $request)
    {
        $ArticlesAttributes= $request->attributes();
        $this->saveArticle($ArticlesAttributes);
    }*/


    public function saveArticle($attributes){
        DB::table('posts')->updateOrInsert([
            'title' => $attributes->title,
            'admin_id' => $attributes->email,
            'description'=>$attributes->description,
            'category_id' => $attributes->category,
            'content'=>$attributes->content,
            'rating'=>0,
            'state'=>1,
            'updated_at'=>Carbon::now(),
            'created_at'=>Carbon::now()
        ]);
    }

    public function failedResponse(){
        return response()->json([
            'error' => 'Ha ocurido un error en el registro del nuevo articulo'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse(){
        return response()->json([
            'data' => 'Articulo registrado con éxito !'
        ], Response::HTTP_OK);
    }
    //

    public function seeArticle($request){

    }
}
