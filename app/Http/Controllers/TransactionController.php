<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositRequest;
use App\Http\Requests\CreateTransferenceRequest;
use App\Services\Transaction\CreateDepositService;
use App\Services\Transaction\CreateTransferenceService;
use App\Services\Transaction\DeleteDepositService;
use App\Services\Transaction\ListOwnBalanceService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $createDepositService;
    protected $listOwnBalanceService;
    protected $createTransferenceService;
    protected $deleteDepositService;

    public function __construct(CreateDepositService $createDepositService, CreateTransferenceService $createTransferenceService, ListOwnBalanceService $listOwnBalanceService, DeleteDepositService $deleteDepositService)
    {
        $this->createDepositService = $createDepositService;
        $this->createTransferenceService = $createTransferenceService;
        $this->listOwnBalanceService = $listOwnBalanceService;
        $this->deleteDepositService = $deleteDepositService;
    }

    public function deposit(CreateDepositRequest $request)
    {
        return $this->createDepositService->execute($request->all());
    }

    public function transference(CreateTransferenceRequest $request)
    {
        return $this->createTransferenceService->execute($request->all());
    }

    public function listOwnBalance(Request $request){

        return $this->listOwnBalanceService->execute($request);
    }
    public function deleteDeposit(Request $request)
    {
        return $this->deleteDepositService->execute($request);
    }
}
