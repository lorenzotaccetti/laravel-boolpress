<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate($this->getValidationRules());

        $new_post = new Post();

        $new_post->fill($form_data);
        $new_post->slug = $this->getUniqueSlugFromTitle($new_post->title);

        if (isset($form_data['cover'])) {
            $img_path = Storage::put('cover', $form_data['cover']);

            $new_post->cover = $img_path;
        }

        $new_post->save();

        if (isset($form_data['tags'])) {
            $new_post->tags()->sync($form_data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $tags = Tag::all();

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]; 

        return view ('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = $request->all();

        $request->validate($this->getValidationRules());

        $update_post = Post::findOrFail($id);

        // Aggiorno lo slug soltanto se l'utente in fase di modifica cambia il titolo
        if($form_data['title'] != $update_post->title) {
            $form_data['slug'] = $this->getUniqueSlugFromTitle($form_data['title']);
        }

        if ($form_data['cover']) {
            
            if ($update_post->cover) {
                Storage::delete($update_post->cover);
            }

            $img_path = Storage::put('cover', $form_data['cover']);

            $form_data['cover'] = $img_path;

        }

        $update_post->update($form_data);

        if(isset($form_data['tags'])) {
            $update_post->tags()->sync($form_data['tags']);
        } else {
            $update_post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', ['post' => $update_post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_to_delete = Post::findOrFail($id);
        $post_to_delete->tags()->sync([]);
        $post_to_delete->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function getValidationRules()
    {
       return [
        'title' => 'required|min:3|max:255',
        'description' => 'required|min:4|max:60000',
        'category_id' => 'exists:categories,id|nullable',
        'tags' => 'exists:tags,id',
        'cover' => 'image|max:512'
       ];
    }

    protected function getUniqueSlugFromTitle($title) {
        // Controlliamo se esiste gi?? un post con questo slug.
        $slug = Str::slug($title);
        $slug_base = $slug;
        
        $post_found = Post::where('slug', '=', $slug)->first();
        $counter = 1;
        while($post_found) {
            // Se esiste, aggiungiamo -1 allo slug
            // ricontrollo che non esista lo slug con -1, se esiste provo con -2
            $slug = $slug_base . '-' . $counter;
            $post_found = Post::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
