<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;

use App\Emails\EmailVerification;
use Mail;
use Str;

class BaseService
{
    /** ハッシュ sha256 */
    const HASH_KEY_SHA256 = 'sha256';

    protected array $params = [];

    /**
     * UUIDを取得
     *
     * @return uuid
     */
    public static function getUuid()
    {
        return (string) Str::uuid();
    }

    /**
     * トークンの取得
     *
     * @return トークン
     */
    public static function getToken()
    {
        return Str::random(32);
    }

    /**
     * ハッシュ値の取得
     *
     * @param  mixed $algorithm アルゴリズム
     * @return ハッシュ値
     */
    public static function getHash(string $algorithm)
    {
        return hash($algorithm, uniqid(rand(), true));
    }

    /**
     * ハッシュ値への変換
     *
     * @param  mixed $algorithm アルゴリズム
     * @param  mixed $str 文字列
     * @return ハッシュ値
     */
    // public static function convToHash(string $algorithm, string $str)
    // {
    //     return hash($algorithm, uniqid($str, true));
    // }
    public static function convToHash(string $str)
    {
        return Hash::make($str);
    }

    /**
     * 配列キーをスネークケースからキャメルケースに変換
     *
     * @param  mixed $array 配列
     * @return キャメルケース変換後配列
     */
    public static function camelizeArrayRecursive(array $array)
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results[Str::camel($key)] = self::camelizeArrayRecursive($value);
            } else {
                $results[Str::camel($key)] = $value;
            }
        }
        return $results;
    }

    /**
     * メール送信
     *
     * @param  mixed $email メールアドレス
     * @param  mixed $subject 件名
     * @param  mixed $variables 本文変数配列
     * @param  mixed $text_file_path 本文ファイルパス
     * @return void
     */
    public function sendEmail(string $email, string $subject, array $variables, string $text_file_path)
    {
        $email_verification = new EmailVerification($subject, $variables, $text_file_path);
        Mail::to($email)->send($email_verification);
        return $email_verification;
    }

    /**
     * リクエストパラメータのチェック
     *
     * @param  mixed $array
     * @return void
     */
    public function validateRequests($request, array &$response, array $array)
    {
        $validateFlg = false;
        foreach ($array as $value) {
            if (!$request->input($value['item'])) {
                $response[$value['item']] = [
                    __('messages.' . $value['rule'], ['attribute' => __('messages.' . $value['item'])]),
                ];
                $validateFlg = true;
            }
        }
        return $validateFlg;
    }
}
