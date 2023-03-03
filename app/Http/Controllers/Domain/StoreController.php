<?php

    namespace App\Http\Controllers\Domain;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Domain\StoreRequest;
    use App\Models\Domain;
    use App\Models\Ip;
    use Illuminate\Http\Request;

    class StoreController extends BaseController
    {
        public function __invoke(StoreRequest $request)
        {
            $data = $request->validated();
            $this->service->store($data);
            return 111;
        }
    }
