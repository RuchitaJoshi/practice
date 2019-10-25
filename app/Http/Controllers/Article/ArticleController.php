<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Validator;
use Watson\Rememberable\Rememberable;


class ArticleController extends Controller
{
    use Rememberable;

    /**
     * Get all articles
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getArticles()
    {
//        $articles = Cache::remember('articles', 22*60, function() {
//            return Article::all();
//        });

        return response()->json(['success' => TRUE, 'data' => ['articles' => Article::all()]], IlluminateResponse::HTTP_OK);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createNewArticle(Request $request)
    {

        $validator = Validator::make(
            $request->all(), [
                'id' => 'required|unique:articles|numeric',
                'title' => 'required|min:2|max:255',
                'body' => 'required|max:255'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => FALSE,
                'error' => [
                    'code' => 10,
                    'message' => $validator->errors()->all()],
                IlluminateResponse::HTTP_BAD_REQUEST]);
        }

        $article = Article::create($request->all());
//        dd($article);
        return response()->json([
            'success' => TRUE,
            'data' => ['articles' => $article],
            IlluminateResponse::HTTP_OK]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getArticlebyId($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['success' => FALSE,
                'error' => [
                    'code' => 10,
                    'message' => 'id does not exist'],
                IlluminateResponse::HTTP_BAD_REQUEST]);
        }
        return $article;

    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(Request $request, Article $article)
    {
        $validator = Validator::make(
            $request->all(), [
                'id' => 'exists:articles,id',
                'title' => 'required|min:2|max:255',
                'body' => 'required|max:255'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => FALSE,
                'error' => [
                    'code' => 10,
                    'message' => $validator->errors()->all()],
                IlluminateResponse::HTTP_BAD_REQUEST]);
        }

        $article->update(['title' => $request->get('title'),
            'body' => $request->get('body')]);

//        $article->update($request->all());
        return response()->json(['success' => TRUE, 'data' => ['message' => 'Article updated successfully'], IlluminateResponse::HTTP_OK]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function removeArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['success' => FALSE,
                'error' => [
                    'code' => 10,
                    'message' => 'id does not exist'],
                IlluminateResponse::HTTP_BAD_REQUEST]);
        }
        return response()->json(['success' => TRUE, 'data' => ['message' => 'Article deleted successfully'], IlluminateResponse::HTTP_NO_CONTENT]);
    }

    /**
     * Handle exception using try-catch
     * Throw error to custom created APIException class
     * We can add these exceptions in Handler.php - render() function
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function getURL()
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle123456');
        } catch (RequestException $ex) {
            throw new APIException('Github API failed in Offices Controller');
        }
    }  */
}