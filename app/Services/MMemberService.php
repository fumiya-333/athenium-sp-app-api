<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use Str;
use Carbon\Carbon;

use App\Libs\AppConstants;
use App\Interfaces\Services\MMemberServiceInterface;
use App\Interfaces\Repositories\MMemberRepositoryInterface;
use App\Models\MMember;

use Illuminate\Http\Request;
use App\Requests\MMembers\StoreRequest;
use App\Requests\MMembers\UpdateRequest;

class MMemberService extends BaseService implements MMemberServiceInterface
{
    private MMemberRepositoryInterface $m_member_repository;

    public function __construct(MMemberRepositoryInterface $m_member_repository)
    {
        $this->m_member_repository = $m_member_repository;
    }

    public function get(Request $request, array &$response)
    {
        $response[Str::camel(MMember::TABLE_NAME)] = self::camelizeArrayRecursive(
            $this->m_member_repository
                ->get(
                    /** SELECT */
                    [
                        MMember::COL_M_MEMBER_ID,
                        MMember::COL_FIRST_NAME,
                        MMember::COL_LAST_NAME,
                        MMember::COL_FIRST_NAME_KANA,
                        MMember::COL_LAST_NAME_KANA,
                        MMember::COL_EMAIL,
                        MMember::COL_BIRTH_YEAR,
                        MMember::COL_BIRTH_MONTH,
                        MMember::COL_BIRTH_DATE,
                        MMember::COL_ADDRESS,
                        MMember::COL_CREATED_AT,
                        MMember::COL_UPDATED_AT,
                    ]
                )
                ->toArray()
        );
        return $response;
    }

    public function store(StoreRequest $request, array &$response)
    {
        $params = self::getStoreParams($request);
        self::execStore($params);

        return $response;
    }

    public function update(UpdateRequest $request, array &$response)
    {
        $params = self::getUpdateParams($request);
        self::execUpdate($params);

        return $response;
    }

    private function getStoreParams(StoreRequest $request)
    {
        $params = [
            MMember::TABLE_NAME_SINGULAR => [
                MMember::COL_M_MEMBER_ID => self::getUuid(),
                MMember::COL_FIRST_NAME => $request->first_name,
                MMember::COL_LAST_NAME => $request->last_name,
                MMember::COL_FIRST_NAME_KANA => $request->first_name_kana,
                MMember::COL_LAST_NAME_KANA => $request->last_name_kana,
                MMember::COL_EMAIL => $request->email,
            ],
        ];

        return $params;
    }

    private function execStore(array $params)
    {
        DB::transaction(function () use ($params) {
            $this->m_member_repository->updateOrCreate($params[MMember::TABLE_NAME_SINGULAR]);
        });
    }

    private function getUpdateParams(UpdateRequest $request)
    {
        $m_member = $this->m_member_repository->first([MMember::COL_M_MEMBER_ID], [MMember::COL_M_MEMBER_ID]);
        $params = [
            MMember::TABLE_NAME_SINGULAR => [
                MMember::COL_M_MEMBER_ID => $m_member->m_member_id,
                MMember::COL_FIRST_NAME => $request->first_name,
                MMember::COL_LAST_NAME => $request->last_name,
                MMember::COL_FIRST_NAME_KANA => $request->first_name_kana,
                MMember::COL_LAST_NAME_KANA => $request->last_name_kana,
                MMember::COL_EMAIL => $request->email,
            ],
        ];

        return $params;
    }

    private function execUpdate(array $params)
    {
        DB::transaction(function () use ($params) {
            $this->m_member_repository->updateOrCreate($params[MMember::TABLE_NAME_SINGULAR]);
        });
    }
}
