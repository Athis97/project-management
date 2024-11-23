<?php

namespace App\Http\Controllers;

use App\Models\ProjectInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectInvitationController extends Controller
{
    public function accept(Request $request, $token)
    {
        // Find the invitation by token
        $invitation = ProjectInvitation::where('token', $token)->first();

        if (!$invitation) {
            abort(404, 'Invalid invitation link.');
        }

        // If the user is not logged in, redirect to login with the redirect URL
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login')->with('redirect_url', route('project.invitation', ['token' => $token]));
        }

        // Add the user to the project
        $project = $invitation->project;

        // Ensure the project has a team relationship
        $team = $project->team;

        if (!$team) {
            // Optionally, create a team if none exists
            $team = $project->team()->create([
                'name' => $project->name . ' Team',
                'description' => 'Team for project: ' . $project->name,
                'owner_id' => $project->user_id,
            ]);
        }

        // Add the authenticated user to the team
        $team->users()->syncWithoutDetaching([
            Auth::id() => [
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Optionally, delete the invitation after use
        $invitation->delete();

        return redirect()->route('filament.admin.resources.projects.edit', $project->id)
            ->with('success', 'You have successfully joined the project!');
    }
}
