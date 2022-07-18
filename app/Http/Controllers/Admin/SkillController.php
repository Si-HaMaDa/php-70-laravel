<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'DESC')->paginate(5);
        return view('admin.skills.index')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
        ]);

        Skill::create($validated);

        return redirect(route('admin.skills.index'))->with('success', __('skills.created'));
    }

    /**
     *__() the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $skill = Skill::where('id', $id)->first();
        // $skill = Skill::find($id);
        $skill = Skill::find($id);

        if (!$skill)
            return redirect(route('admin.skills.index'))->with('error', 'No Profile Found!');


        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);

        if (!$skill)
            return redirect(route('admin.skills.index'))->with('error', 'No Profile Found!');

        return view('admin.skills.edit', compact('skill'));
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
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
        ]);

        $skill = Skill::find($id);

        $skill->update($validated);

        return redirect(route('admin.skills.index'))->with('success', __('skills.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skill::destroy($id);
        return redirect(route('admin.skills.index'))->with('success', __('skills.deleted'));
    }
}
