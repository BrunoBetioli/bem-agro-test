<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index() 
    {
        $usersActive = ' active';
        $users = User::all();

        return view('users.index')
                    ->with('usersActive', $usersActive)
                    ->with('users', $users)
                    ->with('metaCSRF', true)
                    ->with('namePage', 'Users');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/users')->with('success', 'User not found.');
        } else {
            $user->delete();

            return redirect('/users')->withErrors(['errors' => 'User removed.']);
        }
    }

    public function github($id)
    {
        $user = auth()->user()->id == $id ? auth()->user() : User::find($id);
        if ($user) {
            $userData['github_data'] = request()->input('github_data');

            if ($userData['github_data'] && is_array($userData['github_data'])) {
                $userData['name'] = $userData['github_data']['name'];
                $userData['image'] = $userData['github_data']['avatar_url'];
                $userData['github_data'] = serialize($userData['github_data']);
            }

            $response = ['message' => 'Github data saved successfully'];

            $user->update($userData);

            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function view($id)
    {
        $user = User::find($id);
        if (!$user) {
            throw new Exception("User not found");
        } else {
            if (!$user->github_data) {
                return redirect()->to('/users')->withErrors(["The user " . $user->name . " has not Github data."]);
            } else {
                $user->github_data = is_serialized($user->github_data) ? unserialize($user->github_data) : null;
                $usersActive = ' active';
        
                return view('users.view')
                            ->with('usersActive', $usersActive)
                            ->with('namePage', 'Github Data')
                            ->with('user', $user);
            }
        }
    }
}
