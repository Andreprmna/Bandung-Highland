<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::paginate();

        return view('admin.video.videos', [
            'video' => $video
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create-video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $data = $request->all();

        if ($request->file('cover') != null) {
            $data['cover'] = $request->file('cover')->store('assets/video', 'public');
        }

        Video::create($data);
        // $check = $this->createVideo($data);

        return redirect()->route("videos.index");
    }

    public function createVideo(array $data)
    {
        return Video::create([
            'judul'         => $data['judul'],
            'tahun_rilis'   => $data['tahun_rilis'],
            'genre'         => $data['genre'],
            'durasi'        => $data['durasi'],
            'deskripsi'     => $data['deskripsi'],
            'format'        => $data['format'],
            'cover'         => $data['cover']

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit-video', [
            'item' => $video
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {

        $data = $request->all();

        if ($request->file('cover') != null) {
            $data['cover'] = $request->file('cover')->store('assets/video', 'public');
        }

        $video->update($data);

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->status = 0;
        $video->save();

        return redirect()->route('videos.index');
    }
}
