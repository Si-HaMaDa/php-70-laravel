<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Skill;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::whenSearch(request()->search)
            ->orderBy('id', 'Desc')
            ->with('category', 'user')
            ->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create')->with([
            'users' => User::all(),
            'categories' => Category::all(),
            'skills' => Skill::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Job::$rules);

        Job::create($validatedData);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.edit')->with([
            'job' => $job,
            'users' => User::all(),
            'categories' => Category::all(),
            'skills' => Skill::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate(Job::$rules);

        $validatedData = array_filter($validatedData);

        $job->update($validatedData);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = !empty($request->ids)
            ? $request->ids
            : [$id];

        Job::destroy($ids);

        if (request()->wantsJson())
            return \Response::json([
                'success' => true,
                'message' => __('jobs.deleted'),
                'data' => [
                    'ids' => $ids
                ]
            ], 200);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', __('jobs.deleted'));
    }
}
