<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Repositories\EmployeeRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EmployeeController extends Controller
{

    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * get all data
     *
     * @return collection all data
     */
    public function index()
    {
        $employees = $this->employeeRepository->getAllEmployees();

        return EmployeeResource::collection($employees);
    }


    public function store(CreateEmployeeRequest $request)
    {
        $employeeDetails = [
            'name'      => $request->name,
            'email'     => $request->email,
            'cpf'       => $request->cpf,
            'phone'     => $request->phone,
            'knowledge' => $request->knowledge,
        ];

        try {
            $data = $this->employeeRepository->createEmployees($employeeDetails);

            return response()->json([
                'status'  => true,
                'message' => 'Saved successfully',
                'errors'  => null,
                'data'    => new EmployeeResource($data),
            ], 200);
        } catch (\Exception $exception) {
            // throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
            return response()->json([
                'status'  => false,
                'message' => 'Invalid data',
                'errors'  => $exception->getMessage(),
                'data'    => [],
            ], 400);
        }
    }

    public function update(UpdateEmployeeRequest $request, int $id)
    {

        $employeeDetails = [
            'name'      => $request->name,
            'email'     => $request->email,
            'cpf'       => $request->cpf,
            'phone'     => $request->phone,
            'knowledge' => $request->knowledge,
            'status'    => $request->status
        ];

        try {
            $data = $this->employeeRepository->updateEmployees($id, $employeeDetails);

            return response()->json([
                'status'  => true,
                'message' => 'Saved successfully',
                'errors'  => null,
                'data'    => new EmployeeResource($data),
            ], 200);
        } catch (\Exception $exception) {
            // throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
            return response()->json([
                'status'  => false,
                'message' => 'Invalid data',
                'errors'  => $exception->getMessage(),
                'data'    => [],
            ], 400);
        }
    }

    public function show(string $nome)
    {
        $id = preg_replace("/[^0-9]/", "", $nome);
        $employees = $this->employeeRepository->findEmployee($id);
        return new EmployeeResource($employees);
    }
}
