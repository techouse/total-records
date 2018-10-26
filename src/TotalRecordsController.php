<?php

namespace Techouse\TotalRecords;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Http\Requests\NovaRequest;

class TotalRecordsController extends Controller
{
    /**
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handle(NovaRequest $request)
    {
        $this->validate($request, ['model'   => ['bail', 'required', 'min:1', 'string', new ClassExists],
                                   'expires' => ['nullable', 'date', 'date_format:Y-m-d\TH:i:sP']]);

        $model = $request->input('model');

        $cacheKey = hash('md4', $model . (int)(bool)$request->input('expires'));

        $count = Cache::get($cacheKey);

        if (!$count) {
            $count = $model::count();

            if ($request->input('expires')) {
                Cache::put($cacheKey, $count, Carbon::parse($request->input('expires')));
            }
        }

        return response()->json(['count' => $count]);
    }
}
