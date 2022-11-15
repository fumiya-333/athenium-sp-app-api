<?php

namespace App\Models;

use App\Models\Base;

class MMember extends Base
{
    public $incrementing = false;
    /** テーブル名 */
    const TABLE_NAME = 'm_members';
    /** テーブル名（単数形） */
    const TABLE_NAME_SINGULAR = 'm_member';
    /** 学生ID */
    const COL_M_MEMBER_ID = 'm_member_id';
    /** 名 */
    const COL_FIRST_NAME = 'first_name';
    /** 姓 */
    const COL_LAST_NAME = 'last_name';
    /** 名（カナ） */
    const COL_FIRST_NAME_KANA = 'first_name_kana';
    /** 姓（カナ） */
    const COL_LAST_NAME_KANA = 'last_name_kana';
    /** メールアドレス */
    const COL_EMAIL = 'email';
    /** 生年月日（年） */
    const COL_BIRTH_YEAR = 'birth_year';
    /** 生年月日（月） */
    const COL_BIRTH_MONTH = 'birth_month';
    /** 生年月日（日） */
    const COL_BIRTH_DATE = 'birth_date';
    /** 住所 */
    const COL_ADDRESS = 'address';

    protected $primaryKey = self::COL_M_MEMBER_ID;

    protected $fillable = [
        self::COL_M_MEMBER_ID,
        self::COL_FIRST_NAME,
        self::COL_LAST_NAME,
        self::COL_FIRST_NAME_KANA,
        self::COL_LAST_NAME_KANA,
        self::COL_EMAIL,
        self::COL_BIRTH_YEAR,
        self::COL_BIRTH_MONTH,
        self::COL_BIRTH_DATE,
        self::COL_ADDRESS,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
    ];
}
