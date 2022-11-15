<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    /** 削除フラグ */
    const COL_DEL_FLG = 'del_flg';
    /** 登録日 */
    const COL_CREATED_AT = 'created_at';
    /** 更新日 */
    const COL_UPDATED_AT = 'updated_at';

    /** フラグ オフ */
    const FLG_OFF = '0';
    /** フラグ オン */
    const FLG_ON = '1';
    /** 未選択ID */
    const UNSELECT_ID = '99';
    /** ASC */
    const ASC = 'asc';
    /** DESC */
    const DESC = 'desc';
}
