<?php
namespace App\Requests\MMembers;

use App\Requests\BaseRequest;

use App\Models\MMember;

class UpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->req_rules[MMember::COL_FIRST_NAME] = ['required'];
        $this->req_rules[MMember::COL_LAST_NAME] = ['required'];
        $this->req_rules[MMember::COL_FIRST_NAME_KANA] = ['required', 'regex:/^[ァ-ヾ　〜ー]+$/u'];
        $this->req_rules[MMember::COL_LAST_NAME_KANA] = ['required', 'regex:/^[ァ-ヾ　〜ー]+$/u'];
        $this->req_rules[MMember::COL_EMAIL] = ['required', 'email'];
        return $this->req_rules;
    }

    public function messages()
    {
        $this->req_messages[MMember::COL_FIRST_NAME . '.' . 'required'] = __('messages.required', [
            'attribute' => __('messages.first_name'),
        ]);
        $this->req_messages[MMember::COL_LAST_NAME . '.' . 'required'] = __('messages.required', [
            'attribute' => __('messages.last_name'),
        ]);
        $this->req_messages[MMember::COL_FIRST_NAME_KANA . '.' . 'required'] = __('messages.required', [
            'attribute' => __('messages.first_name_kana'),
        ]);
        $this->req_messages[MMember::COL_FIRST_NAME_KANA . '.' . 'regex:/^[ァ-ヾ　〜ー]+$/u'] = __('messages.kana', [
            'attribute' => __('messages.first_name_kana'),
        ]);
        $this->req_messages[MMember::COL_LAST_NAME_KANA . '.' . 'required'] = __('messages.required', [
            'attribute' => __('messages.last_name_kana'),
        ]);
        $this->req_messages[MMember::COL_LAST_NAME_KANA . '.' . 'regex:/^[ァ-ヾ　〜ー]+$/u'] = __('messages.kana', [
            'attribute' => __('messages.last_name_kana'),
        ]);
        $this->req_messages[MMember::COL_EMAIL . '.' . 'required'] = __('messages.required', [
            'attribute' => __('messages.email'),
        ]);
        $this->req_messages[MMember::COL_EMAIL . '.' . 'email'] = __('messages.injustice', [
            'attribute' => __('messages.email'),
        ]);
        return $this->req_messages;
    }

    public function attributes()
    {
        $this->req_attributes[MMember::COL_FIRST_NAME] = '名';
        $this->req_attributes[MMember::COL_LAST_NAME] = '姓';
        $this->req_attributes[MMember::COL_FIRST_NAME_KANA] = '名（カナ）';
        $this->req_attributes[MMember::COL_LAST_NAME_KANA] = '姓（カナ）';
        $this->req_attributes[MMember::COL_EMAIL] = 'メールアドレス';
        return $this->req_attributes;
    }
}
