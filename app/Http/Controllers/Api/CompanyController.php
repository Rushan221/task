<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return CompanyResource::collection(Company::with('category')->get());
    }

    /**
     * @param CompanyRequest $request
     * @return CompanyResource
     */
    public function store(CompanyRequest $request): CompanyResource
    {
        $input = $request->all();
        $fileName = '';
        if ($request->file('image')) {
            $fileName = 'company_images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('company_images'), $fileName);
        }
        $input['image'] = $fileName;
        $company = Company::create($input);
        return new CompanyResource($company);
    }

    /**
     * @param $id
     * @return CompanyResource
     */
    public function show($id): CompanyResource
    {
        return new CompanyResource(Company::find($id));
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     * @return CompanyResource|Application|ResponseFactory|Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $input = $request->all();
        if ($company) {
            if ($request->hasFile('image')) {
                File::delete($company->image);
                $fileName = 'company_images/' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('company_images'), $fileName);
                $input['image'] = $fileName;
            }
            $company->update($input);
            return new CompanyResource($company);
        }
        return response(null, 404);
    }

    /**
     * @param $id
     * @return Application|ResponseFactory|Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company) {
            File::delete($company->image);
            Company::destroy($id);
            return response(null, 204);
        }
        return response(null,404);
    }
}
