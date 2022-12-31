<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Http\Requests\CommunityUpdateRequest;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function index()
    {
           $communities = CommunityResource::collection(Community::latest()->paginate(5));
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

    public function edit(Community $community)
    {
        return Inertia::render('community/edit',compact('community'));
    }

    public function update(CommunityUpdateRequest $request, Community $community)
    {
              $community->update($request->all());
              return to_route('community.index');
    }

    public function destroy(Community $community)
    {
           $community->delete();
           return Redirect::back();
    }
}
