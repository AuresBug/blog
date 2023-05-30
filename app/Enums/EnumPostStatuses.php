<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum EnumPostStatuses:string {
    case PUBLISHED = 'PUBLISHED';
    case DRAFT     = 'DRAFT';

        /**
         * @return mixed
         */
        public static function getAll()
    {

            $statuses = self::cases();

            $arr_statuses = [];

            foreach ($statuses as $status) {
                $arr_statuses = Arr::prepend($arr_statuses, $status->name, $status->name);
            }
            // dd($arr_statuses);

            return $arr_statuses;
        }

}
