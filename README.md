# Psalm stub priority bug demo app

## [Source example](src/Foo.php)

## Without a plugin:

```
> php ./vendor/bin/psalm --show-info=true
Scanning files...
Analyzing files...

░E

ERROR: MixedInferredReturnType - src/Foo.php:11:31 - Could not verify return type 'Zlodes\PsalmDemo\Bar' for Zlodes\PsalmDemo\Foo::getBar (see https://psalm.dev/047)
    public function getBar(): Bar


ERROR: MixedReturnStatement - src/Foo.php:13:16 - Could not infer a return type (see https://psalm.dev/138)
        return DB::transaction(static function (): Bar {
            return new Bar();
        });


------------------------------
2 errors found
------------------------------

Checks took 6.08 seconds and used 259.820MB of memory
Psalm was able to infer types for 66.6667% of the codebase
```

## With a plugin

```
> php ./vendor/bin/psalm --show-info=true
Scanning files...
Analyzing files...

░I

INFO: MixedInferredReturnType - src/Foo.php:11:31 - Could not verify return type 'Zlodes\PsalmDemo\Bar' for Zlodes\PsalmDemo\Foo::getBar (see https://psalm.dev/047)
    public function getBar(): Bar


INFO: MixedReturnStatement - src/Foo.php:13:16 - Could not infer a return type (see https://psalm.dev/138)
        return DB::transaction(static function (): Bar {
            return new Bar();
        });


------------------------------
No errors found!
------------------------------
2 other issues found.
------------------------------

Checks took 6.72 seconds and used 259.966MB of memory
Psalm was able to infer types for 66.6667% of the codebase
```

## With a plugin after removing `@method` docblock from [vendor class](https://github.com/laravel/framework/blob/71ebdcad6597698fdb10631a139c7753937dc50e/src/Illuminate/Support/Facades/DB.php#L20):

```
> php ./vendor/bin/psalm --show-info=true
Scanning files...
Analyzing files...

░░
------------------------------
No errors found!
------------------------------

Checks took 5.94 seconds and used 260.076MB of memory
Psalm was able to infer types for 100% of the codebase
```
