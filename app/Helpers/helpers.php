<?php
function getSettingsData($input = null)
{
    if (empty($input)) {
        $data = \App\Models\Setting::pluck('value', 'key')
            ->toArray();
    } elseif (is_array($input)) {
        $data = \App\Models\Setting::whereIn('key', $input)
            ->pluck('value', 'key')
            ->toArray();
    } else {
        $item = \App\Models\Setting::select('value', 'key')->where('key', $input)->first();

        $data = empty($item) ? '' : $item->value;
    }

    return $data;
}
