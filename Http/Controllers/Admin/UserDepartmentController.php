<?php

namespace Modules\Iprofile\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Iprofile\Entities\UserDepartment;
use Modules\Iprofile\Http\Requests\CreateUserDepartmentRequest;
use Modules\Iprofile\Http\Requests\UpdateUserDepartmentRequest;
use Modules\Iprofile\Repositories\UserDepartmentRepository;

class UserDepartmentController extends AdminBaseController
{
    /**
     * @var UserDepartmentRepository
     */
    private $userdepartment;

    public function __construct(UserDepartmentRepository $userdepartment)
    {
        parent::__construct();

        $this->userdepartment = $userdepartment;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //$userdepartments = $this->userdepartment->all();

        return view('Iprofile::admin.userdepartments.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return view('Iprofile::admin.userdepartments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserDepartmentRequest $request): Response
    {
        $this->userdepartment->create($request->all());

        return redirect()->route('admin.Iprofile.userdepartment.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('Iprofile::userdepartments.title.userdepartments')]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDepartment $userdepartment): Response
    {
        return view('Iprofile::admin.userdepartments.edit', compact('userdepartment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserDepartment $userdepartment, UpdateUserDepartmentRequest $request): Response
    {
        $this->userdepartment->update($userdepartment, $request->all());

        return redirect()->route('admin.Iprofile.userdepartment.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('Iprofile::userdepartments.title.userdepartments')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDepartment $userdepartment): Response
    {
        $this->userdepartment->destroy($userdepartment);

        return redirect()->route('admin.Iprofile.userdepartment.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('Iprofile::userdepartments.title.userdepartments')]));
    }
}
