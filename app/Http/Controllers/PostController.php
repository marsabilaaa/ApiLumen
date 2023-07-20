<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/posts";
        $response = $client -> request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        
        //dd($data);
        return view('post.index',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $title = $request ->title;
        $content = $request ->content;


        $parameter =[
            'title'=>$title,
            'content'=>$content
        ];
 
        $client = new Client();
        $url = "http://localhost:8000/posts";

        $response = $client -> request('POST', $url, [
            'headers' => ['Content-type'=> 'application/json'],
            'body' => json_encode($parameter)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
            $errors = $contentArray['message'];
            return redirect()->to('post')->withErrors($errors);
        } else { 
            return redirect()->to('post')->with('success', 'Berhasil di Post');
        }
        //echo $contentArray['message'];
    }

    
    public function edit($id)
    {
        $client = new Client();
        $url = "http://localhost:8000/posts/$id";
        $response = $client -> request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
            $errors = $contentArray['message'];
            return redirect()->to('post')->withErrors($errors);
        } else { 
            $data = $contentArray['data'];
            return view('post.index',['data'=>$data]);
        }
    }
 
    public function update(Request $request, $id)
    { 
        $title = $request ->title;
        $content = $request ->content;

        $parameter =[
            'title'=>$title,
            'content'=>$content
        ];

        $client = new Client();
        $url = "http://localhost:8000/posts/$id";
        $response = $client->request('PUT',$url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
       if($contentArray['status'] != true){
        $error = $contentArray['data'];
        return redirect()->to('post')->withErrors($error)->withInput();
       }else{
        return redirect()->to('post')->with('success', 'Berhasil melakukan update data');
       }
    }
   
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://localhost:8000/posts/$id";
        $response = $client->request('DELETE',$url);
    
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
       if($contentArray['status'] != true){
        $error = $contentArray['data'];
        return redirect()->to('post')->withErrors($error)->withInput();
       }else{
        return redirect()->to('post')->with('success', 'Berhasil melakukan hapus data');
       }
    }
}
