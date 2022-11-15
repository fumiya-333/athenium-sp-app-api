<?php
namespace App\Http\Controllers;

use App\Libs\AppConstants;

use Illuminate\Http\Request;
use App\Requests\MMembers\StoreRequest;
use App\Requests\MMembers\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\MMemberServiceInterface;

class MMemberController extends Controller
{
    private MMemberServiceInterface $m_member_service;

    public function __construct(MMemberServiceInterface $m_member_service)
    {
        $this->m_member_service = $m_member_service;
    }

    public function get(Request $request)
    {
        $this->m_member_service->get($request, $this->response);
        return response()->success($this->response);
    }

    public function store(StoreRequest $request)
    {
        $this->m_member_service->store($request, $this->response);
        return response()->success($this->response);
    }

    public function update(UpdateRequest $request)
    {
        $this->m_member_service->update($request, $this->response);
        return response()->success($this->response);
    }
}
