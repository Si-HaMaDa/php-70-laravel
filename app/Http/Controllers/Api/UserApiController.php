<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);

        return response()->json($users);
        // echo json_encode($users);
        // die;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Check Data!',
                'errors' => $validator->errors()
            ]);
        }

        if (!empty($validator->image))
            $validator->image = $request->file('image')->store('users/images');

        $user = User::create($validator->validated());

        // $user->skills()->sync($validator->skills);

        return response()->json([
            'success' => true,
            'message' => __('users.created'),
            'data' => $user
        ]);
    }

    /**
     *__() the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        // $user = User::find($id);
        $user = User::find($id);

        if (!$user)
            return response()->json([
                'success' => false,
                'message' => 'No Profile Found!'
            ]);


        return response()->json([
            'success' => true,
            'message' => 'User sent!',
            'data' => $user
        ]);
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
        $validator = Validator::make($request->all(), [
            ...User::$rules,
            'email' => 'required|email:rfc,dns|unique:users,email,' . $id,
            'password' => 'nullable|min:6|max:20|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Check Data!',
                'errors' => $validator->errors()
            ]);
        }

        $validated = array_filter($validator->validated());

        $user = User::find($id);

        if (!empty($validated['image'])) {
            // Delete Old image if not the default image
            if ($user->image != 'users/avatar.png') \Storage::delete($user->image);
            // upload new image
            $validated['image'] = $request->file('image')->store('users/images');
        }

        $user->update($validated);

        $user->skills()->sync($validated['skills']);

        return response()->json([
            'success' => true,
            'message' => __('users.updated'),
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'User Deleted!'
        ]);
    }
}
