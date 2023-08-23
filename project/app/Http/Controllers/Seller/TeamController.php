<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::orderby('id', 'desc')->paginate(15);
        return view('seller.team.index', compact('teams'));
    }

    public function create()
    {
        return view('seller.team.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Team());
        return back()->with('success', __('Team added successfully'));
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('seller.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $this->storeData($request, $team, $id);
        return back()->with('success', __('Team updated successfully'));
    }

    public function destroy(Request $request)
    {
        $team = Team::findOrFail($request->id);
        MediaHelper::sellerhandleDeleteImage($team->photo);
        $team->delete();
        return back()->with('success', __('Team deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name' . ($id ? ',' . $id : ''),
            'designation' => 'required|string',
            'bio' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->photo = MediaHelper::sellerHandleUpdateImage($request['photo'], $data->photo);
            } else {
                $data->photo = MediaHelper::sellerHandleMakeImage($request['photo']);
            }
        }

        $progress = array_combine($request->title, $request->percentage);

        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->bio = $request->bio;
        $data->website = $request->website;
        $data->progress = json_encode($progress, true);
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->linkedin = $request->linkedin;
        $data->instagram = $request->instagram;
        $data->user_id = auth()->user()->id;
        $data->save();

    }
}
