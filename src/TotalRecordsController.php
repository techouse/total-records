<?php

namespace Techouse\TotalRecords;

use App\Http\Controllers\Controller;
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
        $this->validate($request, ['model' => ['bail', 'required', 'min:1', 'string', new ClassExists]]);

        $model = $request->input('model');

        return response()->json(['count' => $model::count()]);
    }
}
