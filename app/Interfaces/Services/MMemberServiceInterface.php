<?php
namespace App\Interfaces\Services;

use Illuminate\Http\Request;
use App\Requests\MMembers\StoreRequest;
use App\Requests\MMembers\UpdateRequest;

interface MMemberServiceInterface
{
    public function get(Request $request, array &$response);
    public function store(StoreRequest $request, array &$response);
    public function update(UpdateRequest $request, array &$response);
}
