<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeには:date以降の日付を指定してください。',
    'after_or_equal' => ':attributeには:date以降の日付を指定するか、日付を指定してください。',
    'alpha' => ':attributeはアルファベットのみを含む必要があります。',
    'alpha_dash' => ':attributeは英数字、ダッシュ、アンダースコアのみを含む必要があります。',
    'alpha_num' => ':attributeは英数字のみを含む必要があります。',
    'array' => ':attributeは配列でなければなりません。',
    'before' => ':attributeには:date以前の日付を指定してください。',
    'before_or_equal' => ':attributeには:date以前の日付を指定するか、日付を指定してください。',
    'between' => [
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'file' => ':attributeは:minから:maxキロバイトの間でなければなりません。',
        'string' => ':attributeは:minから:max文字の間でなければなりません。',
        'array' => ':attributeには:minから:max個のアイテムを含める必要があります。',
    ],
    'boolean' => ':attributeフィールドはtrueまたはfalseでなければなりません。',
    'confirmed' => ':attributeの確認が一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと等しい日付でなければなりません。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁でなければなりません。',
    'digits_between' => ':attributeは:minから:max桁の間でなければなりません。',
    'dimensions' => ':attributeは無効な画像サイズです。',
    'distinct' => ':attributeフィールドに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは次のいずれかで終了する必要があります: :values。',
    'exists' => '選択された:attributeが無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeフィールドには値が必要です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
        'array' => ':attributeには:value以上のアイテムが必要です。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeには:value以上のアイテムが必要です。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeが無効です。',
    'in_array' => ':attributeフィールドは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file' => ':attributeは:valueキロバイトより小さくなければなりません。',
        'string' => ':attributeは:value文字より小さくなければなりません。',
        'array' => ':attributeには:value未満のアイテムが必要です。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeには:value以下のアイテムが含まれている必要があります。',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下でなければなりません。',
        'file' => ':attributeは:maxキロバイト以下でなければなりません。',
        'string' => ':attributeは:max文字以下でなければなりません。',
        'array' => ':attributeには:max個以下のアイテムが含まれている必要があります。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min' => [
        'numeric' => ':attributeは:min以上でなければなりません。',
        'file' => ':attributeは:minキロバイト以上でなければなりません。',
        'string' => ':attributeは:min文字以上でなければなりません。',
        'array' => ':attributeには:min個以上のアイテムが含まれている必要があります。',
    ],
    'not_in' => '選択された:attributeが無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数字でなければなりません。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeフィールドが存在している必要があります。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeフィールドは必須です。',
    'required_if' => ':otherが:valueの場合、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valueでない限り、:attributeフィールドは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_with_all' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesがすべて存在しない場合、:attributeフィールドは必須です。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:sizeキロバイトでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeには:size個のアイテムが含まれている必要があります。',
    ],
    'starts_with' => ':attributeは次のいずれかで始まる必要があります: :values。',
    'string' => ':attributeは文字列でなければなりません。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeはすでに存在します。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは無効なURL形式です。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',

    /*
|--------------------------------------------------------------------------
| Custom Validation Language Lines
|--------------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
|--------------------------------------------------------------------------
| Custom Validation Attributes
|--------------------------------------------------------------------------
|
| The following language lines are used to swap our attribute placeholder
| with something more reader friendly such as "E-Mail Address" instead
| of "email". This simply helps us make our message more expressive.
|
*/

    'attributes' => [],

];
