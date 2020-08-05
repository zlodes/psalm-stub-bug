<?php

declare(strict_types=1);

namespace Zlodes\PsalmDemo;

use Illuminate\Support\Facades\DB;

class Foo
{
    public function getBar(): Bar
    {
        return DB::transaction(static function (): Bar {
            return new Bar();
        });
    }
}
