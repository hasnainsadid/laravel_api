<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;
use Illuminate\Support\Facades\Redis;

class Membercontroller extends Controller
{
    public function index()
    {
        $member = Member::all();
        return MemberResource::collection($member);
    }

    public function store(Request $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'message' => 'Member created successfully',
            'abc' => new MemberResource($member)
        ], 200);
    }

    public function show($id)
    {
        return new MemberResource(Member::find($id));
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return response()->json([
            'message' => 'Member updated successfully',
            'abc' => new MemberResource($member)
        ], 200);
    }

    public function destroy($id)
    {
        $member = Member::findorfail($id);
        $member->delete();
        return response()->json([
            'message' => 'Member deleted successfully',
        ]);
    }
}
