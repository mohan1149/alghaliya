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

    'accepted'             => 'د :خاصیت باید ومنل شي.',
    'active_url'           => 'د :خاصیت یو باوري URL نه دی.',
    'after'                => 'د :خاصیت باید د نیټې وروسته وي :نیټه.',
    'after_or_equal'       => 'د :خاصیت باید د نیټې وروسته یا هم برابر وي :نیټه.',
    'alpha'                => 'د :خاصیت کېدی شي یوازې خطونه لري.',
    'alpha_dash'           => 'د :خاصیت کېدی شي یوازې خطونه، شمېره، او ویشونه لري.',
    'alpha_num'            => 'د :خاصیت کېدی شي یوازې خطونه او شمیرې لري.',
    'array'                => 'د :خاصیت باید یو لړ وي.',
    'before'               => 'د :خاصیت باید د نیټې څخه مخکې وي :نېټه.',
    'before_or_equal'      => 'د :خاصیت باید یو نیټه وي مخکې یا برابر وي :date.',
    'between'              => [
        'numeric' => 'د :خاصیت باید تر منځ وي :لږ او  :ډیر.',
        'file'    => 'د :خاصیت باید تر منځ وي :لږ او :ډیر کیلوبیتونه.',
        'string'  => 'د :خاصیت باید تر منځ وي لږ او :ډیر توري.',
        'array'   => 'د :خاصیت باید ترمنځ وي :لږ او :ډیر توکي.',
    ],
    'boolean'              => 'د :خاصیت باید سم یا غلط وي.',
    'confirmed'            => 'د :خاصیت تایید سره سمون نلري.',
    'date'                 => 'د :خاصیت یو باوري نېټه ندی.',
    'date_format'          => 'د :خاصیت د بڼه سره سمون نلري :بڼه',
    'different'            => 'د :خاصیت او :نور باید مختلف وي.',
    'digits'               => 'د :خاصیت باید وي :شمېرې ټوټې.',
    'digits_between'       => 'د :خاصیت باید تر منځ وي لږ او :ډیر شمېرې.',
    'dimensions'           => 'د :خاصیت د ناباوره انځور اړخونه لري.',
    'distinct'             => 'د :ځانګړي ساحه د دوه اړخیز ارزښت لري.',
    'email'                => 'د :خاصیت باید یو باوري بریښنالیک پته وي.',
    'exists'               => 'د ټاکل شوی :خاصیت ناباوره دی.',
    'file'                 => 'د :خاصیت باید یو فایل وي.',
    'filled'               => 'د :د خاصیت ساحه باید ارزښت ولري.',
    'image'                => 'د :خاصیت باید یو انځور وي.',
    'in'                   => 'د ټاکل شوی :خاصیت ناباوره دی.',
    'in_array'             => 'د :خاصیت په ساحه کې شتون نلري :نور.',
    'integer'              => 'د :خاصیت باید یو بشپړ شمېره وي.',
    'ip'                   => 'د :خاصیت باید د یو باوري IP پتې وي.',
    'ipv4'                 => 'د :خاصیت باید یو باوري IPv4 پته وي.',
    'ipv6'                 => 'د :خاصیت باید یو باوري IPv6 پته وي.',
    'json'                 => 'د :خاصیت باید یو باوري JSON تار وي.',
    'max'                  => [
        'numeric' => 'د :خاصیت ممکن دومره نه وي تر :لوړ.',
        'file'    => 'د :خاصیت ممکن دومره نه وي تر :لوړ کلوبیتونه.',
        'string'  => 'د :خاصیت ممکن دومره نه وي تر :لوړ تورې.',
        'array'   => 'د :خاصیت ممکن نور نه وي تر :لوړې توکي.',
    ],
    'mimes'                => 'د :خاصیت باید د فایل ډول وي: :ارزښتونه.',
    'mimetypes'            => 'د :خاصیت باید د فایل ډول وي: :ارزښتونه.',
    'min'                  => [
        'numeric' => 'د :خاصیت باید لږ تر لږه وي :لږترلږه',
        'file'    => 'د :خاصیت باید لږ تر لږه وي :لږ تر لږه کلوبیتونه.',
        'string'  => 'د :خاصیت باید لږ تر لږه وي :لږترلږه تورې',
        'array'   => 'د :خاصیت باید لږ تر لږه ولري :لږترلږه توکي.',
    ],
    'not_in'               => 'د ټاکل شوی :خاصیت ناباوره دی.',
    'numeric'              => 'د :خاصیت باید یو شمیر وي.',
    'present'              => 'د :خاصیت ساحه باید موجود وي.',
    'regex'                => 'د :خاصیت بڼه ناباوره ده.',
    'required'             => 'د :خاصیت ساحی ته اړتیا ده.',
    'required_if'          => 'د :خاصیت ساحی ته اړتیا ده کله چې :بل دی :ارزښت.',
    'required_unless'      => 'د :د خاصیت ساحی ته اړتیا نشته مګر :بل یې دی په :ارزښتونه.',
    'required_with'        => 'د :خاصیت ساحی ته اړتیا ده کله چې :ارزښتونه شتون ولري.',
    'required_with_all'    => 'د :خاصیت ساحی ته اړتیا ده کله چې :ارزښتونه شتون ولري',
    'required_without'     => 'د :خاصیت ساحی ته اړتیا ده کله چې :ارزښتونه شتون ونلري.',
    'required_without_all' => 'د :خاصیت ته اړتیا ده کله چې هیڅ یو :ارزښتونه شتون ولري.',
    'same'                 => 'د :خاصیت او :نور باید سمون ولري.',
    'size'                 => [
        'numeric' => 'د :خاصیت باید وي :اندازه.',
        'file'    => 'د :خاصیت باید وي :د کیلوبایټونو اندازه.',
        'string'  => 'د :خاصیت باید وي :د اندازې حرفونه.',
        'array'   => 'د :خاصیت باید ولري :د اندازې توکي.',
    ],
    'string'               => 'د :خاصیت باید یو تار وي.',
    'timezone'             => 'د :خاصیت باید یو باوري زون وي.',
    'unique'               => 'د :خاصیت لا دمخه شوی دی.',
    'uploaded'             => 'د :خاصیت پورته کولو کې ناکام شو.',
    'url'                  => 'د :خاصیت بڼه ناباوره ده.',

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
            'rule-name' => 'دودیز پیغام',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
    'custom-messages' => [
        'quantity_not_available' => 'یوازې :مقدار :واحد شتون لري',
        'this_field_is_required' => 'دغه ساحي ته اړتیا ده'
    ],

];