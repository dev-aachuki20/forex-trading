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

    'accepted' => ':attribute จำเป็นต้องยอมรับ',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after' => ':attribute ต้องเป็นวันที่หลังจาก :date',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังหรือเท่ากับ :date',
    'alpha' => ':attribute ต้องมีเฉพาะตัวอักษรเท่านั้น',
    'alpha_dash' => ':attribute ต้องมีเฉพาะตัวอักษร เลข ขีดกลาง และ ขีดล่างเท่านั้น',
    'alpha_num' => ':attribute ต้องมีเฉพาะตัวอักษรและตัวเลขเท่านั้น',
    'array' => ':attribute ต้องเป็นอาร์เรย์',
    'before' => ':attribute ต้องเป็นวันที่ก่อน :date',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date',
    'between' => [
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max',
        'file' => ':attribute ต้องมีขนาดระหว่าง :min และ :max กิโลไบต์',
        'string' => ':attribute ต้องมีความยาวระหว่าง :min และ :max ตัวอักษร',
        'array' => ':attribute ต้องมีระหว่าง :min และ :max รายการ',
    ],
    'boolean' => ':attribute ต้องเป็นค่า true หรือ false เท่านั้น',
    'confirmed' => ':attribute ไม่ตรงกับการยืนยัน',
    'date' => ':attribute ไม่ใช่รูปแบบวันที่ที่ถูกต้อง',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format',
    'different' => ':attribute และ :other ต้องไม่เหมือนกัน',
    'digits' => ':attribute ต้องมี :digits หลัก',
    'digits_between' => ':attribute ต้องมีระหว่าง :min และ :max หลัก',
    'dimensions' => ':attribute มีขนาดรูปภาพไม่ถูกต้อง',
    'distinct' => ':attribute มีค่าที่ซ้ำกัน',
    'email' => ':attribute ต้องเป็นที่อยู่อีเมลที่ถูกต้อง',
    'ends_with' => ':attribute ต้องลงท้ายด้วยค่าใดค่าหนึ่งต่อไปนี้: :values',
    'exists' => ':attribute ที่เลือกไม่ถูกต้อง',
    'file' => ':attribute ต้องเป็นไฟล์',
    'filled' => ':attribute ต้องมีค่า',
    'gt' => [
        'array' => 'ฟิลด์ :attribute ต้องมีรายการมากกว่า :value รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดมากกว่า :value กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่ามากกว่า :value',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรมากกว่า :value ตัว',
    ],
    'gte' => [
        'array' => 'ฟิลด์ :attribute ต้องมีรายการ :value หรือมากกว่า',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดไม่น้อยกว่า :value กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่าไม่น้อยกว่าหรือเท่ากับ :value',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรไม่น้อยกว่าหรือเท่ากับ :value ตัว',
    ],
    'image' => 'ฟิลด์ :attribute ต้องเป็นรูปภาพ',
    'in' => 'ค่าที่เลือกของ :attribute ไม่ถูกต้อง',
    'in_array' => 'ฟิลด์ :attribute ต้องมีอยู่ใน :other',
    'integer' => 'ฟิลด์ :attribute ต้องเป็นจำนวนเต็ม',
    'ip' => 'ฟิลด์ :attribute ต้องเป็นที่อยู่ IP ที่ถูกต้อง',
    'ipv4' => 'ฟิลด์ :attribute ต้องเป็นที่อยู่ IPv4 ที่ถูกต้อง',
    'ipv6' => 'ฟิลด์ :attribute ต้องเป็นที่อยู่ IPv6 ที่ถูกต้อง',
    'json' => 'ฟิลด์ :attribute ต้องเป็น JSON ที่ถูกต้อง',
    'lowercase' => 'ฟิลด์ :attribute ต้องเป็นตัวพิมพ์เล็ก',
    'lt' => [
        'array' => 'ฟิลด์ :attribute ต้องมีรายการน้อยกว่า :value รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดน้อยกว่า :value กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่าน้อยกว่า :value',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรน้อยกว่า :value ตัว',
    ],
    'lte' => [
        'array' => 'ฟิลด์ :attribute ต้องมีรายการไม่เกิน :value รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดไม่เกิน :value กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่าไม่เกิน :value',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรไม่เกิน :value ตัว',
    ],
    'mac_address' => 'ฟิลด์ :attribute ต้องเป็นที่อยู่ MAC ที่ถูกต้อง',
    'max' => [
        'array' => 'ฟิลด์ :attribute ต้องไม่มีรายการเกิน :max รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดไม่เกิน :max กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่าไม่เกิน :max',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรไม่เกิน :max ตัว',
    ],
    'max_digits' => 'ฟิลด์ :attribute ต้องไม่มีจำนวนตัวเลขเกิน :max หลัก',
    'mimes' => 'ฟิลด์ :attribute ต้องเป็นไฟล์ของประเภท :values',
    'mimetypes' => 'ฟิลด์ :attribute ต้องเป็นไฟล์ของประเภท :values',
    'min' => [
        'array' => 'ฟิลด์ :attribute ต้องมีรายการอย่างน้อย :min รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาดอย่างน้อย :min กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีค่าอย่างน้อย :min',
        'string' => 'ฟิลด์ :attribute ต้องมีจำนวนตัวอักษรอย่างน้อย :min ตัว',
    ],

    'min_digits' => 'ฟิลด์ :attribute ต้องมีตัวเลขอย่างน้อย :min ตัว',
    'missing' => 'ฟิลด์ :attribute ต้องหายไป',
    'missing_if' => 'ฟิลด์ :attribute ต้องหายไปเมื่อ :other เป็น :value',
    'missing_unless' => 'ฟิลด์ :attribute ต้องหายไปนอกเสียด้วยเว้นแต่ :other เป็น :value',
    'missing_with' => 'ฟิลด์ :attribute ต้องหายไปเมื่อ :values อยู่',
    'missing_with_all' => 'ฟิลด์ :attribute ต้องหายไปเมื่อ :values อยู่',
    'multiple_of' => 'ฟิลด์ :attribute ต้องเป็นคู่ของ :value',
    'not_in' => 'ค่าที่เลือกของ :attribute ไม่ถูกต้อง',
    'not_regex' => 'รูปแบบของฟิลด์ :attribute ไม่ถูกต้อง',
    'numeric' => 'ฟิลด์ :attribute ต้องเป็นตัวเลข',
    'password' => [
        'letters' => 'ฟิลด์ :attribute ต้องมีตัวอักษรอย่างน้อยหนึ่งตัว',
        'mixed' => 'ฟิลด์ :attribute ต้องมีตัวอักษรตัวใหญ่อย่างน้อยหนึ่งตัวและตัวเล็กอย่างน้อยหนึ่งตัว',
        'numbers' => 'ฟิลด์ :attribute ต้องมีตัวเลขอย่างน้อยหนึ่งตัว',
        'symbols' => 'ฟิลด์ :attribute ต้องมีสัญลักษณ์อย่างน้อยหนึ่งตัว',
        'uncompromised' => ':attribute ที่ให้มามีการเผยแพร่ในข้อมูลที่รั่วไหล โปรดเลือก :attribute อื่น',
    ],
    'present' => 'ฟิลด์ :attribute ต้องมีการปรากฏ',
    'prohibited' => 'ฟิลด์ :attribute ไม่อนุญาต',
    'prohibited_if' => 'ฟิลด์ :attribute ไม่อนุญาตเมื่อ :other เป็น :value',
    'prohibited_unless' => 'ฟิลด์ :attribute ไม่อนุญาตนอกเสียด้วยเว้นแต่ :other เป็นใน :values',
    'prohibits' => 'ฟิลด์ :attribute ห้าม :other ที่จะปรากฏ',
    'regex' => 'รูปแบบของฟิลด์ :attribute ไม่ถูกต้อง',
    'required' => 'ฟิลด์ :attribute จำเป็น',
    'required_array_keys' => 'ฟิลด์ :attribute ต้องมีรายการสำหรับ: :values',
    'required_if' => 'ฟิลด์ :attribute จำเป็นเมื่อ :other เป็น :value',
    'required_if_accepted' => 'ฟิลด์ :attribute จำเป็นเมื่อ :other ได้รับการยอมรับ',
    'required_unless' => 'ฟิลด์ :attribute จำเป็นนอกเสียด้วยเว้นแต่ :other เป็นใน :values',
    'required_with' => 'ฟิลด์ :attribute จำเป็นเมื่อ :values อยู่',
    'required_with_all' => 'ฟิลด์ :attribute จำเป็นเมื่อ :values อยู่',
    'required_without' => 'ฟิลด์ :attribute จำเป็นเมื่อ :values ไม่อยู่',
    'required_without_all' => 'ฟิลด์ :attribute จำเป็นเมื่อไม่มี :values อยู่',
    'same' => 'ฟิลด์ :attribute ต้องตรงกับ :other',
    'size' => [
        'array' => 'ฟิลด์ :attribute ต้องมี :size รายการ',
        'file' => 'ฟิลด์ :attribute ต้องมีขนาด :size กิโลไบต์',
        'numeric' => 'ฟิลด์ :attribute ต้องมีขนาด :size',
        'string' => 'ฟิลด์ :attribute ต้องมีขนาด :size ตัวอักษร',
    ],

    'starts_with' => 'ฟิลด์ :attribute ต้องเริ่มต้นด้วยหนึ่งในตัวเลือกเหล่านี้: :values',
    'string' => 'ฟิลด์ :attribute ต้องเป็นข้อความ',
    'timezone' => 'ฟิลด์ :attribute ต้องเป็นโซนเวลาที่ถูกต้อง',
    'unique' => ':attribute ถูกใช้งานไปแล้ว',
    'uploaded' => 'ไม่สามารถอัปโหลด :attribute ได้',
    'uppercase' => 'ฟิลด์ :attribute ต้องเป็นตัวพิมพ์ใหญ่',
    'url' => 'ฟิลด์ :attribute ต้องเป็น URL ที่ถูกต้อง',
    'ulid' => 'ฟิลด์ :attribute ต้องเป็น ULID ที่ถูกต้อง',
    'uuid' => 'ฟิลด์ :attribute ต้องเป็น UUID ที่ถูกต้อง',


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
