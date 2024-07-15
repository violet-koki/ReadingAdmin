<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;
use Illuminate\Http\Response;

/**
 * モデル・コマンド不整合エラー
 */
class ModelMismatchException extends BaseException
{
    /** @var int HTTPステータスコード */
    protected int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    /** @var string エラーコード */
    protected string $errorCode = 'E50002';

    /** @var string エラーメッセージ */
    protected string $errorMessage = 'Model Command Mismatch. (%s)';

    public function __construct(object $command, object $model)
    {
        $command = $this->getClassName($command);
        $model = $this->getClassName($model);
        $this->errorMessage = sprintf($this->errorMessage, "command: $command model: $model");
        parent::__construct($this->errorMessage);
    }

    private function getClassName(object $obj)
    {
        $full = explode("\\", get_class($obj));
        return end($full);
    }
}
