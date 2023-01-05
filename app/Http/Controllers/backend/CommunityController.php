<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Http\Requests\CommunityUpdateRequest;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function index()
    {

        $communities = CommunityResource::collection(Community::where('user_id', auth()->id())->latest()->paginate(5));
        return Inertia::render('community/index', compact('communities'));
    }

    public function create()
    {
        return Inertia::render('community/create');
    }

    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->all() + ['user_id' => auth()->id()]);
        return Redirect::back();
    }

    public function edit($id)
    {
        $community = Community::find($id);
        $this->authorize('update', $community);
        return Inertia::render('community/edit', compact('community'));
    }

    public function update(CommunityUpdateRequest $request, $id)
    {
        $community = Community::find($id);
        $this->authorize('update', $community);
        $community->update($request->all());
        return to_route('backend.community.index');
    }

    public function destroy($id)
    {
        $community = Community::find($id);
        $this->authorize('delete', $community);
        $community->delete();
        return Redirect::back();
    }
}
