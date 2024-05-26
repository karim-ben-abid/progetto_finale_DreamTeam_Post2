<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequest = User::where('is_admin', NULL)->get();
        $revisorRequest = User::where('is_revisor', NULL)->get();
        $writerRequest = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequest', 'revisorRequest', 'writerRequest'));
    }

    //tag

    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);
        $tag->update([
            'name' => strtolower($request->name)
        ]);
        return redirect()->back()->with('message', 'Tag aggiornato correttamente');
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect()->back()->with('message', 'Tag eliminato');
    }

    //category

    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category->update([
            'name' => strtolower($request->name)
        ]);
        return redirect()->back()->with('message', 'Categoria aggiornata correttamente');
    }

    public function deleteCategory(Category $category)
    {

        $articles = $category->articles;

        foreach ($articles as $article) {
            $article->update([
                'category_id' => NULL
            ]);
        }
        $category->delete();
        return redirect()->back()->with('message', 'Categoria eliminata correttamente');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria inserita correttamente');
    }



    //admin

    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai corettamente reso amministratore l'utente scelto");
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai corettamente reso revisore l'utente scelto");
    }

    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai corettamente reso redattore l'utente scelto");
    }


    //   elimina ruoli

    public function deleteAdmin(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato l'utente scelto");
    }

    public function deleteRevisor(User $user)
    {
        $user->is_revisor = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato l'utente scelto");
    }

    public function deleteWriter(User $user)
    {
        $user->is_writer = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato l'utente scelto");
    }
}
