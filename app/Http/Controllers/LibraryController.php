<?php

namespace App\Http\Controllers;

use App\Models\LibraryModel;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $post = LibraryModel::all();
        return response()->view("post.view", [
            "post" => $post
        ]);
    }

    public function create()
    {
        return response()->view("post.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "author" => "required|string",
        ], [
            "title.required" => "Judul Tidak Bole Kosong Bro!",
            "title.string" => "Judul harus berupa string",
            "description.required" => "Deskripsi Tidak Bole Kosong Bro!",
            "description.string" => "Deskripsi harus berupa string",
            "author.required" => "Kategori Tidak Bole Kosong Bro!",
            "author.string" => "Kategori harus berupa string",
        ]);

        $post = LibraryModel::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
        ]);

        if ($post) {
            session()->flash("sukses", "berhasil menambahkan data");
            return redirect()->route("post.view");
        }
        session()->flash("error", "terjadi kesalahan saat menambahkan data");
        return redirect()->route("post.create");
    }


    public function edit($id)
    {
        $post = LibraryModel::where("id", "=", $id)->first();
        if (!$post) {
            session()->flash("error", "data tidak ditemukan");
            return redirect()->route("post.view");
        }
        return response ()->view("post.update", [
            "post" => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = LibraryModel::find($id);
        if (!$post) {
            session()->flash("error", "data tidak ditemukan");
            return redirect()->route("post.view");
        }

        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "author" => "required|string",
        ], [
            "title.required" => "Judul Tidak Bole Kosong Bro!",
            "title.string" => "Judul harus berupa string",
            "description.required" => "Deskripsi Tidak Bole Kosong Bro!",
            "description.string" => "Deskripsi harus berupa string",
            "author.required" => "Kategori Tidak Bole Kosong Bro!",
            "author.string" => "Kategori harus berupa string",
        ]);

        $update_post = $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
        ]);

        if ($update_post) {
            session()->flash("sukses", "berhasil memperbarui data");
            return redirect()->route("post.view");
        }
        session()->flash("error", "terjadi kesalahan saat memperbarui data");
        return redirect()->route("post.update", $id);
    }
    public function destroy($id)
        {
            $post = LibraryModel::find($id);
            if (!$post) {
                return redirect()->route("post.view")->with('error', 'data tidak ditemukan');
            }

            $delete_post = $post->delete();

            if ($delete_post) {
                return redirect()->route('post.view')->with('sukses', 'data berhasil dihapus');
            }
            return redirect()->route('post.view')->with('error', 'data gagal dihapus');
        }
}

