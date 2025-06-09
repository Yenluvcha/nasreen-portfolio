<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SkillController extends Controller
{

    public function index()
    {
        $skills = Skill::latest()->paginate(5);

        return view('skills.index', [
            'skills' => $skills
        ]);
    }

    public function add()
    {
        return view('skills.add');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'level' => ['required']
        ]);

        Skill::create([
            'title' => request('title'),
            'level' => request('level')
        ]);

        return redirect('/skills');
    }

    public function details(Skill $skill)
    {
        return view('skills.details', ['skill' => $skill]);
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', ['skill' => $skill]);
    }

    public function update(Skill $skill)
    {
        request()->validate([
            'title' => ['required'],
            'level' => ['required']
        ]);

        $skill->update([
            'title' => request('title'),
            'level' => request('level')
        ]);

        return redirect('/skill/' . $skill->id);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect('/skills');
    }
}
