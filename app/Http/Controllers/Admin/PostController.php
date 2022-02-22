<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

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
        return view('admin.posts.create');
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
        $new_post->save();

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

        return view ('admin.posts.edit', compact('post'));
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

        $update_post->update($form_data);

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

        $post_to_delete->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function getValidationRules()
    {
       return [
        'title' => 'required|min:3|max:255',
        'description' => 'required|min:4|max:60000'
       ];
    }

    protected function getUniqueSlugFromTitle($title) {
        // Controlliamo se esiste già un post con questo slug.
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
