<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CollaboratorResource;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        $collaborators = Collaborator::all();

        return CollaboratorResource::collection($collaborators);
    }
}
