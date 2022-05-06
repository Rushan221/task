<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCategoryRequest;
use App\Http\Resources\CompanyCategoryResource;
use App\Models\CompanyCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CompanyCategoryController extends Controller
{

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        if ($request->has('keyword')) {//checking if keyword exists in query params
            $keyword = $request->input('keyword');
            return CompanyCategoryResource::collection(CompanyCategory::where('title', 'like', '%' . $keyword . '%')->get());
        }
        return CompanyCategoryResource::collection(CompanyCategory::paginate(10));
    }

    /**
     * @param CompanyCategoryRequest $request
     * @return CompanyCategoryResource
     */
    public function store(CompanyCategoryRequest $request): CompanyCategoryResource
    {
        $category = CompanyCategory::create($request->all());
        return new CompanyCategoryResource($category);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return new CompanyCategoryResource(CompanyCategory::find($id));
    }

    /**
     * @param CompanyCategoryRequest $request
     * @param $id
     * @return CompanyCategoryResource
     */
    public function update(Request $request, $id): CompanyCategoryResource
    {
        $category = CompanyCategory::find($id);
        $category->update($request->all());
        return new CompanyCategoryResource($category);
    }


    /**
     * @param $id
     * @return Application|ResponseFactory|Response
     */
    public function destroy($id)
    {
        CompanyCategory::destroy($id);
        return response(null, 204);
    }

}
