<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Services\ExternalApi\ExternalApiMusicServiceInterface;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{


    protected $externalApiMusicService;


    public function __construct(ExternalApiMusicServiceInterface $externalApi)
    {
        $this->externalApiMusicService = $externalApi;
    }


    public function index(Request $request)
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(10);

        return view('albums.index', ['albums' => $albums]);
    }

    public function show($id)
    {
        $album = Album::find($id);

        return view('albums.show', ['album' => $album]);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {

        $album = new Album();

        $album = $this->processAlbum($request, $album);

        $album->save();

        return redirect('/albums')->with('success', 'Album has been added');
    }

    public function update(Request $request, $id)
    {

        $album = Album::find($id);

        $album = $this->processAlbum($request, $album);

        $album->save();

        return redirect('/albums')->with('success', 'Album has been updated');
    }

    protected function processAlbum(Request $request, Album $album): Album
    {
        $validatedData = $this->validateAlbum($request);

        $album->fill($validatedData);

        if ($request->hasFile('cover_image')) {

            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $album->cover_image = $filename;
        }
        return $album;
    }

    public function edit($id)
    {
        $album = Album::find($id);

        return view('albums.edit', ['album' => $album]);
    }


    public function validateAlbum(Request $request): array
    {

        return $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'description' => 'required|max:255',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function destroy($id)
    {
        $album = Album::destroy($id);

        return view('albums.deleted', ['album' => $album]);
    }

    public function suggestVariants($albumName): array
    {

        $albumData = $this->externalApiMusicService->getSuggestedAlbumsByName($albumName);

        return $albumData;
    }
}
